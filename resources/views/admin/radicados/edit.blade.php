@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Solicitud</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        {{$nomReferentes->id}}

                        <form method="POST" action="{{route('admin.radicados.update',$radicado->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="numradicado" class="required">Numero</label>
                                    <input type="text" name="numradicado" id="numradicado" class="form-control {{$errors->has('numradicado') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('numradicado', $radicado->numradicado)}}">
                                    @if ($errors->has('numradicado'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('numradicado') }}</strong>
                                    </span>
                                    @endif
                                </div>




                                <div class="form-group col-sm-2">
                                    <label for="fecha" class="required">Fecha</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('fecha', $radicado->fecha)}}">
                                    @if ($errors->has('fecha'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="hora" class="required">Hora</label>
                                    <input type="time" name="hora" id="hora" class="form-control {{$errors->has('hora') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('hora', $radicado->hora)}}">
                                    @if ($errors->has('hora'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4 ">
                                    <label for="referente_id" class="required">Referente</label>

                                    <select class="form-control select2" name="referente_id" style="width: 100%;">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}" {{(old('persona_id') ? old('persona_id') : $nomReferentes->id ?? '' )==$persona->id ? 'selected' : ''}}>

                                            {{ $persona->persona_nombres.' '.$persona->persona_apellidos}}

                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('referente_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('referente_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-4 ">
                                    <label for="referente_id" class="required">Tipo Inmueble</label>

                                    <select class="form-control select2" name="tipoinmueble_id" style="width: 100%;">
                                        <option value="">Seleccione un tipo de inmueble</option>
                                        @foreach ($tipoinmuebles as $tipoinmueble)
                                        <option value="{{ $tipoinmueble->id }}" {{(old('tipoinmueble_id') ? old('tipoinmueble_id') : $radicado->tipoinmueble->id ?? '' ) == $tipoinmueble->id ? 'selected' : ''}}>
                                            {{ $tipoinmueble->nombre}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('tipoinmueble_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('tipoinmueble_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="direccion" class="required">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control {{$errors->has('direccion') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('direccion', $radicado->direccion)}}">
                                    @if ($errors->has('direccion'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="barrio" class="required">Barrio</label>
                                    <input type="text" name="barrio" id="barrio" class="form-control {{$errors->has('barrio') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('barrio', $radicado->barrio)}}">
                                    @if ($errors->has('barrio'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('barrio') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="zona" class="required">Zona</label>
                                    <input type="text" name="zona" id="zona" class="form-control {{$errors->has('zona') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('zona', $radicado->zona)}}">
                                    @if ($errors->has('zona'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('zona') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-sm-4">
                                    <label for="municipio" class="required">Municipio</label>
                                    <input type="text" name="municipio" id="municipio" class="form-control {{$errors->has('municipio') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('municipio', $radicado->municipio)}}">
                                    @if ($errors->has('municipio'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('municipio') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="departamento" class="required">Departamento</label>
                                    <input type="text" name="departamento" id="departamento" class="form-control {{$errors->has('departamento') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('departamento', $radicado->departamento)}}">
                                    @if ($errors->has('departamento'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('departamento') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-sm-4 ">
                                    <label for="persona_id" class="required">Cliente</label>

                                    <select class="form-control select2" name="persona_id" style="width: 100%;">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}" {{(old('persona_id') ? old('persona_id') : $nomClientes->id ?? '' ) == $persona->id ? 'selected' : ''}}>

                                            {{ $persona->persona_nombres.' '.$persona->persona_apellidos}}

                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('persona_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4 ">
                                    <label for="solicitante_id" class="required">Solicitante</label>

                                    <select class="form-control select2" name="solicitante_id" style="width: 100%;">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($personas as $persona)
                                        <option value="{{ $persona->id }}" {{(old('persona_id') ? old('persona_id') : $nomSolicitantes->id ?? '' ) == $persona->id ? 'selected' : ''}}>

                                            {{ $persona->persona_nombres.' '.$persona->persona_apellidos}}

                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('solicitante_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('solicitante_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4 ">
                                    <label for="contacto" required>Contacto</label>

                                    <select class="form-control select2" name="contacto_id" style="width: 100%;">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($contactos as $contacto)
                                        <option value="{{ $contacto->id }}" {{(old('contacto_id') ? old('contacto_id') : $radicado->contacto->id ?? '' ) == $contacto->id ? 'selected' : ''}}>
                                            {{ $contacto->contacto_nombres}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('contacto_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('contacto_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-sm-2 ">
                                    <label for="vrreferente" class="required">Valor Esperado</label>
                                    <input type="text" name="vrreferente" id="vrreferente" class="form-control {{$errors->has('vrreferente') ? 'is-invalid' : ''}}" placeholder="Valor esperado para el avalúo" value="{{old('vrreferente',$radicado->vrreferente)}}">
                                    @if ($errors->has('vrreferente'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('vrreferente') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="honorarios" class="required">Honorarios</label>
                                    <input type="text" name="honorarios" id="persona_codpostal" class="form-control {{$errors->has('honorarios') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('honorarios', $radicado->honorarios)}}">
                                    @if ($errors->has('honorarios'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('honorarios') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="contacto" class="required">Documentos</label>
                                    <input type="text" name="contacto" id="contacto" class="form-control {{$errors->has('contacto') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('contacto', '')}}">
                                    @if ($errors->has('contacto'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('contacto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-4 text-right mt-4">
                                    <a class="btn btn-danger" href="{{route('admin.radicados.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                    </button>
                                </div>

                            </div>




                            <div class="row d-print-none mt-2">

                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
