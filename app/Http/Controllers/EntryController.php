<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\EntryService;
use App\DataAccess\Eloquent\Design;
use App\DataAccess\Eloquent\Entry;

class EntryController extends Controller
{
    /** @var EntryService */
    protected $entry;

    /** @var CommentService */
    protected $comment;

    /**
     * @param EntryService $entry
     */
    public function __construct(EntryService $entry, CommentService $comment)
    {
        $this->entry = $entry;
        $this->comment = $comment;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $result = $this->entry
            ->getPage($request->get('page', 1), 20)
            ->setPath($request->getBasePath());
        return view('entry.index', [
            'admin' => $request->session()->get('admin', 0),
            'admin_function' => 'index',
            'page' => $result,
            'design' => Design::find(1),
        ]);
    }

    public function edit_index(Request $request)
    {
        $result = Entry::all();
        return view('entry.edit_index', [
            'admin' => $request->session()->get('admin', 0),
            'admin_function' => 'edit_index',
            'page' => $result,
            'design' => Design::find(1),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $attributes = [
            'admin' => $request->session()->get('admin', 0),
            'admin_function' => 'show',
            'id' => $id,
            'entry' => $this->entry->getEntry($id),
            'design' => Design::find(1),
            'comments' => $this->comment->getCommentsByEntry($id)
        ];
        return view('entry.show', $attributes);
    }
}
