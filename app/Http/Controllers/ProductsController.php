<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function getAll() 
    {
        return Product::all();
    }

    /**
     * Store a new flight in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOne(Request $request) 
    {
        Product::create($request->all());
    }

    public function findOneByID(Request $request) 
    {
        return Product::firstWhere('productId', $request->id);
    }

    public function deleteOneByID(Request $request) 
    {
        return Product::where('productId', $request->id)->delete();
    }

    public function updateOneBYID(Request $request) 
    {
        return Product::where('productId', $request->id)->update($request->all());
    }

}
