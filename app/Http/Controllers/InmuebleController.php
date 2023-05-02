<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRadicadoRequest;
use App\Http\Requests\UpdateRadicadoRequest;
use App\Models\Contacto;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Persona;
use App\Models\Radicado;
use App\Models\Tipoinmueble;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inmuebles = DB::table('inmuebles')
            ->leftjoin('avaluos as avaluo', 'avaluo.id', '=', 'inmuebles.avaluo_id')
            ->leftjoin('radicados as radicado', 'radicado.id', '=', 'avaluo.radicado_id')
            ->leftjoin('users as visitador', 'visitador.id', '=', 'avaluo.visitador_id')
            ->leftjoin('personas as cliente', 'cliente.id', '=', 'radicado.cliente_id')
            ->leftjoin('dependencias', 'dependencias.id', '=', 'inmuebles.dependencia_id')
            ->select('*',
                'inmuebles.id as inmueble_id',
                'avaluo.codigo as avaluo_codigo',
                'visitador.name as visitador_nombre',
                'montaje',
                'fecha_visita',
                'novedades',
                'radicado.direccion',
                'cliente.nombres as cliente_nombres',
                'cliente.apellidos as cliente_apellidos'
            )
            ->get();

        /**
         * Numeracion para tipos de inmueble es: 4 en la tabla variables
         */
        $tipo_inmuebles = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 4)
            ->get();

        /**
         * Numeracion para uso de inmueble es: 13 en la tabla variables
         */
        $usos = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 13)
            ->get();

        /**
         * Numeracion para estado de la construccion es: 2 en la tabla variables
         */
        $estados = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 2)
            ->get();

        /**
         * Numeracion para documentos es: 8 en la tabla variables
         */
        $documentos = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 8)
            ->get();

        /**
         * Numeracion para documentos es: TODO: Aun no se encuentra en la tabla variables
         */
        $acabados = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 2)
            ->get();

        /**
         * Numeracion para dotacion comunal o amenidades es: 14 en la tabla variables
         */
        $dotacion_comunal = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 14)
            ->get();

        /**
         * Numeracion para Servicios publicos sector y predio: 9 en la tabla variables
         */
        $servicios_sector_predio = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 9)
            ->get();

        /**
         * Numeracion para Servicios publicos contador: 10 en la tabla variables
         */
        $servicios_contador = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 10)
            ->get();

        /**
         * Numeracion para Topografia: 12 en la tabla variables
         */
        $topografias = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 12)
            ->get();

        //return $servicios_contador;
        return view('admin.inmuebles.index',
            compact(
                'inmuebles',
                'tipo_inmuebles',
                'usos',
                'estados',
                'documentos',
                'acabados',
                'dotacion_comunal',
                'servicios_sector_predio',
                'servicios_contador',
                'topografias'
            )
        );

    }

    /**
     * Retorna la informacion de un inmueble
     * @param  $id inmueble
     */
    public function infoInmueble($id)
    {

        $inmueble = DB::table('inmuebles')
            ->leftjoin('avaluos as avaluo', 'avaluo.id', '=', 'inmuebles.avaluo_id')
            ->leftjoin('users as visitador', 'visitador.id', '=', 'avaluo.visitador_id')
            ->leftjoin('radicados as radicado', 'radicado.id', '=', 'avaluo.radicado_id')
            //->leftjoin('contactos as contacto', 'contacto.id', '=', 'radicado.contacto_id')
            ->leftjoin('personas as cliente', 'cliente.id', '=', 'radicado.cliente_id')
            ->leftjoin('dependencias', 'dependencias.id', '=', 'inmuebles.dependencia_id')
            ->leftjoin('propiedad_horizontal', 'propiedad_horizontal.id', '=', 'inmuebles.propiedad_horizontal_id')
            ->leftjoin('detalles as tipo_inmueble', 'tipo_inmueble.id', '=', 'inmuebles.detalle_tipo_inmueble')
            ->leftjoin('detalles as uso_actual', 'uso_actual.id', '=', 'inmuebles.detalle_uso_actual')
            ->leftjoin('detalles as estado_construccion', 'estado_construccion.id', '=', 'inmuebles.detalle_estado_construccion')
            ->select(
                'inmuebles.id as innmueble_id',
                'inmuebles.variable_documentos_suministrados_numeracion',
                'visitador.name as visitador_nombre',
                'montaje',
                'avaluo.fecha_visita',
                'avaluo.codigo as avaluo_codigo',
                'novedades',
                'radicado.direccion',
                //'contacto.nombres as contacto_nombres',
                //'contacto.apellidos as contacto_apellidos',
                'cliente.nombres as cliente_nombres',
                'cliente.apellidos as cliente_apellidos',
                'detalle_documentos_suministrados',
                'detalle_dotacion_comunal',
                'detalle_servicios_sector',
                'detalle_servicios_predio',
                'detalle_servicios_contador',
                'estrato',
                'detalle_topografia',
                'numero_pisos',
                'numero_sotanos',
                'detalle_tipo_inmueble',
                'detalle_uso_actual',
                'detalle_estado_construccion',
                //dependencias
                'salas',
                'salas_area',
                'salas_detalle',
                'comedores',
                'comedores_area',
                'comedores_detalle',
                'estudios',
                'estudios_area',
                'estudios_detalle',
                'banos_sociales',
                'banos_sociales_area',
                'banos_sociales_detalle',
                'star_habitaciones',
                'star_habitaciones_area',
                'star_habitaciones_detalle',
                'habitaciones',
                'habitaciones_area',
                'habitaciones_detalle',
                'banos_privados',
                'banos_privados_area',
                'banos_privados_detalle',
                'cocinas',
                'cocinas_area',
                'cocinas_detalle',
                'cuartos_servicio',
                'cuartos_servicio_area',
                'cuartos_servicio_detalle',
                'banos_servicio',
                'banos_servicio_area',
                'banos_servicio_detalle',
                'patios_ropas',
                'patios_ropas_area',
                'patios_ropas_detalle',
                'terrazas',
                'terrazas_area',
                'terrazas_detalle',
                'jardines',
                'jardines_area',
                'jardines_detalle',
                'balcones',
                'balcones_area',
                'balcones_detalle',
                'zonas_verdes',
                'zonas_verdes_area',
                'zonas_verdes_detalle',
                'inmuebles.propiedad_horizontal_id',
                //propiedad horizontal
                'conjunto_cerrado',
                'ubicacion_inmueble',
                'numero_edificios',
                'unidades_por_piso',
                'total_unidades',
                'total_garajes',
                'total_garajes_comunales',
                'garajes_cubiertos',
                'garajes_descubiertos',
                'total_garajes_servidumbre_comunales',
                'garaje_sencillo',
                'garaje_doble',
                'total_depositos',
                'observaciones'

            )
            ->where('inmuebles.id', $id)
            ->first();
        /**
         * convertimos el string en una matriz para que querybuilder pueda relacionarno al whereIn
         */
        $detalles = $sections = explode(',', $inmueble->detalle_documentos_suministrados);
        $dotacion = $sections = explode(',', $inmueble->detalle_dotacion_comunal);
        $servicios_sector = $sections = explode(',', $inmueble->detalle_servicios_sector);
        $servicios_predio = $sections = explode(',', $inmueble->detalle_servicios_predio);
        $servicios_contador = $sections = explode(',', $inmueble->detalle_servicios_contador);

        /**
         * Pasamos el parametro a la consulta
         */
        $documentos_suministrados = DB::table('detalles')->select('*')->whereIn('id', $detalles)->get();
        $servicios_sector = DB::table('detalles')->select('*')->whereIn('id', $servicios_sector)->get();
        $servicios_predio = DB::table('detalles')->select('*')->whereIn('id', $servicios_predio)->get();
        $servicios_contador = DB::table('detalles')->select('*')->whereIn('id', $servicios_contador)->get();

        $dotacion_comunal = DB::table('detalles')->select('*')->whereIn('id', $dotacion)->get();

        /**
         * convertimos en objetos para poder mapearlos con claridad
         */
        $obj = (object) array(
            'inmueble' => $inmueble,
            'documentos_suministrados' => $documentos_suministrados,
            'dotacion_comunal' => $dotacion_comunal,
            'servicios_sector' => $servicios_sector,
            'servicios_predio' => $servicios_predio,
            'servicios_contador' => $servicios_contador,
        );

        return $obj;

    }

    /**
     * Remueve un Radicado seleccionado
     *
     * @param  $id radicado
     */
    public function eliminar($id)
    {
        //$deleted = Radicado::where('id', $id)->delete();
        return response()->json(['message' => 'Radicado eliminado']);
    }


    /**
     * Atualizar registro o crear registro.
     *
     * @return \Illuminate\Http\Request
     */
    //public function RadicadoControl(UpdateRadicadoRequest $request)
    public function inmuebleControl(Request $request)
    {

        return $request;
        $option = $request->input('option');
        if ($option == 'create') {

            DB::table('radicados')
                ->insert([
                    'user_id' => $request->user_id,
                    'numero_radicado' => $request->numero_radicado,
                    'estado' => 0,
                    'fecha' => $request->fecha,
                    'hora' => $request->hora,
                    'referente_id' => $request->referente_id,
                    'tipo_inmueble_id' => $request->tipo_inmueble_id,
                    'direccion' => $request->direccion,
                    'barrio' => $request->barrio,
                    'zona' => $request->zona,
                    'municipio_id' => $request->municipio_id,
                    'cliente_id' => $request->cliente_id,
                    'solicitante_id' => $request->solicitante_id,
                    'contacto_id' => $request->contacto_id,
                    'valor_referente' => $request->valor_referente,
                    'honorarios' => $request->honorarios,
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
                    'hora' => $request->hora,
                    'referente_id' => $request->referente_id,
                    'tipo_inmueble_id' => $request->tipo_inmueble_id,
                    'direccion' => $request->direccion,
                    'barrio' => $request->barrio,
                    'zona' => $request->zona,
                    'municipio_id' => $request->municipio_id,
                    'cliente_id' => $request->cliente_id,
                    'solicitante_id' => $request->solicitante_id,
                    'contacto_id' => $request->contacto_id,
                    'valor_referente' => $request->valor_referente,
                    'honorarios' => $request->honorarios,
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

        return view('admin.radicados.documentos', compact('documentos', 'radicado', 'rad'));
    }

}
