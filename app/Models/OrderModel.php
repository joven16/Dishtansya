<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "orders";
    public $timestamps = false;

    protected $fillable = [
        "product_id",
        "quantity"
    ];
}
