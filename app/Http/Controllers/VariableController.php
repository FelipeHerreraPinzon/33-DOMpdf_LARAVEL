<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use App\Models\Detalle;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreVariableRequest;
use App\Http\Requests\UpdateVariableRequest;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $variables = Variable::all();
   
        return view('admin.variables.index', compact('variables'));
    }

    public function create()
    {   
        $ultimo=Variable::latest('numeracion')->first();
      
        return view('admin.variables.create', compact('ultimo'));
    }

    
    public function store(Request $request)
    {
      
        Variable::create($request->validated());
        return redirect()->route('admin.variables.index')->with('success', ' Variable creada exitosamente');
    }

   
    /*public function show(Variable $variable)
    {
        $detalles = Detalle::where('variable_id', $variable->id)->get();
        return view('admin.detalles.index', compact('detalles', 'variable'));
    }*/

    public function muestraDetalle($variable)
    {   
        $detalles = Detalle::where('variable_numeracion', $variable)->get();
        $variable = Variable::where('numeracion',$variable)->first();
        /*->join('variables', 'variables.id', 'detalles.variable_numeracion')
        ->select('*', 'variables.nombre as variable_nombre')
        ->get();*/

        
        return view('admin.detalles.index', compact('detalles', 'variable'));
    }

    
    public function edit(Variable $variable)
    {

        /* $detalles = Detalle::where('variable_id', $variable->id)->get();
        return view('admin.detalles.index', compact('detalles','variable'));*/
        return view('admin.variables.edit', compact('variable'));
    }

    public function ultimoRegistro()
    {
        //dd("entre de 2");
        $ultimo = Variable::latest('numeracion')->first();
        return  response()->json($ultimo);
    }

    public function infoVariable($id)
    {
           
       $variables = DB::table('variables')
       ->where('id',$id)
       ->get();

        return response()->json($variables);
    }

    public function Control(Request $request)
    {
       
        $option = $request->input('option');

        if ($option == 'create') {
            DB::table('variables')

            ->insert([
                //'detalle_tipo_documento_id' => $request->tipo_documento_id,
                'numeracion' => $request->numeracion,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                
            ]);

            return response()->json(['message' => 'Variable creada']);
        }
        if ($option == 'update') {
            DB::table('variables')
            ->where('id', $request->id)
                ->update([
                    'numeracion' => $request->numeracion,
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                   
                ]);

            return response()->json(['message' => 'Registro Actualizado']);
        }

        return response()->json(['message' => 'No se registro ningun cambio'], 400);
    }
    public function update(UpdateVariableRequest $request, Variable $variable)
    {
        
        $variable->update($request->validated());
        return redirect()->route('admin.variables.index')->with('success', 'La Variable se ha modificado');
    }

     
    public function destroy(Variable $variable)
    {
        $variable->delete();
        return back();
    }
}
