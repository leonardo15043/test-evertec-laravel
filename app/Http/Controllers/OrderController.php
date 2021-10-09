<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Product;
use App\Customer;
use App\Order;
use Cart;
use Http;

class OrderController extends Controller
{
    private $dataApi;

    public function __construct()
    {
        //AUTENTICACION PlaceToPay :: Datos obligatorios para hacer cualquier interaccion con la API. 
        //https://placetopay.github.io/web-checkout-api-docs/?shell#autenticacion

        $nonce = rand(1,60); 
        $nonceBase64 = base64_encode($nonce); // Valor aleatorio para cada solicitud codificado en Base64.
        $seed = date('c'); // Fecha actual, debe estar en formato ISO 8601.
        $secretkey = env('PLACETOPAY_SECRETKEY'); // secretkey suministrado por PlacetoPay
        $tranKey = base64_encode(sha1($nonce . $seed . $secretkey, true));

        $this->dataApi["auth"] = array(
            "login"=>env('PLACETOPAY_LOGIN'), // login suministrado por PlacetoPay
            "tranKey"=>$tranKey,
            "nonce"=>$nonceBase64,
            "seed"=>$seed,
        );
    }

    public function index(Request $request){
        return view('order');
    }
    public function orderList( Order $orderModel ){
        $orders = $orderModel->ordersAll(); // Consultamos todos las ordenes de la base de datos
        return view('orderList', [ "orders" => $orders ]);
    }
    public function userOrder(){
        return view('userOrders');
    }

    public function addCart(Request $request){

        //Capturamos el id del producto para consultar los datos en la base de datos. 
        $id_product = $request->id_product;
        $product = Product::find($id_product);
        $expiration_date = Carbon::now(); 

        //Agregamos los datos del producto al carrito de compras.
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'attributes' => array(
                'expiration_date'=> $expiration_date->addDay(5)
            )
        ));
     
        return redirect('order');

    }

    public function save(Request $request){

        //Validamos los datos del usuario que realizara la compra
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/([a-zA-Z ]+)$/',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
        ]);

        //Si no pasa la validacion lo retorna a la misma vista con las observaciones correspondientes
        if ($validator->fails()) {
            return redirect('order')->withErrors($validator)->withInput($request->input());
        }

        //Realizamos una nueva Instancia para agregar los datos del usuario
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;

        //Validamos si ya exciste el usuario para que posteriormente lo agregue o lo actualice en la base de datos 
        $exists_customer = Customer::where("email",$request->email)->orWhere("mobile",$request->mobile)->first();
   
        //Si exciste el usuario 
        if($exists_customer){
            $customer->exists = true;
            $customer->id = $exists_customer->id;
        }
    
        //Guardamos los datos del usuario y posteriormente agregamos los datos del carrito de compras en la Entidad Order
        if($customer->save()){

            foreach (Cart::getContent() as $cart) {
    
                $order = new Order();
                $order->id_customer = $customer->id;
                $order->id_order_state  = 1;
                $order->id_product  = $cart->id;
                $order->payment  = $cart->price;
                $order->request_id  = 0;
                $order->expiration_date  = $cart->attributes->expiration_date;
                $order->save();
        
            }
        }
        
        return view('orderSummary', [ 'customer'=>$customer,'order'=>$order ]);
    }

    public function pay(Request $request){

        //Consultamos los productos del carrito de compras pero en este caso solo el primer y unico articulo 
        $products = Cart::getContent();
        //Asignamos los datos del carrito de compras a la estructura de datos del API 
        $this->dataApi["payment"] = array(
            "reference"=>$products[1]->id,
            "description"=> $products[1]->name,
            "amount"=>array(
                "currency" => "COP",
                "total" => $products[1]->price
            )
        );
    
        $this->dataApi["expiration"] = $products[1]->attributes->expiration_date;
        $this->dataApi["returnUrl"] = env('PLACETOPAY_RETURN_URL'); // Cuano el usuario termine la transaccion en PlacetoPay retornara a esta URL y cambiara el estado de la transaccion
        $this->dataApi["ipAddress"] = env('DB_HOST');
        $this->dataApi["userAgent"] = "PlacetoPay Sandbox";

        //Realizamos la peticion POST a los servicios de PlacetoPay
        $response = Http::post(env('PLACETOPAY_ENDPOINT').'api/session/',$this->dataApi );

        //Actualizar el registro de la orden con el requestID de PlacetoPay
        $data_order = array("request_id"=>$response['requestId']);
        Order::whereId($request->id_order)->update($data_order);

        $request->session()->put('requestID', $response['requestId']);

        Cart::clear(); // Limpiamos el carrito de compras

        return Redirect::to($response['processUrl']); //Hacemos un redireccionamiento a la url de respuesta del servicio para realizar el pago
        
    }

    public function responsePay(Request $request){

        //Consulta del estado de la transaccion 
        //https://placetopay.github.io/web-checkout-api-docs/?shell#getrequestinformation
        $response = Http::post(env('PLACETOPAY_ENDPOINT').'api/session/'.$request->session()->get('requestID'),$this->dataApi );
  
        switch ($response['status']['status']) {
            case 'APPROVED':
                $status = 2;
                break;
            case 'REJECTED':
                $status = 3;
                break; 
            default:
                $status = 3;
                break;
        }
        //Esta validacion es para que el usuaruio solo pueda ver los datos de la transaccion una sola vez 
        if($request->session()->has('requestID')){

            //Actualizamos el estado de la Orden
            $data_order = array("id_order_state"=> $status); 
            Order::where(['request_id'=>$response['requestId']])->update($data_order);
            //Eliminamos la variable de session
            $request->session()->forget('requestID');
            return view('responsePay', [ 'response'=>$response ]);

        }else{
            // Si la variable de session no exciste el usuario sera redireccionado al home 
            return redirect('/');
        }
        
    }
}