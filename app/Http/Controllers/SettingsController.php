<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => Settings::orderBy('id', 'asc')->get()
        ];
        return view('settings.index', $data);
    }

    public function update(Request $request)
    {
        // dd($request->id[0]);

        foreach ($request->kolom as $index => $row) {
            $setting = Settings::find($request->id[$index]);
            $setting->text = $row;
            $setting->save();
        }

        $request->session()->flash('alert', 'success');
        $request->session()->flash('message', 'Settings updated successfully');
        return redirect()->to(route('settings.index'));
    }
}
