<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $orders = Order::orderBy('id', 'desc')->paginate(5)->get();
        return response(['data' => $orders], 200);
    }

    public function show(Order $order) {
        $order = Order::find($order);
        return response(['data' => $order],200);
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

    public function create() {
         request()->valiadte([
            'number_of_items' => 'required',
             'amount' => 'required'
         ]);
         Order::create([
             'user_id' => Auth::user()->id,
             'item_id' => request('id'),
             'number_of_items' => request('number_of_items'),
             'amount' => request('amount')
         ]);
         return response(['message' => 'Your order has been received'],200);
    }

    public function update($id) {
        $order = Order::find($id);
        $order->number_of_items = request('number_of_items');
        $order->amount = request('amount');
        $order->save();
        return response(['message' => 'Order updated successfully'],200);
     }

    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        return response(['message' => 'Order deleted!'],200);
     }
}
