<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Documento;
use App\Models\Radicado;
use Illuminate\Http\Request;

class RadicadoController extends Controller
{
    /**
     * Muestra los registros encontrados en la tabla Radicados
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $radicados = DB::table('radicados')->where('estado', '0')
            ->leftjoin('personas as solicitante', 'solicitante.id', '=', 'radicados.solicitante_id')
            ->leftjoin('personas as cliente', 'cliente.id', '=', 'radicados.cliente_id')
            ->leftjoin('municipios', 'municipios.id', '=', 'radicados.municipio_id')
            ->leftjoin('departamentos', 'departamentos.id', '=', 'municipios.departamento_id')
            ->select('*', 'radicados.id as radicado_id', 'radicados.direccion as direccion','solicitante.nombres as solicitante_nombre', 'solicitante.apellidos as solicitante_apellidos', 'cliente.nombres as cliente_nombre', 'cliente.apellidos as cliente_apellidos', 'municipios.nombre as municipio_nombre', 'departamentos.nombre as departamento_nombre')
            ->get();



        $detalle_tipo_inmuebles = DB::table('detalles')
        ->select('*')
        ->where('variable_numeracion', 4)
        ->get();

        $detalle_tipo_creditos = DB::table('detalles')
        ->select('*')
        ->where('variable_numeracion', 16)
        ->get();

        return view('admin.radicados.index', compact('radicados', 'detalle_tipo_inmuebles', 'detalle_tipo_creditos'));
    }

    
    public function eliminar($id)
    {
        $deleted = Radicado::where('id', $id)->delete();
        return response()->json(['message' => 'Radicado eliminado']);
    }

    /**
     * Retorna la informacion de un radicado
     * @param  $id radicado
     */
    public function infoRadicado($id)
    {

        $radicados = DB::table('radicados')
            //->join('tipo_inmuebles', 'tipo_inmuebles.id', '=', 'radicados.tipo_inmueble_id')
            ->join('detalles as tipo_inmuebles', 'tipo_inmuebles.id', '=', 'detalle_tipo_inmueble_id')
            ->join('detalles as tipo_creditos', 'tipo_creditos.id', '=', 'detalle_tipo_credito_id')

            ->leftjoin('personas as referente', 'referente.id', '=', 'radicados.referente_id')
            ->leftjoin('personas as cliente', 'cliente.id', '=', 'radicados.cliente_id')
            ->leftjoin('personas as solicitante', 'solicitante.id', '=', 'radicados.solicitante_id')
           
            ->join('municipios', 'municipios.id', '=', 'radicados.municipio_id')
            ->join('departamentos', 'departamentos.id', '=', 'municipios.departamento_id')
            ->select(
                '*',
                'radicados.id as radicado_id',
                'radicados.fecha as radicado_fecha',
                'radicados.direccion as direccion',
                'tipo_inmuebles.id as tipo_inmueble_id', 'tipo_inmuebles.nombre as tipo_inmueble_nombre',
                'tipo_creditos.id as tipo_credito_id',     'tipo_creditos.nombre as tipo_credito_nombre',
                //'detalles.nombre as tipo_inmueble_nombre',
                'referente.id as referente_id', 'referente.nombres as referente_nombres', 'referente.apellidos as referente_apellidos',
                'cliente.id as cliente_id', 'cliente.nombres as cliente_nombres', 'cliente.apellidos as cliente_apellidos',
                'solicitante.id as solicitante_id', 'solicitante.nombres as solicitante_nombres', 'solicitante.apellidos as solicitante_apellidos',
                'solicitante.contacto_nombres as contacto_nombres',
                'municipios.id as municipio_id', 'municipios.nombre as municipio_nombre',
                'departamentos.id as departamento_id', 'departamentos.nombre as departamento_nombre',
                'radicados.fecha_honorarios as fecha_honorarios',
                'radicados.codigo_verificacion as codigo_verificacion',
           

            )
            ->where('radicados.id', $id)
            ->first();


        return response()->json($radicados);
    }


   
    public function radicadoControl(Request $request)
    {
      
        $option = $request->input('option');
        if ($option == 'create') {

            DB::table('radicados')
                ->insert([
                    'user_id' => $request->user_id,
                    'numero_radicado' => $request->numero_radicado,
                    'estado' => 0,
                    'fecha' => $request->fecha,
                    'referente_id' => $request->referente_id,
                    'detalle_tipo_inmueble_id' => $request->detalle_tipo_inmueble_id,
                    'direccion' => $request->direccion,
                    'barrio' => $request->barrio,
                    'zona' => $request->zona,
                    'municipio_id' => $request->municipio_id,
                    'cliente_id' => $request->cliente_id,
                    'solicitante_id' => $request->solicitante_id,
                    'detalle_tipo_credito_id' => $request->detalle_tipo_credito_id,
                    'valor_referente' => $request->valor_referente,
                    'honorarios' => $request->honorarios,
                    'fecha_honorarios' =>$request->fecha_honorarios,
                    'codigo_verificacion'=>$request->codigo_verificacion
                ]);

            return response()->json(['message' => 'Radicado creado']);
        }
        if ($option == 'update') {
            DB::table('radicados')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'numero_radicado' => $request->numero_radicado,
                    'estado' => 0,
                    'fecha' => $request->fecha,
                  
                    'referente_id' => $request->referente_id,
                    'detalle_tipo_inmueble_id' => $request->detalle_tipo_inmueble_id,
                    'direccion' => $request->direccion,
                    'barrio' => $request->barrio,
                    'zona' => $request->zona,
                    'municipio_id' => $request->municipio_id,
                    'cliente_id' => $request->cliente_id,
                    'solicitante_id' => $request->solicitante_id,
                    'detalle_tipo_credito_id' => $request->detalle_tipo_credito_id,
                    'valor_referente' => $request->valor_referente,
                    'honorarios' => $request->honorarios,
                    'fecha_honorarios' => $request->fecha_honorarios,
                    'codigo_verificacion' => $request->codigo_verificacion
                ]);

            return response()->json(['message' => 'Registro Actualizado']);
        }

        return response()->json(['message' => 'No se registro ningun cambio'], 400);
    }

    /**
     * Vista con los documentos de un radicado, el manejo de los documentos se relaizara por medio del controlador Documentos
     * @param  $id radicado
     */
    public function documentos($id)
    {

        $rad = Radicado::where('id', $id)->get();

        $radicado = DB::table('radicados')
            ->select('*')
            ->where('radicados.id', $id)
            ->first();

        $documentos = Documento::where('radicado_id', $id)->get();

        $option_view = 'radicados';

        return view('admin.radicados.documentos', compact('documentos', 'radicado', 'rad', 'option_view'));
    }

}
