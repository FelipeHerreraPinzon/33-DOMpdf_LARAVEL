<?php

namespace App\Http\Controllers;

use App\Models\Tipodocumento;
use App\Http\Requests\StoreTipodocumentoRequest;
use App\Http\Requests\UpdateTipodocumentoRequest;

class TipodocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("entro tipodocumentos index");
        $tipodocumentos = Tipodocumento::all();
        return view('admin.tipodocumentos.index', compact('tipodocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("entro tipodocumentos create");
        return view('admin.tipodocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipodocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipodocumentoRequest $request)
    {
        dd("entro de tipodocumentos store");
        Tipodocumento::create($request->validated());
        return redirect()->route('admin.tipodocumentos.index')->with('success', ' Item creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function show(Tipodocumento $tipodocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipodocumento $tipodocumento)
    {
        dd("entro tipodocumentos edit");
        return view('admin.tipodocumentos.edit', compact('tipodocumento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipodocumentoRequest  $request
     * @param  \App\Models\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipodocumentoRequest $request, Tipodocumento $tipodocumento)
    {
        $tipodocumento->update($request->validated());
        return redirect()->route('admin.tipodocumentos.index')->with('success', 'El Item se ha modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipodocumento  $tipodocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipodocumento $tipodocumento)
    {
        $tipodocumento->delete();
        return back();
    }
}
