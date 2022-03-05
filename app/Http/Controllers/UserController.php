<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', '!=', 1)->orderBy('id', 'desc')->get();

        $data = [
            'user' => $user
        ];

        return view('user.index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'User deleted successfully');
            return redirect()->to(route('users.index'));
        }
    }
}
