<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function create()
    {
        $response = [
            'uploaded' => 1,
            'fileName' => 'foo(2).jpg',
            'url' => '/image/nazonohito-lgtm.png',
            'error' => [
                'message' => 'testtest this is test.'
            ]
        ];
//        $response = [
//            'uploaded' => 0,
//            'error' => [
//                'message' => 'testtest this is test.'
//            ]
//        ];
        \Log::error('testtesttesttesttesttesttesttesttesttesttesttest');

        return json_encode($response);
    }
}
