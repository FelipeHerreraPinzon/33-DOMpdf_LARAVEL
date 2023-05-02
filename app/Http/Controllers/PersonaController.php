<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Contacto;
use App\Models\Tipodocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Detalle;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;

class PersonaController extends Controller
{
   

    public function index(Request $request)
    {
        $detalle_tipo_documentos = DB::table('detalles')
        ->select('*')
        ->where('variable_numeracion', 3)
        ->get();
       
        $personas = DB::table('personas')
        ->where('persona_tipo','=',1)
        ->join('detalles', 'detalles.id','=','personas.detalle_tipo_documento_id')
        ->leftjoin('municipios', 'municipios.id', '=', 'personas.municipio_id')
        ->leftjoin('departamentos', 'departamentos.id', '=', 'municipios.departamento_id')
        ->select(
               
                'personas.id as persona_id',
                'detalles.nombre as documento_nombre',
                'personas.numero_documento as persona_numero_documento', 
                'personas.nombres as persona_nombres', 
                'personas.apellidos as persona_apellidos',
                'personas.celular as persona_celular',
                'personas.telefono_fijo as persona_telefono_fijo',
                'personas.correo as persona_correo',
                'personas.codigo_postal as persona_codigo_postal',
                'personas.direccion as persona_direccion',
                'municipios.id as municipio_id',
                'municipios.nombre as municipio_nombre',
                'departamentos.nombre as departamento_nombre',
                'personas.contacto_nombres as contacto_nombres'
                //'contactos.apellidos as contacto_apellidos'

        )
        ->get();
        return view('admin.personas.index', compact('personas','detalle_tipo_documentos'));
    }

    public function indexSolicitante(Request $request)
    {
        $detalle_tipo_documentos = DB::table('detalles')
        ->select('*')
            ->where('variable_numeracion', 3)
            ->get();

        $personas = DB::table('personas')
            ->where('persona_tipo', '=', 0)
        ->join('detalles', 'detalles.id', '=', 'personas.detalle_tipo_documento_id')
        /*->join('municipios', 'municipios.id', '=', 'personas.municipio_id')*/
        /*->join('departamentos', 'departamentos.id', '=', 'municipios.departamento_id')*/
        ->select(

            'personas.id as persona_id',
            'detalles.nombre as documento_nombre',
            'personas.numero_documento as persona_numero_documento',
            'personas.nombres as persona_nombres',
            'personas.apellidos as persona_apellidos',
            'personas.celular as persona_celular',
            'personas.telefono_fijo as persona_telefono_fijo',
            'personas.correo as persona_correo',
            'personas.codigo_postal as persona_codigo_postal',
            'personas.direccion as persona_direccion',
            /*'municipios.id as municipio_id',*/
            /*'municipios.nombre as municipio_nombre',*/
            /*'departamentos.nombre as departamento_nombre',*/
            'personas.contacto_nombres as contacto_nombres',
            'personas.contacto_telefono as contacto_telefono'
            //'contactos.apellidos as contacto_apellidos'

        )
            ->get();
        return view('admin.solicitantes.index', compact('personas', 'detalle_tipo_documentos'));
       
    }
   
  
    public function store(StorePersonaRequest $request)
    {

        Persona::create($request->validated());
        return redirect()->route('admin.personas.index')->with('success','Persona ingresada correctamente');
    }

    

    public function infoPersona($id)
    {

     
        $personas = DB::table('personas')
        ->join('detalles as tipo_documento', 'tipo_documento.id', '=', 'personas.detalle_tipo_documento_id')

       // ->join('detalles', 'detalles.id', '=', 'personas.detalle_tipo_documento_id')
        ->leftjoin('municipios', 'municipios.id', '=', 'personas.municipio_id')
        ->leftjoin('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')


        ->select(
            'personas.id as persona_id',
            //'detalles.id as detalle_id',
            'persona_tipo',  
            'tipo_documento.id as tipo_documento_id',
            'tipo_documento.nombre as tipo_documento_nombre',

            //'detalles.nombre as documento_nombre',
            'personas.numero_documento', 
            'personas.nombres',
            'personas.apellidos',
            'personas.celular',
            'personas.telefono_fijo',
            'personas.correo',
            'personas.codigo_postal',
            'personas.direccion',
            'municipios.id as municipio_id',
            'municipios.nombre as municipio_nombre',
            'departamentos.nombre as departamento_nombre',
            'personas.contacto_nombres',
            'personas.contacto_telefono',
            'personas.contacto_cargo',
           
            //'contactos.id as contacto_id', 'contactos.nombres as contacto_nombres', 'contactos.apellidos as contacto_apellidos'
            )
        ->where('personas.id', $id)
        ->get();

      
        return response()->json($personas);
    }

