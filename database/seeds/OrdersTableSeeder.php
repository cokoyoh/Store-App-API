<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Order::class,5)->create()->each(function ($order){
            $item_id = \App\Item::inRandomOrder()->first()->id;
            $order->items()->attach($item_id,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        });
    }
}
