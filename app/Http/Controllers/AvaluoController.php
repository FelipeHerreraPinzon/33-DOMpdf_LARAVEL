<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Avaluo;
use App\Models\Cargo;
use App\Models\Radicado;
use App\Models\Persona;
use App\Models\User;
use App\Http\Requests\StoreAvaluoRequest;
use App\Http\Requests\UpdateAvaluoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
use DB;

class AvaluoController extends Controller
{

    public function index()
    {

      
        // Este procedimiento se carga cuando quiero mostrar los avaluos
        $avaluos = Radicado::join('avaluos', 'avaluos.radicado_id', '=', 'radicados.id')
            ->join('personas', 'personas.id', '=', 'radicados.solicitante_id')
            ->join('detalles as visitador','visitador.id','=','estado_visitador')
            ->join('detalles as valuador', 'valuador.id', '=', 'estado_valuador')
            ->join('detalles as verificador', 'verificador.id', '=', 'estado_verificador')
            ->select(
                'avaluos.id',
                'radicado_id',
                'numero_radicado',
                'codigo',
                'numero_documento',
                'fecha',
             
                'nombres',
                'apellidos',
                'visitador.nombre as visitador_nombre',
                'valuador.nombre as valuador_nombre',
                'verificador.nombre as verificador_nombre'
            )->get();
                      
          
           
        return view('admin.avaluos.index', compact('avaluos'));
         
      
       }

   




    public function store(StoreAvaluoRequest $request)
    {

        //return $request;

        Avaluo::create($request->validated());
        $actualizados = Radicado::where('id', $request->radicado_id)->update(['estado' => '1']);

        Mail::to('appsys2023@gmail.com')->send(new EnviarCorreo);


        return "correo enviado exitosamente";
        //return redirect()->route('admin.avaluos.index')->with('success', 'Solicitud asignada correctamente');
    }



