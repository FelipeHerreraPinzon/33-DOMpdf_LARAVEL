<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $municipios = Municipio::with(['departamento'])->get();
        return view('admin.municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        $departamentos = Departamento::all();
        return view('admin.municipios.create', compact('departametos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMunicipioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipioRequest $request)
    {
        Municipio::create($request->validated());
        return redirect()->route('admin.municipios.index')->with('success', ' Municipio creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $departamentos = Departamento::all();
        return view('admin.municipios.edit', compact('departamentos','municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipioRequest  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMunicipioRequest $request, Municipio $municipio)
    {
        $municipio->update($request->validated());
        return redirect()->route('admin.municipios.index')->with('success', 'El Municipio se ha modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();
        return back();
    }

}
