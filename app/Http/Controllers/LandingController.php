<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        $data = [
            'products' => $products
        ];
        return view('landing', $data);
    }
}
