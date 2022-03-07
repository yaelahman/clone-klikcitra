<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = FAQ::orderBy('id', 'desc')->get();

        $data = [
            'faq' => $faq
        ];

        return view('faq.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.create');
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
            $faq = new FAQ();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->status = true;

            if ($faq->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'FAQ created successfully');

                DB::commit();
                return redirect()->to(route('faq.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('faq.index'));
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
        $faq = FAQ::find($id);

        $data = [
            'faq' => $faq
        ];

        return view('faq.edit', $data);
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
            $faq = FAQ::find($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->status = isset($request->is_active) ? true : false;

            if ($faq->save()) {
                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'FAQ updated successfully');

                DB::commit();
                return redirect()->to(route('faq.index'));
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->to(route('faq.index'));
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
        $faq = FAQ::find($id);

        if ($faq->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'FAQ deleted successfully');
            return redirect()->to(route('faq.index'));
        }
    }
}
