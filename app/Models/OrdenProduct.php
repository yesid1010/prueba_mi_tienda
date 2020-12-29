<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProduct extends Model
{
    use HasFactory;

    public $table = 'orden_products';
    protected $fillable=['product_id','orden_id','quantity'];
}
