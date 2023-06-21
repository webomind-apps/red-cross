<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circular;
use Illuminate\Http\Request;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circulars = Circular::paginate(25);
        return view('admin.circulars.index', compact('circulars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.circulars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $document = $request->file('document')->store('document', 'public');

        $circulars = new Circular();
        $circulars->title = $request->title;
        $circulars->document = $document;
        $circulars->comments = $request->comments; 
        $circulars->status = $request->status; 
        $circulars->save();

        return redirect()->route('admin.circulars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $circular = Circular::find($id);
        return view('admin.circulars.edit', compact('circular'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $circulars = Circular::find($id);
        $circulars->title = $request->title;
        if ($request->hasFile('document')) {
            $document = $request->file('document')->store('document', 'public');
            $circulars->document = $document;
        }
        $circulars->comments = $request->comment; 
        $circulars->status = $request->status; 
        $circulars->save();

        return redirect()->route('admin.circulars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $circular = Circular::find($id);

        $circular->delete();

        return redirect()->route('admin.circulars.index');
    }
}
