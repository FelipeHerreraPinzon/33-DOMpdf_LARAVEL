<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AsignadoController;
use App\Http\Controllers\AvaluoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RadicadoController;
use App\Http\Controllers\TipodocumentoController;
use App\Http\Controllers\TipoinmuebleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\AvaluoComercialController;
use App\Mail\EnviarCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Persona;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('contactos', ContactoController::class);
    //Route::resource('variables', VariableController::class);
    Route::resource('detalles', DetalleController::class);
    Route::resource('documentos', DocumentoController::class);

//Rutas Inmuebles
    Route::prefix('inmuebles')->group(function () {
        Route::get('/', [InmuebleController::class, 'index']);
        Route::get('/{id}', [InmuebleController::class, 'infoInmueble']);
        Route::post('/control', [InmuebleController::class, 'inmuebleControl']);
        Route::post('/{id}/eliminar', [InmuebleController::class, 'eliminar']);
        Route::get('/{id}/documentos', [InmuebleController::class, 'documentos']);
        Route::post('/documentos/cargar', [InmuebleController::class, 'cargarDocumento']);
        Route::get('/documentos/{id}/ver', [DocumentoController::class, 'verDocumento']);
        Route::get('/documentos/{id}/descargar', [DocumentoController::class, 'descargarDocumento']);
    });

//Rutas Inmuebles
    Route::prefix('avaluoComercial')->group(function () {
        Route::get('/', [AvaluoComercialController::class, 'index'])->name('avaluo_comercial');
        Route::get('/pdf', [AvaluoComercialController::class, 'pdf'])->name('avaluos.pdf');
        Route::get('/{id}', [AvaluoComercialController::class, 'infoInmueble']);
        Route::post('/control', [AvaluoComercialController::class, 'inmuebleControl']);
        Route::post('/{id}/eliminar', [AvaluoComercialController::class, 'eliminar']);
        Route::get('/{id}/documentos', [AvaluoComercialController::class, 'documentos']);
        Route::post('/documentos/cargar', [AvaluoComercialController::class, 'cargarDocumento']);
        Route::get('/documentos/{id}/ver', [DocumentoController::class, 'verDocumento']);
        Route::get('/documentos/{id}/descargar', [DocumentoController::class, 'descargarDocumento']);
    });

//Rutas Radicados
    Route::prefix('radicados')->group(function () {
        Route::get('/', [RadicadoController::class, 'index']);
        Route::get('/{id}', [RadicadoController::class, 'infoRadicado']);
        Route::post('/control', [RadicadoController::class, 'radicadoControl']);
        Route::post('/{id}/eliminar', [RadicadoController::class, 'eliminar']);
        Route::get('/{id}/documentos', [RadicadoController::class, 'documentos']);
        Route::post('/documentos/cargar', [RadicadoController::class, 'cargarDocumento']);
        Route::get('/documentos/{id}/ver', [DocumentoController::class, 'verDocumento']);
        Route::get('/documentos/{id}/descargar', [DocumentoController::class, 'descargarDocumento']);
       
    });

//Direccionar el correo enviado.
    Route::get('enviar-correo', function () {
        Mail::to('appsys2023@gmail.com')->send(new EnviarCorreo);
        return "correo enviado exitosamente";
    })->name('enviar-correo');

//Manejan el direccionamientop para establecer las areas de trabajo de los diferentes usuarios
    Route::prefix('areas')->group(function () {
        Route::get('/', [AreaController::class, 'index']);
        Route::get('/{id}', [AreaController::class, 'infoArea']);
        Route::post('control', [AreaController::class, 'Control']);
        Route::get('/informeAvaluo/{avaluo_id}', [AreaController::class, 'infoInformeAvaluo']);
        Route::post('/informeAvaluo/control', [AreaController::class, 'informeAvaluoControl']);
        Route::get('/inmueble/{id}/imagenes', [AreaController::class, 'imagenesInmueble']);
        
    });

