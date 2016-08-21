<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\DataAccess\Eloquent\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::where('user_id', 1)->get();
        $response = [
            'succeded' => 1,
            'count' => $images->count(),
            'images' => $this->imagesToResponse($images),
        ];

        return json_encode($response);
    }

    private function imagesToResponse($images)
    {
        $ret = [];
        foreach ($images as $image) {
            array_push($ret, [
                'name' => $image->name,
                'url' => asset("image/upload/{$image->filename}"),
            ]);
        }

        return $ret;
    }

    public function create(Request $request)
    {
        $upload_image = $request->file('upload');
        $filename = date('YmdHis') . '.' . $upload_image->getClientOriginalExtension();
        $destination_path = '/home/vagrant/CKEditor_test/public/image/upload';
        $upload_image->move($destination_path, $filename);

        $image = new Image();
        $image->user_id = 1;
        $image->name = $upload_image->getClientOriginalName();
        $image->filename = $filename;

        if ($image->save()) {
            return json_encode([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => '/image/upload/' . $filename,
                'error' => [
                    'message' => 'testtest this is test.'
                ]
            ]);
        } else {
            return json_encode([
                'uploaded' => 0,
                'error' => [
                    'message' => 'testtest this is test.'
                ]
            ]);
        }
    }
}
