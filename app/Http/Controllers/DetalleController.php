<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Variable;
use DB;
use App\Http\Requests\StoreDetalleRequest;
use App\Http\Requests\UpdateDetalleRequest;

class DetalleController extends Controller
{
    
    public function index()
    {
       
        $detalles = Detalle::all();
 
        $variable = 3;
        return view('admin.detalles.index', compact('detalles','variable'));
       
    }

  
    public function create()
    {
        
        return view('admin.detalles.create');
    }

  
    public function store(StoreDetalleRequest $request)
    {
     
        $variable= Variable::find($request->variable_id);
        
        // esta trabajando con este tipo de insercion... el de create no funciona ?
        DB::table('detalles')
        ->insert(['variable_numeracion'=>$request->variable_id,
                  'nombre'=>$request->nombre
                ]);
        // no funciona asi... // Detalle::create($request->validated());
        $detalles = Detalle::where('variable_numeracion', $request->variable_id)->get();
      
        return view('admin.detalles.index', compact('detalles', 'variable'));
    }

 
    public function show(Detalle $detalle)
    {
       
      
        return view('admin.detalles.show', compact('detalle'));
        
      
        /*$variable = Variable::find($detalle->variable_id);
        $detalles = Detalle::where('variable_id', $variable->id)->get();
        return view('admin.detalles.show', compact('detalles', 'detalle','variable'));*/
    }

   

    public function edit(Detalle $detalle)
    {
        
        return view('admin.detalles.edit', compact('detalle'));
    }

    
    public function update(UpdateDetalleRequest $request, Detalle $detalle)
    {
        
        //return $request;
        DB::table('detalles')
        ->where('id', $request->variable_id)
            ->update(['nombre'=>$request->nombre
                     ]);  
       // $detalle->update($request->validated());
       $detalles = Detalle::where('variable_numeracion', $request->variable_numeracion)->get();
      
        $variable = Variable::find($detalle->variable_numeracion);
       
        $detalles = Detalle::where('variable_numeracion', $variable->id)->get();
        
        return view('admin.detalles.index', compact('detalles', 'variable'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle $detalle)
    {
        return " deshabilitado, revisar proceso";
        //$detalle->delete();
        $variable = Variable::find($detalle->variable_numeracion);
        $detalles = Detalle::where('variable_numeracion', $variable->id)->get();
        return view('admin.detalles.index', compact('detalles', 'variable'));
    }

    
}
