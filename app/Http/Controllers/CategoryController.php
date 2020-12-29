<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::orderBy('created_at','desc')->get();
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json([
            'data' => 'categoria creada correctamente',
            'category' => $category
        ]);
    }

    public function show($id)
    {

        return Category::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->img = $request->img;

        $category->update();

        return $category;
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'data' => 'categoria eliminada'
        ]);
    }
}
