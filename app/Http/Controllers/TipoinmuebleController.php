<?php

namespace App\Http\Controllers;

use App\Models\Tipoinmueble;
use App\Http\Requests\StoreTipoinmuebleRequest;
use App\Http\Requests\UpdateTipoinmuebleRequest;

class TipoinmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoinmuebles = Tipoinmueble::all();
        return view('admin.tipoinmuebles.index', compact('tipoinmuebles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoinmuebles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoinmuebleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoinmuebleRequest $request)
    {
       
        Tipoinmueble::create($request->validated());
        return redirect()->route('admin.tipoinmuebles.index')->with('success', ' Item creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipoinmueble  $tipoinmueble
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoinmueble $tipoinmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipoinmueble  $tipoinmueble
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoinmueble $tipoinmueble)
    {
        
        return view('admin.tipoinmuebles.edit', compact('tipoinmueble'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoinmuebleRequest  $request
     * @param  \App\Models\Tipoinmueble  $tipoinmueble
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoinmuebleRequest $request, Tipoinmueble $tipoinmueble)
    {   
       
        $tipoinmueble->update($request->validated());
        return redirect()->route('admin.tipoinmuebles.index')->with('success', 'El Item se ha modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipoinmueble  $tipoinmueble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoinmueble $tipoinmueble)
    {
        $tipoinmueble->delete();
        return back();
    }

    
}