//Manejan el procedimiento de asignación de radicados
    Route::prefix('asignados')->group(function () {
        /*Route::get('/', [AsignadoController::class, 'index']);*/
        Route::get('/{id}', [AsignadoController::class, 'infoAsignado']);
        Route::post('control', [AsignadoController::class, 'Control']);
       

       /* Route::get('nombre_visitador', [AsignadoController::class, 'nombre_visitador']);
        Route::get('nombre_avaluador', [AsignadoController::class, 'nombre_avaluador']);
        Route::get('nombre_verificador', [AsignadoController::class, 'nombre_verificador']);
        Route::get('nombre_lider', [AsignadoController::class, 'nombre_lider']);*/
    });

    Route::prefix('personas')->group(function () {
        Route::get('/', [PersonaController::class, 'index']);
        Route::get('/solicitantes', [PersonaController::class, 'indexSolicitante']);
        Route::get('/{id}', [PersonaController::class, 'infoPersona']);
        Route::get('/infoSolicitante/{id}', [PersonaController::class, 'infoSolicitante']);
        Route::post('control', [PersonaController::class, 'Control']);
        Route::post('controlSolicitante', [PersonaController::class, 'ControlSolicitante']);
        Route::post('/{id}/eliminar', [PersonaController::class, 'eliminar']);
        Route::post('/{id}/eliminarSolicitante', [PersonaController::class, 'eliminarSolicitante']);
    });
    // Maneja todo el procedimiento de avaluos
    Route::prefix('avaluos')->group(function () {
        Route::get('/', [AvaluoController::class, 'index']);
        Route::get('/{id}', [AvaluoController::class, 'infoAvaluo']);
        Route::post('control', [AvaluoController::class, 'Control']);

    });

    Route::prefix('variables')->group(function () {
        Route::get('/', [VariableController::class, 'index']);
        Route::get('/ultimoRegistro', [VariableController::class, 'ultimoRegistro']);
        Route::get('/{id}', [VariableController::class, 'infoVariable']);
        Route::get('/muestraDetalle/{id}', [VariableController::class, 'muestraDetalle']);
        Route::post('control', [VariableController::class, 'Control']);
    });
    

