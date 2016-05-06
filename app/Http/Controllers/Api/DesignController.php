<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\DataAccess\Eloquent\Design;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DesignController extends Controller
{
    /**
     * @param integer $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $input = $request->only(['design_css']);

        $design = Design::where('user_id', $id)->first();
        $design->css = $input['design_css'];
        if ($design->save()) {
            //return \Response::json(['status'=>'OK'],'200');
            return response(['status' => 'OK'], Response::HTTP_CREATED);
        } else {
            //return \Response::json(['status'=>'NG'],'500');
            return response(['status' => 'NG'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
