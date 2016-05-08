<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->session()->put('admin', 1);
        \Log::debug($request->session()->get('admin'));

        return \Redirect::back();
    }

    public function logout(Request $request)
    {
        $request->session()->put('admin', 0);
        \Log::debug($request->session()->get('admin'));

        return \Redirect::back();
    }
}
