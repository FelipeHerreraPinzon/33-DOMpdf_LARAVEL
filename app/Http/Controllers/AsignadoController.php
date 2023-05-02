<?php

namespace App\Http\Controllers;

use App\Models\Asignado;
use App\Models\Detalle;
use App\Models\Avaluo;
use DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\EnviarCorreo;
use App\Models\Radicado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreAsignadoRequest;
use App\Http\Requests\UpdateAsignadoRequest;


class AsignadoController extends Controller
{

   
    public function index(Request $request)
    {
        
        $radicados = Radicado::where('estado', '0')
        ->join('personas', 'personas.id', '=', 'radicados.solicitante_id')
        ->select(
            'radicados.id',
            'numero_radicado',
            //'avaluo_codigo',
            'numero_documento',
            'fecha',
         
            'nombres',
            'apellidos'
        )->get();

        return view('admin.asignados.index', compact('radicados'));
     
    }

    public function infoAsignado($id)
    {
       
       $radicados = Radicado::join('personas as solicitante', 'solicitante.id', '=', 'radicados.solicitante_id')
        ->join('municipios', 'municipios.id', '=', 'radicados.municipio_id')
        ->join('departamentos','municipios.departamento_id', '=', 'departamentos.id')
        ->select(
            'radicados.id',
            //'avaluos.id',
            'numero_radicado',
            'radicados.direccion',
            //'avaluo_codigo',
            'numero_documento',
            'radicados.fecha',
       
            'solicitante.nombres as solicitante_nombres',
            'solicitante.apellidos as solicitante_apellidos',
            'municipios.nombre as municipio_nombre',
            'departamentos.nombre as departamento_nombre'
        )->where('radicados.id', $id)->get();

      
        //$ultimo = Avaluo::latest('codigo')->first();
        /*$siguiente = $ultimo->codigo;
       print_r($siguiente);*/
       //dd(" voy a salir");
      //return $ultimo;
       // return  response()->json($ultimo);
            
        return $radicados;
    }

    public function Control(Request $request)
    {
        
        $returned = DB::table('avaluos')
        
            ->insert([
            'radicado_id'=>$request->id,
            'codigo'=> $request->codigo,
            'asigna_visitador' => $request->asigna_visitador,
            'visitador_id' => $request->visitador_id,
            'valuador_id' => $request->valuador_id,
            'asigna_valuador'=> $request->asigna_visitador,
            'verificador_id' => $request->verificador_id,
            'lider_id' => $request->lider_id,
            'estado_visitador' => $request->estado_visitador,
            'estado_valuador' => $request->estado_valuador,
            'estado_verificador'=> $request->estado_verificador,

            ]);
           
        // actualiza el estado del Radicado a asignado
      
        $actualiza = Radicado::where('id', $request->id)->update(['estado' => '1']);
       
        // envia correo notificando de la asignacion del correo
      
        /*Mail::to('appsys2023@gmail.com')->send(new EnviarCorreo);*/
          alert("Aqui debo notificar a los participes");
        return response()->json(['message' => 'Asignación generada con exito']);
    }

 

public function verVisitadores()
    {
        $visitadores = DB::table('users')->where('cargo_id',1)
            ->select('*')
            ->get();

        return response()->json($visitadores);
    }

    
}
