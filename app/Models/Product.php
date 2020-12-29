<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','img','price','category_id'];


    // public function ordens(){
    //     return $this->belongsToMany(Orden::class);
    // }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    
}
