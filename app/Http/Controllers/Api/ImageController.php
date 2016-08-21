<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $response = [
            'succeded' => 1,
            'count' => 3,
            'images' => [
                [
                    'name' => 'first',
                    'url' => asset('image/upload/20160618092803.png'),
                ],
                [
                    'name' => 'second',
                    'url' => asset('image/upload/20160618092810.png'),
                ],
                [
                    'name' => 'third',
                    'url' => asset('image/upload/20160812092705.jpeg'),
                ]
            ],
        ];

        return json_encode($response);
    }

    public function create(Request $request)
    {
        $image = $request->file('upload');
        $filename = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $destination_path = '/home/vagrant/CKEditor_test/public/image/upload';
        $image->move($destination_path, $filename);

        $response = [
            'uploaded' => 1,
            'fileName' => $filename,
            'url' => '/image/upload/' . $filename,
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
        \Log::error($response);

        return json_encode($response);
    }
}
