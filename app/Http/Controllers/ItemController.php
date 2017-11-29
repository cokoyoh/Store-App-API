<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $items = Item::orderBy('id', 'desc')->get();
        return response(['data' => $items], 200);
    }

    public function store() {
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
        return response(['message' => 'Item has beed deleted'], 200);
    }
}
