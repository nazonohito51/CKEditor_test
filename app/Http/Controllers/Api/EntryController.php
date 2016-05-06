<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EntryService;
use App\DataAccess\Eloquent\Entry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntryController extends Controller
{
    /** @var EntryService */
    protected $entry;

    /**
     * @param EntryService $entry
     */
    public function __construct(EntryService $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $input = $request->only(['body']);
//        $input['user_id'] = $this->guard->user()->id;
//        $input['id'] = $id;
        $input['user_id'] = 1;
        $input['id'] = $id;

        $entry = Entry::find($id);
        $entry->body = $input['body'];

        if ($entry->save()) {
            //return \Response::json(['status'=>'OK'],'200');
            return response(['status' => 'OK'], Response::HTTP_CREATED);
        } else {
            //return \Response::json(['status'=>'NG'],'500');
            return response(['status' => 'NG'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
