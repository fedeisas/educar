<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Content;
use Session;

class ContentController extends Controller
{
    const PAGINATION_SIZE = 15;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $content = Content::orderBy('created_at', 'desc')->paginate(self::PAGINATION_SIZE);

        return view('content.index', compact('content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $content = Content::findOrFail($id);

        return view('content.show', compact('content'));
    }
}
