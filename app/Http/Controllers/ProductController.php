<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ImageProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('id_users', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

        $data = [
            'product' => $product
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        $data = [
            'category' => $category
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $product = new Product();
            $product->id_users = Auth::user()->id;
            $product->id_category = $request->id_category;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->whatsapp = $request->whatsapp;
            $product->stock = $request->stock;
            $product->status = 1;
            $product->on_click = 0;

            if ($product->save()) {
                if ($request->image != null) {
                    foreach ($request->file('image') as $index => $row) {
                        $format = $row->getClientOriginalName();
                        $name = Str::random(11);
                        $newName = $name . $format;
                        $row->storeAs(
                            'public/products',
                            $newName
                        );

                        $image = new ImageProduct();
                        $image->id_product = $product->id;
                        $image->image = $newName;
                        $image->is_main = $index == 0 ? 1 : 0;
                        $image->save();
                    }
                } else {
                    $request->session()->flash('alert', 'danger');
                    $request->session()->flash('message', 'Minimal harus ada 1 gambar produk');

                    DB::commit();
                    return redirect()->back();
                }

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Product created successfully');

                DB::commit();
                return redirect()->to(route('product.index'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            return redirect()->to(route('product.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $productImage = ImageProduct::where('id_product', $id)->get();

        $data = [
            'product' => $product,
            'productImage' => $productImage,
            'category' => $category
        ];

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            $product->id_category = $request->id_category;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->whatsapp = $request->whatsapp;
            $product->stock = $request->stock;

            if ($product->save()) {
                ImageProduct::where('id_product', $id)
                    ->whereNotIn('id', $request->exceptImage)
                    ->delete();
                if ($request->image != null) {
                    foreach ($request->file('image') as $index => $row) {
                        $format = $row->getClientOriginalName();
                        $name = Str::random(11);
                        $newName = $name . $format;
                        $row->storeAs(
                            'public/products',
                            $newName
                        );

                        $image = new ImageProduct();
                        $image->id_product = $product->id;
                        $image->image = $newName;
                        $image->is_main = 0;
                        $image->save();
                    }
                }

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Product created successfully');

                DB::commit();
                return redirect()->to(route('product.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('product.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Product deleted successfully');
            return redirect()->to(route('product.index'));
        }
    }

    public function ImageProduct(Request $request)
    {
        $image = ImageProduct::where('id_product', $request->productId)->get();
        return response()->json([
            'data' => $image
        ], 200);
    }
}
