<?php
namespace App\Http\Controllers\Test;

use App\Services\EntryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /** @var EntryService */
    protected $entry;

    public function __construct(EntryService $entry)
    {
        $this->entry = $entry;
    }

    public function preview(Request $request)
    {
        $result = $this->entry
            ->getPage($request->get('page', 1), 20, 1)
            ->setPath($request->getBasePath());
        return view('test.preview', ['page' => $result]);
    }

    public function blog()
    {
        return view('test.blog');
    }
}
