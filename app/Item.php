<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'price', 'total'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
