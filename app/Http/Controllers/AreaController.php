<?php

namespace App\Http\Controllers;

use App\Models\Avaluo;
use App\Models\Documento;
use App\Models\Radicado;
use App\Models\Dependencia;
use App\Models\PropiedadHorizontal;
use App\Models\Inmueble;
use App\Models\Sector;
use DB;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function index(Request $request)
    {
        $avaluos = DB::table('avaluos')
            ->join('detalles as estado', 'estado.id', '=', 'estado_visitador')
            ->join('radicados as radicado', 'radicado.id', '=', 'avaluos.radicado_id')
            ->join('personas as solicitante', 'solicitante.id', '=', 'radicado.solicitante_id')
            ->leftjoin('inmuebles', 'inmuebles.avaluo_id', '=', 'avaluos.id')
            ->select(
                'inmuebles.id as inmueble_id',
                'avaluos.id',
                'codigo',
                'asigna_visitador',
                'fecha_visita',
                'novedades',
                'entrega_visitador',
                'estado.nombre as estado_nombre',
                'solicitante.nombres as solicitante_nombres',
                'solicitante.apellidos as solicitante_apellidos'
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
            ->orderBy('id')
            ->get();

        /**
         * Numeracion para documentos es: TODO: Aun no se encuentra en la tabla variables
         */
        $acabados = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 18)
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

        return view('admin.areas.index', compact(
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

    public function infoArea($id)
    {

        $avaluos = DB::table('avaluos')
            ->join('radicados as radicado', 'radicado.id', '=', 'avaluos.radicado_id')
            ->join('personas as solicitante', 'solicitante.id', '=', 'radicado.solicitante_id')
            ->join('municipios', 'municipios.id', '=', 'radicado.municipio_id')
            ->select(
                'avaluos.id as id',
                'avaluos.codigo as codigo',
                'asigna_visitador',
                'fecha_visita',
                'novedades',
                'estado_visitador',
                'solicitante.nombres as solicitante_nombre',
                'solicitante.apellidos as solicitante_apellidos',
                'radicado.direccion as solicitante_direccion',
                'municipios.nombre as solicitante_municipio',
                'solicitante.contacto_nombres as solicitante_contacto_nombre',
                'solicitante.contacto_telefono as solicitante_contacto_telefono'

            )
            ->where('avaluos.id', $id)
            ->get();
        return $avaluos;
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
        alert("aqui debe notificar al Aux Bancario");
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
            ->leftjoin('dependencias', 'dependencias.inmueble_id', '=', 'inmueble.id')
            ->leftjoin('propiedad_horizontal', 'propiedad_horizontal.inmueble_id', '=', 'inmueble.id')
            ->leftjoin('sector', 'sector.id', '=', 'inmueble.sector_id')
            //->leftjoin('juridica', 'juridica.id', '=', 'inmueble.juridica_id')
            ->select(
                'sector.id as sector_id',
                //'juridica.id as inmueble_id',
                'inmueble.id as inmueble_id',
                'sometido',
                'inmueble.direccion',
                'inmueble.latitud',
                'inmueble.longitud',
                'inmueble.vetustez',
                'inmueble.atendido_por',
                'inmueble.telefono',
                'referente.nombres as referente_nombre',
                'solicitante.nombres as solicitante_nombre',
                //'inmueble.variable_documentos_suministrados_numeracion',
                'visitador.name as visitador_nombre',
                'montaje',
                'avaluo.fecha_visita',
                'avaluo.codigo',
                'avaluo.codigo as avaluo_codigo',
                'novedades',
                //'radicado.direccion',
                'inmueble.barrio',
                'inmueble.zona',
                'inmueble.zona',
                'nombre_conjunto',
                'cliente.nombres as cliente_nombres',
                'cliente.apellidos as cliente_apellidos',
                'detalle_documentos_suministrados',
                'detalle_dotacion_comunal',
                //'detalle_servicios_sector',
                'detalle_servicios_predio',
                'detalle_servicios_contador',
                'inmueble.estrato',
                'detalle_topografia',
                'numero_pisos',
                'numero_sotanos',
                'detalle_tipo_inmueble',
                'detalle_uso_actual',
                'detalle_estado_construccion',
                //dependencias
                'dependencias.id as dependencia_id',
                'salas',
                'salas_area',
                'detalle_acabados_salas_id',
                'comedores',
                'comedores_area',
                'detalle_acabados_comedores_id',
                'estudios',
                'estudios_area',
                'detalle_acabados_estudios_id',
                'banos_sociales',
                'banos_sociales_area',
                'detalle_acabados_banos_sociales_id',
                'star_habitaciones',
                'star_habitaciones_area',
                'detalle_acabados_star_habitaciones_id',
                'habitaciones',
                'habitaciones_area',
                'detalle_acabados_habitaciones_id',
                'banos_privados',
                'banos_privados_area',
                'detalle_acabados_banos_privados_id',
                'cocinas',
                'cocinas_area',
                'detalle_acabados_cocinas_id',
                'cuartos_servicio',
                'cuartos_servicio_area',
                'detalle_acabados_cuartos_servicio_id',
                'banos_servicio',
                'banos_servicio_area',
                'detalle_acabados_banos_servicio_id',
                'patios_ropas',
                'patios_ropas_area',
                'detalle_acabados_patios_ropas_id',
                'terrazas',
                'terrazas_area',
                'detalle_acabados_terrazas_id',
                'jardines',
                'jardines_area',
                //'detalle_acabados_jardines_id',
                'balcones',
                'balcones_area',
                'detalle_acabados_balcones_id',
                'zonas_verdes',
                'zonas_verdes_area',
                //'detalle_acabados_zonas_verdes_id',
                'propiedad_horizontal.id as propiedad_horizontal_id',
                //propiedad horizontal
                'propiedad_horizontal.conjunto_cerrado',
                'propiedad_horizontal.ubicacion_inmueble',
                'propiedad_horizontal.numero_edificios',
                'propiedad_horizontal.unidades_por_piso',
                'propiedad_horizontal.total_unidades',
                'propiedad_horizontal.total_garajes',
                'propiedad_horizontal.total_garajes_comunales',
                'propiedad_horizontal.garajes_cubiertos',
                'propiedad_horizontal.garajes_descubiertos',
                'propiedad_horizontal.total_garajes_servidumbre_comunales',
                'propiedad_horizontal.garaje_sencillo',
                'propiedad_horizontal.garaje_doble',
                'propiedad_horizontal.total_depositos',
                'observaciones'

            )
            ->where('avaluo.id', $id)
            ->first();

            //tomamos los servicios del sector del inmueble de la tabla sector 
            $sector = DB::table('inmuebles')
                ->join('sector','sector.id','=','inmuebles.sector_id')
                ->select('detalle_servicios_sector')
                ->where('inmuebles.id','=',$avaluo->inmueble_id)
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
            $servicios_sector = $sections = explode(',', $sector->detalle_servicios_sector);
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
        $sector_id = $request["informe_sector_id"];
        $sometido = $request["sometido"];

        //'inmueble.variable_documentos_suministrados_numeracion',
        //'detalle_servicios_sector',
        //'detalle_acabados_jardines_id',
        //'detalle_acabados_zonas_verdes_id',

        //transaccion para crear registros requeridos para un inmueble
        DB::transaction(function () use ($request, $avaluo_id, $propiedad_horizontal_id, $dependencia_id, $inmueble_id, $sector_id, $sometido) {

            $sector = Sector::updateOrCreate(
                ['id' => $sector_id],
                [
                    //'inmueble_id' => $inmueble->id,
                    //'estrato' => $request['estrato'],
                    //'legalidad' => $request['legalidad'],
                    //'detalle_topografia_id' => $request['detalle_topografia_id'],
                    //'detalle_transporte_id' => $request['detalle_transporte_id'],
                    //'detalle_uso_predominante_id' => $request['detalle_uso_predominante_id'],
                    'detalle_servicios_sector' => $request['detalle_servicios_sector'],
                    //'detalle_vias_acceso' => $request['detalle_vias_acceso'],
                    //'detalle_estado_vias_acceso_id' => $request['detalle_estado_vias_acceso_id'],
                    //'detalle_amoblamiento_urbano' => $request['detalle_amoblamiento_urbano'],
                    //'perspectivas_valorizacion' => $request['perspectivas_valorizacion'],
                ]);

                //validamos si el inmueble ya existe para que no salga error al modificar una llave foranea por las relaciones de juridica y sector 
            if ($inmueble_id == null || $inmueble_id == "") {
                $inmueble = Inmueble::updateOrCreate(
                    ['id' => $inmueble_id],
                    [
                        'avaluo_id' => $avaluo_id,
                        'sector_id' => $sector->id,
                        'direccion' => $request["direccion"],
                        'sometido' => $request["sometido"],
                        'barrio' => $request["barrio"],
                        'zona' => $request["zona"],
                        'atendido_por' => $request["atendido_por"],
                        'atendido_por' => $request["telefono"],
                        'nombre_conjunto' => $request["nombre_conjunto"],
                        'montaje' => $request["montaje"],
                        'numero_pisos' => $request["numero_pisos"],
                        'numero_sotanos' => $request["numero_sotanos"],
                        'vetustez' => $request["vetustez"],
                        'latitud' => $request["latitud"],
                        'longitud' => $request["longitud"],
                        'estrato' => $request["estrato"],
                        'observaciones' => $request["observaciones"],
                        //'dependencia_id' => $dependencia->id,
                        //'propiedad_horizontal_id' => $propiedad_horizontal->id,
                        'detalle_documentos_suministrados' => $request["detalle_documentos_suministrados"],
                        //'detalle_servicios_sector' => $request["detalle_servicios_sector"],
                        'detalle_servicios_predio' => $request["detalle_servicios_predio"],
                        'detalle_servicios_contador' => $request["detalle_servicios_contador"],
                        'detalle_topografia' => $request["detalle_topografia"],
                        'detalle_tipo_inmueble' => $request["detalle_tipo_inmueble"],
                        'detalle_uso_actual' => $request["detalle_uso_actual"],
                        'detalle_estado_construccion' => $request["detalle_estado_construccion"],
                        'detalle_dotacion_comunal' => $request["detalle_dotacion_comunal"]
                    ]);
                    $inmueble = $inmueble;
            } else {
                $inmueble = Inmueble::updateOrCreate(
                    ['id' => $inmueble_id],
                    [
                        'direccion' => $request["direccion"],
                        'sometido' => $request["sometido"],
                        'barrio' => $request["barrio"],
                        'zona' => $request["zona"],
                        'atendido_por' => $request["atendido_por"],
                        'telefono' => $request["telefono"],
                        'nombre_conjunto' => $request["nombre_conjunto"],
                        'montaje' => $request["montaje"],
                        'numero_pisos' => $request["numero_pisos"],
                        'numero_sotanos' => $request["numero_sotanos"],
                        'vetustez' => $request["vetustez"],
                        'latitud' => $request["latitud"],
                        'longitud' => $request["longitud"],
                        'estrato' => $request["estrato"],
                        'observaciones' => $request["observaciones"],
                        'detalle_documentos_suministrados' => $request["detalle_documentos_suministrados"],
                        //'detalle_servicios_sector' => $request["detalle_servicios_sector"],
                        'detalle_servicios_predio' => $request["detalle_servicios_predio"],
                        'detalle_servicios_contador' => $request["detalle_servicios_contador"],
                        'detalle_topografia' => $request["detalle_topografia"],
                        'detalle_tipo_inmueble' => $request["detalle_tipo_inmueble"],
                        'detalle_uso_actual' => $request["detalle_uso_actual"],
                        'detalle_estado_construccion' => $request["detalle_estado_construccion"],
                        'detalle_dotacion_comunal' => $request["detalle_dotacion_comunal"],
                        'avaluo_id' => $avaluo_id
                    ]);
                    $inmueble = $inmueble;
            }

            //creacion de dependencia
            $dependencia = Dependencia::updateOrCreate(
                ['id' => $dependencia_id],
                [
                    'inmueble_id' => $inmueble->id,
                    'salas' => $request["salas"],
                    'salas_area' => $request["salas_area"],
                    'detalle_acabados_salas_id' => $request["salas_detalle"],
                    'comedores' => $request["comedores"],
                    'comedores_area' => $request["comedores_area"],
                    'detalle_acabados_comedores_id' => $request["comedores_detalle"],
                    'estudios' => $request["estudios"],
                    'estudios_area' => $request["estudios_area"],
                    'detalle_acabados_estudios_id' => $request["estudios_detalle"],
                    'banos_sociales' => $request["banos_sociales"],
                    'banos_sociales_area' => $request["banos_sociales_area"],
                    'detalle_acabados_banos_sociales_id' => $request["banos_sociales_detalle"],
                    'star_habitaciones' => $request["star_habitaciones"],
                    'star_habitaciones_area' => $request["star_habitaciones_area"],
                    'detalle_acabados_star_habitaciones_id' => $request["star_habitaciones_detalle"],
                    'habitaciones' => $request["habitaciones"],
                    'habitaciones_area' => $request["habitaciones_area"],
                    'detalle_acabados_habitaciones_id' => $request["habitaciones_detalle"],
                    'banos_privados' => $request["banos_privados"],
                    'banos_privados_area' => $request["banos_privados_area"],
                    'detalle_acabados_banos_privados_id' => $request["banos_privados_detalle"],
                    'cocinas' => $request["cocinas"],
                    'cocinas_area' => $request["cocinas_area"],
                    'detalle_acabados_cocinas_id' => $request["cocinas_detalle"],
                    'cuartos_servicio' => $request["cuartos_servicio"],
                    'cuartos_servicio_area' => $request["cuartos_servicio_area"],
                    'detalle_acabados_cuartos_servicio_id' => $request["cuartos_servicio_detalle"],
                    'banos_servicio' => $request["banos_servicio"],
                    'banos_servicio_area' => $request["banos_servicio_area"],
                    'detalle_acabados_banos_servicio_id' => $request["banos_servicio_detalle"],
                    'patios_ropas' => $request["patios_ropas"],
                    'patios_ropas_area' => $request["patios_ropas_area"],
                    'detalle_acabados_patios_ropas_id' => $request["patios_ropas_detalle"],
                    'terrazas' => $request["terrazas"],
                    'terrazas_area' => $request["terrazas_area"],
                    'detalle_acabados_terrazas_id' => $request["terrazas_detalle"],
                    'jardines' => $request["jardines"],
                    'jardines_area' => $request["jardines_area"],
                    //'detalle_acabados_jardines_id' => $request["jardines_detalle"],
                    'balcones' => $request["balcones"],
                    'balcones_area' => $request["balcones_area"],
                    'detalle_acabados_balcones_id' => $request["balcones_detalle"],
                    'zonas_verdes' => $request["zonas_verdes"],
                    'zonas_verdes_area' => $request["zonas_verdes_area"],
                    //'detalle_acabados_zonas_verdes_id' => $request["zonas_verdes_detalle"],
                ]);
            
                
                if($sometido){
                    //creamos la propiedad horizontal
                    $propiedad_horizontal = PropiedadHorizontal::updateOrCreate(
                        ['id' => $propiedad_horizontal_id],
                        [
                            'inmueble_id' => $inmueble->id,
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
                }
                
      });
        
        return response()->json(['message' => 'Registro Actualizado']);

    }

    /**
     * Ruta que muestra las imagenes agregadas a el inmueble indicado estos formularios de carga documental e imagenes son controlados por DocumentoController
     */
    public function imagenesInmueble($id)
    {

        $inmueble = Radicado::where('id', $id)->get();

        $inmueble = DB::table('inmuebles')
            ->join('avaluos', 'avaluos.id', '=', 'inmuebles.avaluo_id')
            ->select('*',
                'inmuebles.id as inmueble_id'
            )
            ->where('inmuebles.id', $id)
            ->first();

        $documentos = Documento::where('inmueble_id', $id)->get();

        $option_view = 'inmuebles';

        return view('admin.areas.imgInforme', compact('documentos', 'inmueble', 'option_view'));
    }
}