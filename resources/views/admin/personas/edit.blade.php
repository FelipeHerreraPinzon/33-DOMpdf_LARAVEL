@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Persona</h1>
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

                        <form method="POST" action="{{route('admin.personas.update', $persona->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-2 ">
                                    <label for="tipodocumento_id" required">Tipo Documento</label>

                                    <select class="form-control select2" name="tipodocumento_id" style="width: 100%;">
                                        <option value="">Seleccione tipo </option>
                                        @foreach ($tipodocumentos as $tipodocumento)

                                        <option value="{{ $tipodocumento->id }}" {{(old('tipodocumento_id') ? old('tipodocumento_id') : $persona->tipodocumento->id ?? '' ) == $tipodocumento->id ? 'selected' : ''}}>
                                            {{ $tipodocumento->nombre}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('tipodocumento_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('tipodocumento_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-2  ">
                                    <label for="persona_numdoc" class="required">Numero</label>
                                    <input type="text" name="persona_numdoc" id="persona_numdoc" class="form-control {{$errors->has('persona_numdoc') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo " value="{{old('persona_numdoc', $persona->persona_numdoc)}}">
                                    @if ($errors->has('persona_numdoc'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_numdoc') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-sm-4 ">
                                    <label for="persona_nombres" class="required">Nombres</label>
                                    <input type="text" name="persona_nombres" id="persona_nombres" class="form-control {{$errors->has('persona_nombres') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_nombres', $persona->persona_nombres)}}">
                                    @if ($errors->has('persona_nombres'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_nombres') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4 ">
                                    <label for="persona_apellidos" class="required">Apellidos</label>
                                    <input type="text" name="persona_apellidos" id="persona_apellidos" class="form-control {{$errors->has('persona_apellidos') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_apellidos',$persona->persona_apellidos)}}">
                                    @if ($errors->has('persona_apellidos'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_apellidos') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="persona_celular" class="required">Celular</label>
                                    <input type="text" name="persona_celular" id="persona_celular" class="form-control {{$errors->has('persona_celular') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_celular', $persona->persona_celular)}}">
                                    @if ($errors->has('persona_celular'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_celular') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-sm-2">
                                    <label for="persona_telfijo" class="required">Telefono fijo</label>
                                    <input type="text" name="persona_telfijo" id="persona_telfijo" class="form-control {{$errors->has('persona_telfijo') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_telfijo', $persona->persona_telfijo)}}">
                                    @if ($errors->has('persona_telfijo'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_telfijo') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4 ">
                                    <label for="persona_email" class="required">Email </label>
                                    <input type="email" name="persona_email" id="persona_email" class="form-control {{$errors->has('persona_email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del usuario" value="{{old('persona_email', $persona->persona_email)}}">
                                    @if ($errors->has('persona_email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="persona_codpostal" class="required">Codigo Postal</label>
                                    <input type="text" name="persona_codpostal" id="persona_codpostal" class="form-control {{$errors->has('persona_codpostal') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_codpostal', $persona->persona_codpostal)}}">
                                    @if ($errors->has('persona_codpostal'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_codpostal') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label for="persona_direccion" class="required">Dirección</label>
                                    <input type="text" name="persona_direccion" id="persona_direccion" class="form-control {{$errors->has('persona_direccion') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_direccion', $persona->persona_direccion)}}">
                                    @if ($errors->has('persona_direccion'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('persona_direccion') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="municipio_id" class="required">Municipio</label>
                                    <select class="form-control select2" name="municipio_id" style="width: 100%;">
                                        <option value="">Seleccione un municipio</option>
                                        @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}" {{(old('municipio_id') ? old('municipio_id') : $persona->municipio->id ?? '' ) == $municipio->id ? 'selected' : ''}}>
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

                                <div class="form-group col-sm-4">
                                    <label for="departamento_id" class="required">Departamento</label>
                                    <select class="form-control select2" name="departamento_id" style="width: 100%;">
                                        <option value="">Seleccione un departamento</option>
                                        @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{(old('departamento_id') ? old('departamento_id') : $persona->departamento->id ?? '' ) == $departamento->id ? 'selected' : ''}}>
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

                            </div>
                            <div class="row">

                                <div class="form-group col-sm-4 ">
                                    <label for="contacto=" required">Contacto</label>
                                    <select class="form-control select2" name="contacto_id" style="width: 100%;">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($contactos as $contacto)
                                        <option value="{{ $contacto->id }}" {{(old('contacto_id') ? old('contacto_id') : $persona->contacto->id ?? '' ) == $contacto->id ? 'selected' : ''}}>
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


                                <div class="col-sm-8 text-right mt-4">
                                    <a class="btn btn-danger" href="{{route('admin.personas.index')}}">
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