    public function infoSolicitante($id)
    {


        $personas = DB::table('personas')
        ->join('detalles as tipo_documento', 'tipo_documento.id', '=', 'personas.detalle_tipo_documento_id')

        // ->join('detalles', 'detalles.id', '=', 'personas.detalle_tipo_documento_id')
        ->leftjoin('municipios', 'municipios.id', '=', 'personas.municipio_id')
        ->leftjoin('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')


        ->select(
            'personas.id as persona_id',
            //'detalles.id as detalle_id',
            'persona_tipo',
            'tipo_documento.id as tipo_documento_id',
            'tipo_documento.nombre as tipo_documento_nombre',

            //'detalles.nombre as documento_nombre',
            'personas.numero_documento',
            'personas.nombres',
            'personas.apellidos',
            'personas.celular',
            'personas.telefono_fijo',
            'personas.correo',
            'personas.codigo_postal',
            'personas.direccion',
            'municipios.id as municipio_id',
            'municipios.nombre as municipio_nombre',
            'departamentos.nombre as departamento_nombre',
            'personas.contacto_nombres',
            'personas.contacto_telefono',
            'personas.contacto_cargo',

            //'contactos.id as contacto_id', 'contactos.nombres as contacto_nombres', 'contactos.apellidos as contacto_apellidos'
        )
        ->where('personas.id', $id)
        ->get();

        return ($personas);
        return response()->json($personas);
       
    }


    public function Control(Request $request)
    {
      
       // dd($request);
        $option = $request->input('option');
       
        if ($option == 'create') {
           

            DB::table('personas')
            
                ->insert([
                    //'detalle_tipo_documento_id' => $request->tipo_documento_id,
                    'persona_tipo'=>$request->persona_tipo,
                    'detalle_tipo_documento_id' => $request->detalle_tipo_documento_id,
                    'numero_documento' => $request->numero_documento,
                    'nombres'=> $request->nombres,
                    'apellidos' => $request->apellidos,
                    'celular' => $request->celular,
                    'telefono_fijo' => $request->telefono_fijo,
                    'correo' => $request->correo,
                    'codigo_postal' => $request->codigo_postal,
                    'direccion' => $request->direccion,
                    'municipio_id' => $request->municipio_id,
                    'contacto_nombres'=>$request->contacto_nombres,
                    'contacto_telefono'=>$request->contacto_telefono,
                    'contacto_cargo'=>$request->contacto_cargo
                  
                ]);


            return response()->json(['message' => 'Persona creada']);
        }
        if ($option == 'update') {
            DB::table('personas')
                ->where('id', $request->id)
                ->update([
                'persona_tipo' => $request->persona_tipo,
                'detalle_tipo_documento_id' => $request->detalle_tipo_documento_id,
                'numero_documento' => $request->numero_documento,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'celular' => $request->celular,
                'telefono_fijo' => $request->telefono_fijo,
                'correo' => $request->correo,
                'codigo_postal' => $request->codigo_postal,
                'direccion' => $request->direccion,
                'municipio_id' => $request->municipio_id,
                'contacto_nombres' => $request->contacto_nombres,
                'contacto_telefono' => $request->contacto_telefono,
                'contacto_cargo' => $request->contacto_cargo
               
                ]);

            return response()->json(['message' => 'Registro Actualizado']);
        }

        return response()->json(['message' => 'No se registro ningun cambio'], 400);
    }


    public function ControlSolicitante(Request $request)
    {

        $option = $request->input('option');

        if ($option == 'create') {


            DB::table('personas')

            ->insert([
                //'detalle_tipo_documento_id' => $request->tipo_documento_id,
                'persona_tipo' => $request->persona_tipo,
                'detalle_tipo_documento_id' => $request->detalle_tipo_documento_id,
                'numero_documento' => $request->numero_documento,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'celular' => $request->celular,
                'telefono_fijo' => $request->telefono_fijo,
                /*'correo' => $request->correo,*/
                'codigo_postal' => $request->codigo_postal,
                /*'direccion' => $request->direccion,
                'municipio_id' => $request->municipio_id,*/
                'contacto_nombres' => $request->contacto_nombres,
                'contacto_telefono' => $request->contacto_telefono
                /*'contacto_cargo' => $request->contacto_cargo*/

            ]);


            return response()->json(['message' => 'Persona creada']);
        }
        if ($option == 'update') {
            DB::table('personas')
            ->where('id', $request->id)
                ->update([
                    'persona_tipo' => $request->persona_tipo,
                    'detalle_tipo_documento_id' => $request->detalle_tipo_documento_id,
                    'numero_documento' => $request->numero_documento,
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'celular' => $request->celular,
                    'telefono_fijo' => $request->telefono_fijo,
                    'correo' => $request->correo,
                    'codigo_postal' => $request->codigo_postal,
                   /* 'direccion' => $request->direccion,
                    'municipio_id' => $request->municipio_id,*/
                    'contacto_nombres' => $request->contacto_nombres,
                    'contacto_telefono' => $request->contacto_telefono,
                    /*'contacto_cargo' => $request->contacto_cargo*/

                ]);

            return response()->json(['message' => 'Registro Actualizado']);
        }

        return response()->json(['message' => 'No se registro ningun cambio'], 400);
    }



    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $persona->update($request->validated());
        return redirect()->route('admin.personas.index')->with('success','Datos de la Persona han sido modificados');
    }

    public function eliminar($id)
    {
        $deleted = Persona::where('id', $id)->delete();
        return response()->json(['message' => 'Persona eliminada']);
    }

    public function eliminarSolicitante($id)
    {
        $deleted = Persona::where('id', $id)->delete();
        return response()->json(['message' => 'Solicitante eliminado']);
    }


    public function prueba()
    {
       return 'hola';
    }
}
