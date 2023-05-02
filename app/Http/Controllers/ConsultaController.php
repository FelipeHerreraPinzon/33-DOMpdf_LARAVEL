<?php

namespace App\Http\Controllers;

use DB;

class ConsultaController extends Controller
{
    public function index()
    {

        $datos = DB::table('historicos_valorar')
        ->select('*')
        ->get();

        $detalle_tipo_inmuebles = DB::table('detalles')
        ->select('*')
        ->where('variable_numeracion', 4)
        ->get();

       $detalle_sector = DB::table('historicos_valorar')
        ->select('barrio')
        ->get();
        $detalle_sectores = $detalle_sector->unique('barrio');

        dd($detalle_sector);
        return $detalle_sectores;
        //return $datos;
        return view('admin.asignados.index', compact('datos'));

    }

    public function filtraDatos(){
        return "vista de filtrado";
        $datos = DB::table('historicos_valorar')
            ->select('*')
            ->get();

        $detalle_sector = DB::table('historicos_valorar')
            ->select('barrio')
            ->get();
        $detalle_sectores = $detalle_sector->unique('barrio');

        $detalle_tipo_inmuebles = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 4)
            ->get();
        //return $detalle_sectores;

        return view('admin.consultas.index', compact('datos', 'detalle_sectores', 'detalle_tipo_inmuebles'));
    }

   


}