<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\ImageProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id', 'desc')
            ->get();

        $data = [
            'banner' => $banner
        ];

        return view('banner.index', $data);
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

        return view('banner.create', $data);
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
            // dd(public_path() . '/banners');
            $banner = new Banner();
            $format = $request->file('image')->getClientOriginalName();
            $name = Str::random(11);
            $newName = $name . $format;
            $request->file('image')->move(public_path() . '/banners', $newName);
            $banner->image = $newName;
            $banner->order = $request->order;
            $banner->status = 1;

            if ($banner->save()) {

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Banner created successfully');

                DB::commit();
                return redirect()->to(route('banner.index'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            return redirect()->to(route('banner.index'));
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
        $banner = Banner::find($id);

        $data = [
            'banner' => $banner
        ];

        return view('banner.edit', $data);
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
            $banner = Banner::find($id);
            if ($request->image != null) {
                $format = $request->file('image')->getClientOriginalName();
                $name = Str::random(11);
                $newName = $name . $format;
                $request->file('image')->storeAs(
                    'public/banners',
                    $newName
                );
                $banner->image = $newName;
            }
            $banner->order = $request->order;
            $banner->status = 1;

            if ($banner->save()) {

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'Banner updated successfully');

                DB::commit();
                return redirect()->to(route('banner.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('banner.index'));
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
        $banner = Banner::find($id);

        if ($banner->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Banner deleted successfully');
            return redirect()->to(route('banner.index'));
        }
    }
}
