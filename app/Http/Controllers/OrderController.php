<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }
    public function index() {
        $orders = Order::orderBy('id', 'desc')->paginate(5)->get();
        return response(['data' => $orders], 200);
    }
    // find orders that have been made by a user
    public function allOrdersMadeByUser() {
        $orders = Order::with('items')->where('user_id', '=', Auth::user()->id)->get();
        return response(['data' => $orders],200);
    }
    //orders made by user today
    public function ordersMadeByUserToday() {
        $orders = Order::with('items')->where('user_id', '=', Auth::user()->id)
            ->where('created_at', '=', Carbon::today())->get();
        return response(['data' => $orders],200);
    }

    //orders made today
    public function ordersReceivedToday() {
        $orders = Order::where('created_at', '=', Carbon::today())->paginate(5)->get();
        return response(['data' => $orders],200);
    }
    // find orders that have been made of a particular item
}
