<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'price', 'total_number'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
