@extends('layouts.admin')
<style>
    body {

        /*background: url("https://cdn.pixabay.com/photo/2021/02/27/21/16/plain-background-6055825_1280.jpg");*/
        /*background-image: url('images/LogoPantallaVLR.jpg');*/
        background-color: #3AC4E9;
        background-repeat: no-repeat;
        background-size: 100vw 100vh;
        z-index: -3;
        background-attachment: fixed;
    }

    header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }

    .card-header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }
</style>
@section('content')

<header style="height:70 px">
</header>
<div style="height: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white">
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Formulario de Radicados</div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.radicados.store')}}">
                        @csrf
                        <input name="user_id" type="hidden" value="{{auth()->id()}}">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="numradicado" class="required">Numero</label>
                                <input type="text" name="numradicado" id="numradicado" class="form-control {{$errors->has('numradicado') ? 'is-invalid' : ''}}" placeholder="Numero" value="{{old('numradicado', '')}}">
                                @if ($errors->has('numradicado'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('numradicado') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2">
                                <label for="fecha" class="required">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control {{$errors->has('fecha') ? 'is-invalid' : ''}}" placeholder="" value="{{old('fecha', '')}}">
                                @if ($errors->has('fecha'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fecha') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2">
                                <label for="hora" class="required">Hora</label>
                                <input type="time" name="hora" id="hora" class="form-control {{$errors->has('hora') ? 'is-invalid' : ''}}" placeholder="" value="{{old('hora', '')}}">
                                @if ($errors->has('hora'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('hora') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="referente_id" class="required">Referente</label>

                                <select class="form-control select2" name="referente_id" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}" {{old('persona_id') == $persona->id ? 'selected' : ''}}>
                                        {{ $persona->persona_nombres.' '. $persona->persona_apellidos}}
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

                            <div class="form-group col-md-4 ">
                                <label for="referente_id" class="required">Tipo Inmueble</label>

                                <select class="form-control select2" name="tipoinmueble_id" style="width: 100%;">
                                    <option value="">Seleccione </option>
                                    @foreach ($tipoinmuebles as $tipoinmueble)
                                    <option value="{{ $tipoinmueble->id }}" {{old('tipoinmueble_id') == $tipoinmueble->id ? 'selected' : ''}}>
                                        {{ $tipoinmueble->nombre }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('tipoinmueble_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tipoinmueble_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="direccion" class="required">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control {{$errors->has('direccion') ? 'is-invalid' : ''}}" placeholder="Digite dirección completa" value="{{old('direccion', '')}}">
                                @if ($errors->has('direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="barrio" class="required">Barrio</label>
                                <input type="text" name="barrio" id="barrio" class="form-control {{$errors->has('barrio') ? 'is-invalid' : ''}}" placeholder="Digite Nombre de Barrio o sector" value="{{old('barrio', '')}}">
                                @if ($errors->has('barrio'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('barrio') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="zona" class="required">Zona</label>
                                <input type="text" name="zona" id="zona" class="form-control {{$errors->has('zona') ? 'is-invalid' : ''}}" placeholder="Digite nombre de Zona o sector" value="{{old('zona', '')}}">
                                @if ($errors->has('zona'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('zona') }}</strong>
                                </span>
                                @endif
                            </div>





                            <div class="form-group col-md-4">
                                <label for="departamento_id" class="required">Departamento</label>
                                <select class="form-control select2" name="departamento_id" style="width: 100%;" id="departamento_id">
                                    <option value="">Seleccione un departamento</option>
                                    @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}" {{old('departamento_id')== $departamento->id ? 'selected' : ''}}>
                                        {{ $departamento->departamento_nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('departamento_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('departamento_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="municipio_id" class="required">Municipio</label>
                                <select class="form-control select2" name="municipio_id" style="width: 100%;" id="selectMpio" disabled>
                                    <option value="">Seleccione un municipio</option>
                                    @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}" {{old('muicipio_id') == $municipio->id ? 'selected' : ''}}>
                                        {{ $municipio->municipio_nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('municipio_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('municipio_id') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="row">

                            <div class="form-group col-md-4 ">
                                <label for="persona_id" class="required">Cliente</label>

                                <select class="form-control select2 " name="persona_id">
                                    <option value="">Seleccione </option>
                                    @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}" {{old('persona_id') == $persona->id ? 'selected' : ''}}>
                                        {{ $persona->persona_nombres.' '. $persona->persona_apellidos }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('persona_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="solicitante_id" class="required">Solicitante</label>

                                <select class="form-control select2" name="solicitante_id">
                                    <option value="">Seleccione</option>
                                    @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}" {{old('persona_id') == $persona->id ? 'selected' : ''}}>
                                        {{ $persona->persona_nombres.' '. $persona->persona_apellidos }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('solicitante_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('solicitante_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="contacto=" required">Contacto</label>

                                <select class="form-control select2" name="contacto_id">
                                    <option value="">Seleccione</option>
                                    @foreach ($contactos as $contacto)
                                    <option value="{{ $contacto->id }}" {{old('contacto_id') == $contacto->id ? 'selected' : ''}}>
                                        {{ $contacto->contacto_nombres.' '.$contacto->contacto_apellidos }}
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
                            <div class="form-group col-md-2 ">
                                <label for="vrreferente" class="required">Valor Esperado</label>
                                <input type="text" name="vrreferente" id="vrreferente" class="form-control {{$errors->has('vrreferente') ? 'is-invalid' : ''}}" placeholder="Vr. avalúo" value="{{old('vrreferente', '')}}">
                                @if ($errors->has('vrreferente'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('vrreferente') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="honorarios" class="required">Honorarios</label>
                                <input type="text" name="honorarios" id="persona_codpostal" class="form-control {{$errors->has('honorarios') ? 'is-invalid' : ''}}" placeholder="Vr. Honorarios" value="{{old('honorarios', '')}}">
                                @if ($errors->has('honorarios'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('honorarios') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="contacto" class="required">Documentos</label>
                                <input type="text" name="contacto" id="contacto" class="form-control {{$errors->has('contacto') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('contacto', '')}}">
                                @if ($errors->has('contacto'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 text-right mt-4">
                                <a class="btn btn-info" href="{{route('admin.radicados.index')}}">
                                    <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                    Regresar
                                </a>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection