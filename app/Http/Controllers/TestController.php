<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;

/**
 * Class ApplicationController
 *
 * このクラスは書籍内では利用していません
 * サンプルリポジトリの紹介を扱っているクラスです
 */
class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }
    
    public function update(TestRequest $request)
    {
        return redirect()->route('home');
    }
}
