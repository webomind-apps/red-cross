<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSecretarySignature;
use Illuminate\Http\Request;

class GeneralSecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signature = GeneralSecretarySignature::first();
        return view('admin.general-secretary-signature.index', compact('signature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $signature_image = $request->file('signature')->store('signature', 'public');
        $signature = new GeneralSecretarySignature();
        $signature->name = $request->name;
        $signature->signature = $signature_image;
        $signature->save();

        return redirect()->route('admin.general-secretary-signature.index');
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
        //
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
        $signature = GeneralSecretarySignature::find($id);
        $signature->name = $request->name;
        if ($request->hasFile('signature')) {
            $signature_image = $request->file('signature')->store('signature', 'public');
            $signature->signature = $signature_image;
        }
        $signature->save();

        return redirect()->route('admin.general-secretary-signature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
