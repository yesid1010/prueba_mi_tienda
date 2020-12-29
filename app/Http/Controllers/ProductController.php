<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::with('sizes','category')->orderBy('created_at','desc')->get();
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $product->sizes()->attach($request->sizes);
        
        return response()->json([
            'data' => 'producto creado exitosamente',
            'producto' => $product
        ]);
    }


    public function show($id)
    {
        return  $product = Product::with('sizes','category')->findOrFail($id);
    }

  
    public function update(Request $request, $id)
    {
        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->img         = $request->img;
        $product->category_id = $request->category_id;

        $product->update();


        return response()->json([
            'data'=> 'producto editado exitosamente',
            'producto'=> $product
        ]);
    }

  
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'data' => 'producto eliminado'
        ]);
    }
}
