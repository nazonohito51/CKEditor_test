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

    public function store(Request $request)
    {
        $input = $request->only(['body']);
        $input['user_id'] = 1;

        $entry = new Entry();
        $entry->user_id = $input['user_id'];
        $entry->title = 'title ' . date('Y-m-d H:i:s');
        $entry->body = $input['body'];
        $entry->public = 1;
        $entry->priority = 1;

        if ($entry->save()) {
            return response(['status' => 'OK'], Response::HTTP_CREATED);
        } else {
            return response(['status' => 'NG'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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

    public function updateDisplay($id, Request $request)
    {
        $input = $request->only(['public']);
        $input['user_id'] = 1;
        $input['id'] = $id;

        $entry = Entry::find($id);
        $entry->public = $input['public'];

        if ($entry->save()) {
            //return \Response::json(['status'=>'OK'],'200');
            return response(['status' => 'OK'], Response::HTTP_CREATED);
        } else {
            //return \Response::json(['status'=>'NG'],'500');
            return response(['status' => 'NG'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updatePriority(Request $request)
    {
        $input = $request->only(['ids']);

        if (count($input['ids']) !== Entry::all()->count()) {
            return response(['status' => 'NG'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        foreach ($input['ids'] as $key => $id) {
            $entry = Entry::find($id);
            $entry->priority = $key;
            $entry->save();
        }

        return response(['status' => 'OK'], Response::HTTP_CREATED);
    }
}
