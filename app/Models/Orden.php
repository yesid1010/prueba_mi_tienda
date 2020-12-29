<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $fillable = ['total','user_id'];
    // public function products(){
    //     return $this->belongsToMany(Product::class);
    // }
}
