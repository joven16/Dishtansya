<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        "product_id",
        "name",
        "available_stock"
    ];
}
