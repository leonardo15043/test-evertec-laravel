<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Customer;
use App\Order;
use Cart;

class OrderController extends Controller
{
    public function index(Request $request){
        return view('order');
    }
    public function orderSummary(){
        return view('orderSummary');
    }
    public function orderList(){
        return view('orderList');
    }
    public function userOrder(){
        return view('userOrders');
    }
    public function addCart(Request $request){

        $id_product = $request->id_product;
        $product = Product::find($id_product);


        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity
        ));

        return redirect('order');

    }

    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/([a-zA-Z ]+)$/',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
        ]);

        if ($validator->fails()) {
            return redirect('order')->withErrors($validator)->withInput($request->input());
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;

        if($customer->save()){
            foreach (Cart::getContent() as $cart) {

                $order = new Order();
                $order->id_customer = $customer->id;
                $order->id_order_state  = 1;
                $order->id_product  = $cart->id;
                $order->payment  = $cart->price;
                $expiration_date = Carbon::now();
                $order->expiration_date  = $expiration_date->addDay(5);
                $order->save();
    
            }
        }

        return view('orderSummary', [ 'customer'=>$customer ]);
    }
}