//Typea nombre de un visitador desde la tabla users
    Route::get('nombre_visitador', function (Request $request) {
        $data = DB::table('users')->select('id', 'name')->where("cargo_id", 1)->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typea nombre de un valuador desde la tabla users
    Route::get('nombre_valuador', function (Request $request) {
        $data = DB::table('users')->select('id', 'name')->where("cargo_id", 2)->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typea nombre de un verificador desde la tabla users
    Route::get('nombre_verificador', function (Request $request) {
        $data = DB::table('users')->select('id', 'name')->where("cargo_id", 3)->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typea nombre de un lider desde la tabla users
    Route::get('nombre_lider', function (Request $request) {
        $data = DB::table('users')->select('id', 'name')->where("cargo_id", 4)->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typea Departamentos
    Route::get('/depa', function (Request $request) {
        $data = DB::table('departamentos')->select('id', 'nombre')->where("nombre", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typea municipios
    Route::get('/muni/{id}', function (Request $request, $id) {
        $data = DB::table('municipios')->select('id', 'nombre')->where('departamento_id', '=', $id)->where("nombre", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

    Route::get('/nombres/{id}', function (Request $request, $id) {
        $data = DB::table('users')->select('id', 'name')->where('cargo_id', '=', $id)->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//Typeahead Persona
    Route::get('/persona', function (Request $request) {
        $data = DB::table('personas')->select('id', 'nombres', 'apellidos', DB::raw('CONCAT(nombres," " ,apellidos) as nombre_completo'))
            ->where("persona_tipo", 1)
            ->where(function ($query) use ($request) {
                $query->where("nombres", "LIKE", "%{$request->input('query')}%")
                    ->orWhere("apellidos", "LIKE", "%{$request->input('query')}%");
            })
            ->get();

        $data1 = DB::table('personas')->select('id', 'nombres', 'apellidos', DB::raw('CONCAT(nombres," " ,apellidos) as nombre_completo'))->where("nombres", "LIKE", "%{$request->input('query')}%")->orWhere("apellidos", "LIKE", "%{$request->input('query')}%")->get();
        return $data;
    });

//typeHead Solicitante
    Route::get('/solicitante', function (Request $request) {
        
        $data = DB::table('personas')->select('id', 'nombres', 'apellidos', DB::raw('CONCAT(nombres," " ,apellidos) as nombre_completo'))
        ->where("persona_tipo", 0)
        ->where(function ($query) use ($request) {
            $query->where("nombres","LIKE", "%{$request->input('query')}%")
                ->orWhere("apellidos", "LIKE", "%{$request->input('query')}%");
        })
        ->get();

        return $data;
    });

    Route::get('/verVisitadores', function () {
        $visitadores =DB::table('avaluos')
        ->join('users as usuario', 'usuario.id' ,'=', 'visitador_id')
        ->select('usuario.name as name')
                 ->selectRaw( 'visitador_id, SUM(estado_visitador=158) as asignado')
                 ->selectRaw('visitador_id, SUM(estado_visitador=159) as visitado')
                 ->selectRaw('visitador_id, SUM(estado_visitador=160) as proceso')
                 ->selectRaw('visitador_id, SUM(estado_visitador=161) as terminado')
                 ->selectRaw('visitador_id, COUNT(avaluos.id) as total')
                 ->groupBy('visitador_id')
                 ->get();

        $obj = (object) array('data' => $visitadores);
        return response()->json($obj);
        


    });

    Route::get('/verValuadores', function () {
        return "pendiente de asignar estados";
        exit;
        $valuadores = DB::table('users')->where('cargo_id', 2)
        ->select('*')
            ->get();

        $obj = (object) array('data' => $valuadores);

        return response()->json($obj);
    });



    
    Route::get('/prueba', function () {
        return view('admin.prueba.index');
    });

    Route::get('/consultas', function () {
      // por aqui inicia
        $datos = DB::table('historicos_valorar')
        ->join('detalles as tipo_inmueble', 'tipo_inmueble.id','=','historicos_valorar.id_tipo_inmueble')
        ->join('municipios', 'municipios.id', '=', 'historicos_valorar.id_municipio')
        ->select('historicos_valorar.codigo','municipios.nombre as municipio_nombre', 'tipo_inmueble.nombre as tipo_nombre')
        ->get();
      
        $detalle_tipo_inmuebles = DB::table('detalles')
        ->select('*')
        ->where('variable_numeracion', 4)
        ->get();

       
       
        
   
        return view('admin.consultas.index', compact('datos','detalle_tipo_inmuebles'));
        // return view('admin.consultas.index', compact('datos'));
    });

    Route::get('/consultas/filtraDatos/municipio/barrio/{id}', function ($id) {

        $barrios = DB::table('historicos_valorar')
            ->select('barrio')
            ->distinct()
            ->where('id_municipio','=',$id)
            ->orderBy('barrio')
            ->get();
            $barrios = $barrios->unique('barrio');

        return $barrios;
    });

    Route::get('/consultas/muestraDatos', function () {
       
        
        $datosP = DB::table('historicos_valorar')
            ->join('detalles as tipo_inmueble', 'tipo_inmueble.id', '=', 'historicos_valorar.id_tipo_inmueble')
            ->join('municipios', 'municipios.id', '=', 'historicos_valorar.id_municipio')
            ->select('*', 'municipios.nombre as municipio_nombre', 'tipo_inmueble.nombre as tipo_nombre')
            ->get();

        /*$detalle_tipo_inmuebles = DB::table('detalles')
            ->select('*')
            ->where('variable_numeracion', 4)
            ->get();*/

     return $datosP;
    
    });


    Route::post('/consultas/filtraDatos', function (Request $request) {


        // establece parametros de valor
        if($request->data['valor_inicial'] != null){
            $valor_inicial = $request->data['valor_inicial'];
            //consulta a base de datos 
        }else{
            $valor_inicial = 0;
        }
        if ($request->data['valor_final'] != null) {
            $valor_final = $request->data['valor_final'];
            //consulta a base de datos 
        } else {
            $valor_final =100000000000;
        }

        // establece parametros de area privada

        if ($request->data['area_desde'] != null) {
            $area_desde = $request->data['area_desde'];
            //consulta a base de datos 
        } else {
            $area_desde = 0;
        }
        if ($request->data['area_hasta'] != null
        ) {
            $area_hasta = $request->data['area_hasta'];
            //consulta a base de datos 
        } else {
            $area_hasta = 100000000000;
        }

        if ($request->data['parqueaderos'] != "") {
            $parqueadero_inicial = $request->data['parqueaderos'];
            $parqueadero_final = $request->data['parqueaderos'];
            //consulta a base de datos 
        } else {
            $parqueadero_inicial = 0;
            $parqueadero_final = 4;
        }

        if ($request->data['estrato'] != "") {
            $estrato_inicial = $request->data['estrato'];
            $estrato_final = $request->data['estrato'];
            //consulta a base de datos 
        } else {
            $estrato_inicial = 1;
            $estrato_final = 6;
        }

        if ($request->data['habitaciones'] != ""
        ) {
            $habitaciones_inicial = $request->data['habitaciones'];
            $habitaciones_final = $request->data['habitaciones'];
            //consulta a base de datos 
        } else {
            $habitaciones_inicial = 1;
            $habitaciones_final = 4;
        }


        if (
            $request->data['banos'] != ""
        ) {
            $banos_inicial = $request->data['banos'];
            $banos_final = $request->data['banos'];
            //consulta a base de datos 
        } else {
            $banos_inicial = 1;
            $banos_final = 4;
        }

        if
        (
            $request->data['id_tipo_inmueble']!=""
        ){
            $inmueble = $request->data['id_tipo_inmueble'];
        }else{

            
        }
        

       

        $datosFiltrados = DB::table('historicos_valorar')
       // ->join('departamentos', 'departamentos.id', '=', 'datos_historicos.id_departamento')
        ->join('municipios', 'municipios.id', '=', 'historicos_valorar.id_municipio')
        ->join('detalles as tipo_inmueble', 'tipo_inmueble.id', '=', 'historicos_valorar.id_tipo_inmueble')

        ->select('*', 'municipios.nombre as municipio_nombre', 'tipo_inmueble.nombre as tipo_nombre')
        ->whereBetween('valor_oferta', [$valor_inicial, $valor_final])
        ->whereBetween('area_privada', [$area_desde, $area_hasta])
        //->where('id_departamento', '=', $request->data['id_departamento']) 
        ->where('id_municipio','=', $request->data['id_municipio'])
        ->where(function ($query) use ($request) {
            $query->where("barrio", "LIKE", "%{$request->data['barrio']}%");
        })
          
            //->where('barrio','=', $request->data['barrio'])
            ->where('id_tipo_inmueble','=', $request->data['id_tipo_inmueble'] )
            //->where('edad','=', $request->data['edad'] )
        
        ->whereBetween('estrato', [$estrato_inicial, $estrato_final])
        ->whereBetween('parqueaderos',[$parqueadero_inicial, $parqueadero_final])
        ->whereBetween('habitaciones', [$habitaciones_inicial, $habitaciones_final])
        ->whereBetween('banos', [$banos_inicial, $banos_final])
        ->get();

        

        //return $request->data['id_departamento'];
       // dd($datosFiltrados);
        return $datosFiltrados;
    });


});
