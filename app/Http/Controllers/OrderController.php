<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index(){
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
}