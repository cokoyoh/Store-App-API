<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('id', 'desc')->get();
        return response(['data' => $orders], 200);
    }
    // find orders that have been made by a user
    // find orders that have been made of a particular item
    
}
