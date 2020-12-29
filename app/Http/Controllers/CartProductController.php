<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartProduct $cartProduct)
    {
        //
    }
}
