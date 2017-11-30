<?php

namespace App\Http\Controllers;

use App\Item;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only('store','update','destroy');
    }

    public function index() {
        $items = Item::orderBy('id', 'desc')->paginate(5)->get();
        return response(['data' => $items], 200);
    }

    public function show($id) {
        $item = Item::find($id);
        return response(['data' => $item],200);
    }

    public function currentItems() {
        $items = Item::where('created_at', '=', Carbon::today())->paginate(5)->get();
        return response(['data' => $items],200);
    }

    public function weekOldItems() {
        $week_old = Carbon::now()->subWeek();
        $items = Item::where('created_at', '=', $week_old)->paginate(5)->get();
        return response(['data' => $items],200);
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_number' => 'required'
        ]);

         Item::create([
             'name' => request('name'),
             'description' => request('description'),
             'price' => request('price'),
             'total_number' => request('total_number')
         ]);
         return response(['message' => 'Item added successfully'], 200);
    }

    public function update($id) {
        $item = Item::find($id);
        $item->name = request('name');
        $item->description = request('description');
        $item->price = request('price');
        $item->total_number = request('total_number');
        $item->save();
        return response(['message' => 'Item updated successfully'], 200);
    }

    public function destroy($id) {
        $item = Item::find($id);
        $item->delete();
        return response(['message' => 'Item has been deleted'], 200);
    }
}
