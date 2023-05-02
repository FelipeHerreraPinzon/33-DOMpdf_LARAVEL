<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Documento;
use App\Models\User;
use App\Models\Persona;
use App\Models\Contacto;
use App\Models\Tipoinmueble;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Http\Requests\StoreRadicadoRequest;
use App\Http\Requests\UpdateRadicadoRequest;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radicados =Radicado::with(['persona', 'user', 'tipoinmueble', 'contacto'])->get();
        return view('admin.visitas.index', compact('radicados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $personas = Persona::all();
        $tipoinmuebles = Tipoinmueble::all();
        $contactos = Contacto::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        return view('admin.radicados.create', compact('users','personas','tipoinmuebles','departamentos','municipios','contactos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRadicadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRadicadoRequest $request)
    {

        Radicado::create($request->validated());
        return redirect()->route('admin.radicados.index')->with('success', 'Solicitud registrada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Radicado  $radicado
     * @return \Illuminate\Http\Response
     */
    public function show(Radicado $radicado)
    {
        $rad= Radicado::where('id', $radicado->id)->get();

        return response()->json($rad);

        /*
        *$documentos = Documento::where('radicado_id', $radicado->id)->get();
        *return view('admin.documentos.show', compact('documentos', 'radicado', 'rad'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Radicado  $radicado
     * @return \Illuminate\Http\Response
     */
    public function edit(Radicado $radicado)
    {
        $users = User::all();
        $personas = Persona::all();
        $tipoinmuebles = Tipoinmueble::all();
        $contactos = Contacto::all();
        //$nombres = Persona::where('id',$radicado->referente_id)->first();
        $nomReferentes = Persona::find($radicado->referente_id);
        $nomClientes = Persona::find($radicado->persona_id);
        $nomSolicitantes =Persona::find($radicado->solicitante_id);
       /* print_r($nomReferentes->id);
        print_r($nomClientes->id);
        print_r($nomSolicitantes->persona_apellidos);
        exit();*/

        return view('admin.radicados.edit', compact('users', 'personas', 'tipoinmuebles', 'contactos','radicado','nomReferentes','nomClientes','nomSolicitantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRadicadoRequest  $request
     * @param  \App\Models\Radicado  $radicado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRadicadoRequest $request, Radicado $radicado)
    {


        $radicado->update($request->validated());
        return redirect()->route('admin.radicados.index')->with('success', 'La solicitud ha sido modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Radicado  $radicado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radicado $radicado)
    {
        $radicado->delete();
        return back();
    }


}
