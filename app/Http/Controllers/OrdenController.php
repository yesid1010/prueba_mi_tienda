<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
 
    public function index()
    {
        return Orden::all();
    }

   
    public function store(Request $request)
    {
        $orden = Orden::create($request->all());
    }

  
    public function show(Orden $orden)
    {
        return $orden;
    }

}
