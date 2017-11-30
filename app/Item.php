<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'total_number'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
