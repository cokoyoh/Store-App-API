<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'item_id', 'number_of_items' ,'amount'];

    public function items() {
        return $this->belongsToMany(Item::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
