<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    public $table = 'cart_products';
    protected $fillable=['product_id','cart_id','quantity'];
}
