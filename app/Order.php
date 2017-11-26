<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['number', 'user_id', 'item_id', 'amount'];

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
