<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
$products = Product::all();
//return view(view: 'product.index',compact(var_name 'products'));

    }
}
