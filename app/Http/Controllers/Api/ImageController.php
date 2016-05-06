<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->file('upload');
        $filename = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $destination_path = '/home/vagrant/CKEditor_test/public/image';
        $image->move($destination_path, $filename);

        $response = [
            'uploaded' => 1,
            'fileName' => $filename,
            'url' => '/image/' . $filename,
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
