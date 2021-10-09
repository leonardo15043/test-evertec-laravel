<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function ordersAll(){
        return Order::join('customers','orders.id_customer','=','customers.id')
                    ->join('order_states','orders.id_order_state','=','order_states.id')
                    ->join('products','orders.id_product','=','products.id')
                    ->select('orders.*','orders.created_at as date_order','order_states.*','customers.name as name_customer','customers.*','products.name as name_product','products.*')
                    ->get();
    }
}
