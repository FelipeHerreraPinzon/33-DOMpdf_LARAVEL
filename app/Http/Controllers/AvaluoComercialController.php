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
use PDF;
use Illuminate\Http\Request;

class AvaluoComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $avaluos = DB::table('avaluos')
            ->join('detalles as estado', 'estado.id', '=', 'estado_visitador')
            ->leftjoin('inmuebles', 'inmuebles.avaluo_id', '=', 'avaluos.id')
            ->select(
                'inmuebles.id as inmueble_id',
                'avaluos.id',
                'codigo',
                'asigna_visitador',
                'fecha_visita',
                'novedades',
                'entrega_visitador',
                'estado.nombre as estado_nombre'
            )
            ->get();


        $detalle_estado_visitadores = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 15)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para tipos de inmueble es: 4 en la tabla variables
         */
        $tipo_inmuebles = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 4)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para uso de inmueble es: 13 en la tabla variables
         */
        $usos = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 13)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para estado de la construccion es: 2 en la tabla variables
         */
        $estados = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 2)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para documentos es: 8 en la tabla variables
         */
        $documentos = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 8)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para documentos es: TODO: Aun no se encuentra en la tabla variables
         */
        $acabados = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 16)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para dotacion comunal o amenidades es: 14 en la tabla variables
         */
        $dotacion_comunal = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 14)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para Servicios publicos sector y predio: 9 en la tabla variables
         */
        $servicios_sector_predio = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 9)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para Servicios publicos contador: 10 en la tabla variables
         */
        $servicios_contador = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 10)
            ->orderBy('nombre')
            ->get();

        /**
         * Numeracion para Topografia: 12 en la tabla variables
         */
        $topografias = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 12)
            ->orderBy('nombre')
            ->get();

        return view('admin.avaluoComercial.index', compact(
            'avaluos',
            'detalle_estado_visitadores',
            'tipo_inmuebles',
            'usos',
            'estados',
            'documentos',
            'acabados',
            'dotacion_comunal',
            'servicios_sector_predio',
            'servicios_contador',
            'topografias'
        ));
    }

    public function pdf(){

        $pdf = PDF::loadView('admin.avaluoComercial.pdf');
       // $pdf->loadHTML('<h1>TEST</>');
        return $pdf->stream('reporte.pdf');
  
  
       //  return view('admin.avaluoComercial.pdf'); 
  
      }

    public function infoArea($id)
    {
        $avaluos = DB::table('avaluos')
            ->select(
                'id',
                'codigo',
                'asigna_visitador',
                'fecha_visita',
                'novedades',
                'estado_visitador'

            )
            ->where('avaluos.id', $id)
            ->get();

        return response()->json($avaluos);
    }

    public function Control(Request $request)
    {

        DB::table('avaluos')
            ->where('id', $request->id)
            ->update([
                'asigna_visitador' => $request->asigna_visitador,
                'fecha_visita' => $request->fecha_visita,
                'novedades' => $request->novedades,
                'estado_visitador' => $request->estado_visitador,
            ]);
        return response()->json(['message' => 'Registro Actualizado']);

    }

    /**
     * Retorna la informacion de un Avaluo registrado
     * @param  $id inmueble
     */
    public function infoInformeAvaluo($id)
    {
        $avaluo = DB::table('avaluos as avaluo')
            ->join('radicados as radicado', 'radicado.id', '=', 'avaluo.radicado_id')
            ->join('personas as cliente', 'cliente.id', '=', 'radicado.cliente_id')
            ->join('personas as referente', 'referente.id', '=', 'radicado.referente_id')
            ->join('personas as solicitante', 'solicitante.id', '=', 'radicado.solicitante_id')
            ->join('users as visitador', 'visitador.id', '=', 'avaluo.visitador_id')
            ->leftjoin('inmuebles as  inmueble', 'inmueble.avaluo_id', '=', 'avaluo.id')
            ->leftjoin('dependencias', 'dependencias.id', '=', 'inmueble.dependencia_id')
            ->leftjoin('propiedad_horizontal', 'propiedad_horizontal.id', '=', 'inmueble.propiedad_horizontal_id')
            ->select(
                'inmueble.id as inmueble_id',
                'referente.nombres as referente_nombre',
                'solicitante.nombres as solicitante_nombre',
                'inmueble.variable_documentos_suministrados_numeracion',
                'visitador.name as visitador_nombre',
                'montaje',
                'avaluo.fecha_visita',
                'avaluo.codigo',
                'avaluo.codigo as avaluo_codigo',
                'novedades',
                'radicado.direccion',
                'inmueble.barrio',
                'inmueble.zona',
                'inmueble.zona',
                'nombre_conjunto',
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
                'dependencia_id',
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
                'inmueble.propiedad_horizontal_id',
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
            ->where('avaluo.id', $id)
            ->first();

        /**
         * Validamos que exista un avaluo para poder resolver las consultas de detalles
         */
        if ($avaluo->inmueble_id != null || $avaluo->inmueble_id != "") {

            /**
             * convertimos el string en una matriz para que querybuilder pueda relacionarno al whereIn
             */
            $detalles = $sections = explode(',', $avaluo->detalle_documentos_suministrados);
            $dotacion = $sections = explode(',', $avaluo->detalle_dotacion_comunal);
            $servicios_sector = $sections = explode(',', $avaluo->detalle_servicios_sector);
            $servicios_predio = $sections = explode(',', $avaluo->detalle_servicios_predio);
            $servicios_contador = $sections = explode(',', $avaluo->detalle_servicios_contador);

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
                'avaluo' => $avaluo,
                'documentos_suministrados' => $documentos_suministrados,
                'dotacion_comunal' => $dotacion_comunal,
                'servicios_sector' => $servicios_sector,
                'servicios_predio' => $servicios_predio,
                'servicios_contador' => $servicios_contador,
            );
        } else {
            $obj = (object) array(
                'avaluo' => $avaluo,
            );
        }

        return $obj;

    }
    /**
     * Control para crear o actualizar un informe de visita
     */
    public function informeAvaluoControl(Request $request)
    {

        //Para crear un inmueble se requiere una dependencia_id, propiedad_horizontal_id, avaluo_id
        $request = $request->data;
        $avaluo_id = $request["informe_avaluo_id"];
        $propiedad_horizontal_id = $request["informe_propiedad_horizontal_id"];
        $dependencia_id = $request["informe_dependencia_id"];
        $inmueble_id = $request["informe_inmueble_id"];

        //transaccion para crear registros requeridos para un inmueble
        DB::transaction(function () use ($request, $avaluo_id, $propiedad_horizontal_id, $dependencia_id, $inmueble_id) {

            //creacion de dependencia
            $dependencia = DB::table('dependencias')->updateOrInsert(
                ['id' => $dependencia_id],
                [
                    'salas' => $request["salas"],
                    'salas_area' => $request["salas_area"],
                    'salas_detalle' => $request["salas_detalle"],
                    'comedores' => $request["comedores"],
                    'comedores_area' => $request["comedores_area"],
                    'comedores_detalle' => $request["comedores_detalle"],
                    'estudios' => $request["estudios"],
                    'estudios_area' => $request["estudios_area"],
                    'estudios_detalle' => $request["estudios_detalle"],
                    'banos_sociales' => $request["banos_sociales"],
                    'banos_sociales_area' => $request["banos_sociales_area"],
                    'banos_sociales_detalle' => $request["banos_sociales_detalle"],
                    'star_habitaciones' => $request["star_habitaciones"],
                    'star_habitaciones_area' => $request["star_habitaciones_area"],
                    'star_habitaciones_detalle' => $request["star_habitaciones_detalle"],
                    'habitaciones' => $request["habitaciones"],
                    'habitaciones_area' => $request["habitaciones_area"],
                    'habitaciones_detalle' => $request["habitaciones_detalle"],
                    'banos_privados' => $request["banos_privados"],
                    'banos_privados_area' => $request["banos_privados_area"],
                    'banos_privados_detalle' => $request["banos_privados_detalle"],
                    'cocinas' => $request["cocinas"],
                    'cocinas_area' => $request["cocinas_area"],
                    'cocinas_detalle' => $request["cocinas_detalle"],
                    'cuartos_servicio' => $request["cuartos_servicio"],
                    'cuartos_servicio_area' => $request["cuartos_servicio_area"],
                    'cuartos_servicio_detalle' => $request["cuartos_servicio_detalle"],
                    'banos_servicio' => $request["banos_servicio"],
                    'banos_servicio_area' => $request["banos_servicio_area"],
                    'banos_servicio_detalle' => $request["banos_servicio_detalle"],
                    'patios_ropas' => $request["patios_ropas"],
                    'patios_ropas_area' => $request["patios_ropas_area"],
                    'patios_ropas_detalle' => $request["patios_ropas_detalle"],
                    'terrazas' => $request["terrazas"],
                    'terrazas_area' => $request["terrazas_area"],
                    'terrazas_detalle' => $request["terrazas_detalle"],
                    'jardines' => $request["jardines"],
                    'jardines_area' => $request["jardines_area"],
                    'jardines_detalle' => $request["jardines_detalle"],
                    'balcones' => $request["balcones"],
                    'balcones_area' => $request["balcones_area"],
                    'balcones_detalle' => $request["balcones_detalle"],
                    'zonas_verdes' => $request["zonas_verdes"],
                    'zonas_verdes_area' => $request["zonas_verdes_area"],
                    'zonas_verdes_detalle' => $request["zonas_verdes_detalle"],
                ]
            );

            //creamos la propiedad horizontal
            $propiedad_horizontal = DB::table('propiedad_horizontal')->updateOrInsert(
                ['id' => $propiedad_horizontal_id],
                [
                    'conjunto_cerrado' => $request["conjunto_cerrado"],
                    'ubicacion_inmueble' => $request["ubicacion_inmueble"],
                    'numero_edificios' => $request["numero_edificios"],
                    'unidades_por_piso' => $request["unidades_por_piso"],
                    'total_unidades' => $request["total_unidades"],
                    'total_garajes' => $request["total_garajes"],
                    'total_garajes_comunales' => $request["total_garajes_comunales"],
                    'garajes_cubiertos' => $request["garajes_cubiertos"],
                    'garajes_descubiertos' => $request["garajes_descubiertos"],
                    'total_garajes_servidumbre_comunales' => $request["total_garajes_servidumbre_comunales"],
                    'garaje_sencillo' => $request["garaje_sencillo"],
                    'garaje_doble' => $request["garaje_doble"],
                    'total_depositos' => $request["total_depositos"],
                ]);

            //validamos si el inmueble ya existe para que no salga error al modificar una llave foranea
            if ($inmueble_id == null || $inmueble_id == "") {
                $inmueble = DB::table('inmuebles')->updateOrInsert(
                    ['id' => $inmueble_id],
                    [
                        'barrio' => $request["barrio"],
                        'zona' => $request["zona"],
                        'nombre_conjunto' => $request["nombre_conjunto"],
                        'montaje' => $request["montaje"],
                        'numero_pisos' => $request["numero_pisos"],
                        'numero_sotanos' => $request["numero_sotanos"],
                        'vetustez' => $request["vetustez"],
                        'estrato' => $request["estrato"],
                        'observaciones' => $request["observaciones"],
                        'dependencia_id' => $dependencia,
                        'propiedad_horizontal_id' => $propiedad_horizontal,
                        'detalle_documentos_suministrados' => $request["detalle_documentos_suministrados"],
                        'detalle_servicios_sector' => $request["detalle_servicios_sector"],
                        'detalle_servicios_predio' => $request["detalle_servicios_predio"],
                        'detalle_servicios_contador' => $request["detalle_servicios_contador"],
                        'detalle_topografia' => $request["detalle_topografia"],
                        'detalle_tipo_inmueble' => $request["detalle_tipo_inmueble"],
                        'detalle_uso_actual' => $request["detalle_uso_actual"],
                        'detalle_estado_construccion' => $request["detalle_estado_construccion"],
                        'detalle_dotacion_comunal' => $request["detalle_dotacion_comunal"],
                    ]);
            } else {
                $inmueble = DB::table('inmuebles')->updateOrInsert(
                    ['id' => $inmueble_id],
                    [
                        'barrio' => $request["barrio"],
                        'zona' => $request["zona"],
                        'nombre_conjunto' => $request["nombre_conjunto"],
                        'montaje' => $request["montaje"],
                        'numero_pisos' => $request["numero_pisos"],
                        'numero_sotanos' => $request["numero_sotanos"],
                        'vetustez' => $request["vetustez"],
                        'estrato' => $request["estrato"],
                        'observaciones' => $request["observaciones"],
                        'detalle_documentos_suministrados' => $request["detalle_documentos_suministrados"],
                        'detalle_servicios_sector' => $request["detalle_servicios_sector"],
                        'detalle_servicios_predio' => $request["detalle_servicios_predio"],
                        'detalle_servicios_contador' => $request["detalle_servicios_contador"],
                        'detalle_topografia' => $request["detalle_topografia"],
                        'detalle_tipo_inmueble' => $request["detalle_tipo_inmueble"],
                        'detalle_uso_actual' => $request["detalle_uso_actual"],
                        'detalle_estado_construccion' => $request["detalle_estado_construccion"],
                        'detalle_dotacion_comunal' => $request["detalle_dotacion_comunal"],
                    ]);
            }
        });

        return response()->json(['message' => 'Registro Actualizado']);

    }

    /**
     * Ruta que muestra las imagenes agregadas a el inmueble indicado estos formularios de carga documental e imagenes son controlados por DocumentoController
     */
    public function imagenesInmueble($id){

        $inmueble = Radicado::where('id', $id)->get();

        $inmueble = DB::table('inmuebles')
        ->join('avaluos' , 'avaluos.id', '=', 'inmuebles.avaluo_id')
            ->select('*',
            'inmuebles.id as inmueble_id'
            )
            ->where('inmuebles.id', $id)
            ->first();

        $documentos = Documento::where('inmueble_id', $id)->get();

        $option_view = 'inmuebles';

        return view('admin.areas.imgInforme', compact('documentos', 'inmueble',  'option_view'));
    }

}