    public function edit($id)
    {

        alert(" estoy en edit de avaluo controller");

        // la siguiente rutina es para editar los avaluos...
       
        $visitadores = User::where('cargo_id', 1)->get();
        $valuadores = User::where('cargo_id', 2)->get();
        $verificadores = User::where('cargo_id', 3)->get();
        $lideres = User::where('cargo_id', 4)->get();
       
        $avaluos = Radicado::join('avaluos', 'avaluos.radicado_id', '=', 'radicados.id')
            ->join('personas', 'personas.id', '=', 'radicados.solicitante_id')
            ->select(
                'avaluos.id',
                'codigo',
                'numero_radicado',
                'asigna_visitador',
                'radicados.direccion',
                'numero_documento',
                'fecha',
                
                'nombres',
                'apellidos'
            )->where('avaluos.id', $id)->get();
        //return $avaluos;   

        $radicado = DB::table('avaluos')
            ->join('radicados', 'radicados.id', '=', 'avaluos.radicado_id')
            ->select('radicados.id')
            ->where('avaluos.id', $id)->get();
        //return $radicado;
        $response = DB::table('radicados')
            ->join('avaluos', 'avaluos.radicado_id', '=', 'radicados.id')
            ->join('users as visitador', 'visitador.id', '=', 'avaluos.visitador_id')
            ->join('users as valuador', 'valuador.id', '=', 'avaluos.valuador_id')
            ->join('users as verificador', 'verificador.id', '=', 'avaluos.verificador_id')
            ->join('users as lider', 'lider.id', '=', 'avaluos.lider_id')
            ->join('personas as solicitante', 'solicitante.id', '=', 'radicados.solicitante_id')

            ->select(
                'visitador.name as visitador_nombre',
                'visitador.id as visitador_id',
                'valuador.name as valuador_nombre',
                'valuador.id as valuador_id',
                'verificador.name as verificador_nombre',
                'verificador.id as verificador_id',
                'lider.name as lider_nombre',
                'lider.id as lider_id',
                'solicitante.nombres as solicitante_nombre',
                'solicitante.apellidos as solicitante_apellidos',
                'solicitante.numero_documento as solicitante_numdoc',
                'solicitante.id as solicitante_id',
                'avaluos.id',
                'avaluos.codigo',
                'avaluos.asigna_visitador',
                'numero_radicado',
                'radicados.direccion',
                
                //'persona_numdoc',
                'fecha',
           
                //'persona_nombres',
                //'persona_apellidos'
            )->where('avaluos.id', $id)->get();

       
        $fechaAsigna= $response[0]->asigna_visitador;
alert(" estoy en edit antes de enviar a la funcion");


       

        

        
        $tiempo = tiempoTranscurrido($fechaAsigna);


        return view('admin.avaluos.edit', compact(
            'visitadores',
            'valuadores',
            'verificadores',
            'lideres',
            'response',
            'id',
            'tiempo'
        ));




    }
    public function infoAvaluo($id)
    {
       
       
       
        $response = DB::table('radicados')
        ->join('avaluos', 'avaluos.radicado_id', '=', 'radicados.id')
        ->join('users as visitador', 'visitador.id', '=', 'avaluos.visitador_id')
        ->join('users as valuador', 'valuador.id', '=', 'avaluos.valuador_id')
        ->join('users as verificador', 'verificador.id', '=', 'avaluos.verificador_id')
        ->join('users as lider', 'lider.id', '=', 'avaluos.lider_id')
        ->join('personas as solicitante', 'solicitante.id', '=', 'radicados.solicitante_id')
        ->join('municipios', 'municipios.id', '=', 'radicados.municipio_id')
        ->join('departamentos', 'municipios.departamento_id', '=', 'departamentos.id')

        ->select(
            'visitador.name as visitador_nombre',
            'visitador.id as visitador_id',
            'valuador.name as valuador_nombre',
            'valuador.id as valuador_id',
            'verificador.name as verificador_nombre',
            'verificador.id as verificador_id',
            'lider.name as lider_nombre',
            'lider.id as lider_id',
            'solicitante.nombres as solicitante_nombres',
            'solicitante.apellidos as solicitante_apellidos',
            'solicitante.numero_documento as solicitante_numdoc',
            'solicitante.id as solicitante_id',
            'avaluos.id',
            'avaluos.codigo',
            'avaluos.asigna_visitador',
            'avaluos.fecha_visita',
            'avaluos.asigna_valuador',
            'numero_radicado',
            'radicados.direccion',
            'municipios.nombre as municipio_nombre',
            'departamentos.nombre as departamento_nombre',

            'fecha',
         
           
        )->where('avaluos.id', $id)
        ->get();

       

        $fechaAsigna = $response[0]->asigna_visitador;
              



        function tiempoTranscurrido($fechaAsigna)
        {
           
            date_default_timezone_set("America/Bogota");
            $fecha2 = date("Y-m-d H:i:s");
           
            if ($fechaAsigna != "") {

                $fecha1 = $fechaAsigna;

                $fechainicial = new DateTime($fechaAsigna);
                //fecha inicial 
                $fechaactual = new DateTime($fecha2);
       

                $diferencia = $fechainicial->diff($fechaactual);
               
                if (strtotime($fecha2) - strtotime($fecha1) < 0) {
                    echo " la fecha actual debe ser mayor a ala del cargue";
                    exit();
                };
                //echo $diferencia->format('%d dias %H horas %i minutos %s segundos  '); 

                $horaini = date('G', strtotime($fecha1));
                if ($horaini < 8 || $horaini > 16) {
                    echo "Hora de registro debe ser entre las 8 AM y las 4 PM.  ";
                }
                $minutosini = date('i', strtotime($fecha1));
                $diferencia2 = strtotime($fecha2) - strtotime($fecha1);
                $minutosDiferencia2 = $diferencia2 / 60;
                $horasTranscurridas = $minutosDiferencia2 / 60;
                $diasTranscurridos = $horasTranscurridas / 24;
                $horasdia = 0;
                $minutosdia = 0;
                // si es otro dia...
               
                if (date('z', strtotime($fecha2)) - date('z', strtotime($fecha1)) > 0) {
                    $horasdia = 16 - $horaini;
                    if (date('i:', strtotime($fecha2) > 0)) {
                        $horasdia = $horasdia - 1;
                        $minutosdia = 60 - $minutosini;
                        if ($minutosdia == 60) {
                            $horasdia = $horasdia + 1;
                            $minutosdia = 0;
                        }
                    }
                }/* si es el mismo dia  else*/ 
                else{
                   
                    if (date('G', strtotime($fecha2)) >= $horaini) {
                        if (date('G', strtotime($fecha2)) <= 16) {
                            $horasdia = date('G', strtotime($fecha2)) - $horaini;
                        } else {
                            $horasdia = 16 - $horaini;
                        }
                        if (date('i', strtotime($fecha2)) <= $minutosini) {
                            $minutosdia = 60 - abs(date('i', strtotime($fecha2)) - $minutosini);
                            if ($minutosdia == 60) {
                                $minutosdia = 0;
                            } else {
                                $horasdia = $horasdia - 1;
                            }
                        } else {
                            $minutosdia = abs(date('i', strtotime($fecha2)) - $minutosini);
                        }
                    } else {
                        
                        echo "No puede ser menor que la fecha de inicio";
                    }
                }
                $diainc = 24 * 60 * 60;
                $diashabiles = array();
                $diasferiados = ['2022-12-08','2023-03-20'];
                for ($midia = strtotime($fecha1); $midia <= strtotime($fecha2); $midia += $diainc) {
                    if (!in_array(date('N', $midia), array(6, 7))) {
                        if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                            array_push($diashabiles, date('Y-m-d', $midia));
                        }
                    }
                }
                //echo " son estos dias habiles..." . count($diashabiles);
                //if($diferencia2<86400){
                if (date('G', strtotime($fecha2)) > $horaini) {
                    $veces = count($diashabiles) - 1;
                } else {
                    if (date('G', strtotime($fecha2)) == $horaini) {
                        if (date('i', strtotime($fecha2)) >= $minutosini) {
                            $veces = count($diashabiles) - 1;
                        } else {
                            $veces = count($diashabiles);
                        }
                    } else {
                        $veces = count($diashabiles);
                    }
                }

                //echo " son estas veces..." . $veces;

                // si es mas de una vez que entra 
                for ($i = 1; $i <= $veces; $i++) {
                    if ($veces != $i) {
                        $horasdia = $horasdia + 8;
                    } else {
                        if (date('G', strtotime($fecha2)) >= 16) {
                            $horasdia = $horasdia + 8;
                        } else {
                            if (date('G', strtotime($fecha2)) > 8) {
                                $horasdia = $horasdia + (date('G', strtotime($fecha2)) - 8);
                                if (date('i', strtotime($fecha2)) <= $minutosini) {
                                    $minutosdia = 60 - abs(date('i', strtotime($fecha2)) - $minutosini);
                                    if ($minutosdia == 60) {
                                        $horasdia = $horasdia + 1;
                                        $minutosdia = 0;
                                    }
                                } else {
                                    if ($minutosdia + date('i', strtotime($fecha2)) >= 60) {
                                        $horasdia = $horasdia + 1;
                                    }
                                    $minutosdia = abs(date('i', strtotime($fecha2)) - $minutosini);
                                }
                            }
                        }
                    }
                }
                $tiempolleva = [];
                if (floor($horasdia / 8) > 1) {

                    $tiempolleva[1] = "btn-danger";
                } else {
                    if (floor($horasdia / 8) == 1) {
                        $tiempolleva[1] = "btn-warning";
                    } else {
                        $tiempolleva[1] = "btn-success";
                    }
                }

                //$tiempolleva[0] = $horasdia;
                $tiempolleva[0] =  floor($horasdia / 8)  . " D: " . $horasdia % 8 . " h: " . $minutosdia . " m ";
            
            }

            return $tiempolleva;
        }
        $tiempo = tiempoTranscurrido($fechaAsigna);
       

        $obj = (object) array('avaluo' => $response, 'tiempo' => $tiempo);
        return  $obj;
        //return [$response, $fechaAsigna];
        

        //return $response;
    }

    public function update(UpdateAvaluoRequest $request, Avaluo $avaluo)
    {
        //
    }


    public function destroy(Avaluo $avaluo)
    {
        //
    }

   
}
