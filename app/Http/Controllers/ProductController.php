<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {    
        $products  = Product::with(['category','images'])->paginate(env("PAGINATION_COUNT"));
        $currencyCode = env("CURRENCY_CODE","$");
        return view('admin.products.products')->with(['products'=>$products,
        'currency_code'=> $currencyCode]);
    }

}
