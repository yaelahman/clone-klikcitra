<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use App\Settings;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('Image')->orderBy('id', 'desc');
        $category = Category::all();
        if (isset($request->category)) {
            $products->where('id_category', $request->category);
        }

        $settings = [];
        foreach (Settings::all() as $set) {
            $settings[$set->name] = $set->text;
        }

        $data = [
            'products' => $products->get(),
            'category' => $category,
            'settings' => $settings,
            'banners' => Banner::orderBy('order', 'asc')->get(),
            'detail' => false
        ];
        return view('landing', $data);
    }

    public function detail(Request $request, $id)
    {
        $products = Product::with(['Image', 'ImageAll'])->where('id', $id);
        $category = Category::all();
        if (isset($request->category)) {
            $products->where('id_category', $request->category);
        }

        $settings = [];
        foreach (Settings::all() as $set) {
            $settings[$set->name] = $set->text;
        }

        $product = $products->first();

        if ($product == null) {
            $request->session()->flash('alert', 'danger');
            $request->session()->flash('message', 'Produk tidak ditemukan !');
            return redirect()->route('landing');
        }

        // dd($products->first());

        $data = [
            'product' => $product,
            'category' => $category,
            'settings' => $settings,
            'banners' => Banner::orderBy('order', 'asc')->get(),
            'detail' => true
        ];
        return view('landing', $data);
    }
}
