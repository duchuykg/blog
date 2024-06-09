<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('admin.login.index');
    }

    public function checkLogin(Request $request)
    {
        // dd($request);
        if (FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.post.index');
        }

        return redirect()->route('admin.auth.login')->with('error', 'Failed');
        // return view('admin.login.index');
    }

}
