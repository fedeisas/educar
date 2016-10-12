<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use Illuminate\Http\Request;
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

        return view('admin.content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'body' => 'required',
			'image' => 'required'
		]);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $uploadPath = public_path('/uploads/');

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $request->file('image')->move($uploadPath, $fileName);
            $requestData['image'] = $fileName;
        }

        Content::create($requestData);

        Session::flash('flash_message', 'Contenido agregado con éxito');

        return redirect('admin/content');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);

        return view('admin.content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'body' => 'required',
			'image' => 'required'
		]);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $uploadPath = public_path('/uploads/');

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;

            $request->file('image')->move($uploadPath, $fileName);
            $requestData['image'] = $fileName;
        }

        $content = Content::findOrFail($id);
        $content->update($requestData);

        Session::flash('flash_message', 'Contenido actualizado con éxito');

        return redirect('admin/content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Content::destroy($id);

        Session::flash('flash_message', 'Contenido eliminado');

        return redirect('admin/content');
    }
}
