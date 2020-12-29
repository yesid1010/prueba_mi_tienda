<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index()
    {
        return Size::orderBy('created_at','desc')->get();
    }


    public function store(Request $request)
    {
        $size = Size::create($request->all());

        return response()->json([
            'data' => 'talla creada con exito',
            'talla'=> $size
        ]);
    }


    public function show(Size $size)
    {
        return $size;
    }


    public function update(Request $request, Size $size)
    {
        $size->name = $request->name;
        $size->update();

        return response()->json([
            'data'=> 'talla editada',
            'talla'=> $size
        ]);
    }

    public function destroy(Size $size)
    {
        $size->delete();
    }
}
