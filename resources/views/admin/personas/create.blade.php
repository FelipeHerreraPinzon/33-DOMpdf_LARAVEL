@extends('layouts.admin')
<style>
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
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Formulario de Personas</div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.personas.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-2 ">
                                <label for="tipodocumento_id" class="required">Tipo Documento</label>

                                <select class="form-control select2" name="tipodocumento_id" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    @foreach ($detalles as $detalle)
                                    <option value="{{ $detalle->id }}" {{old('detalle_id') == $detalle->id ? 'selected' : ''}}>
                                        {{ $detalle->nombre }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('detalle_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('detalle_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2  ">
                                <label for="persona_numdoc" class="required">Numero</label>
                                <input type="text" name="persona_numdoc" id="persona_numdoc" class="form-control {{$errors->has('persona_numdoc') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_numdoc', '')}}">
                                @if ($errors->has('persona_numdoc'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_numdoc') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group col-md-4 ">
                                <label for="persona_nombres" class="required">Nombres</label>
                                <input type="text" name="persona_nombres" id="persona_nombres" class="form-control {{$errors->has('persona_nombres') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_nombres', '')}}">
                                @if ($errors->has('persona_nombres'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_nombres') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="persona_apellidos" class="required">Apellidos</label>
                                <input type="text" name="persona_apellidos" id="persona_apellidos" class="form-control {{$errors->has('persona_apellidos') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_apellidos', '')}}">
                                @if ($errors->has('persona_apellidos'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_apellidos') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="persona_celular" class="required">Celular</label>
                                <input type="text" name="persona_celular" id="persona_celular" class="form-control {{$errors->has('persona_celular') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_celular', '')}}">
                                @if ($errors->has('persona_celular'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_celular') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group col-md-2">
                                <label for="persona_telfijo" class="required">Telefono fijo</label>
                                <input type="text" name="persona_telfijo" id="persona_telfijo" class="form-control {{$errors->has('persona_telfijo') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_telfijo', '')}}">
                                @if ($errors->has('persona_telfijo'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_telfijo') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 ">
                                <label for="persona_email" class="required">Email </label>
                                <input type="email" name="persona_email" id="persona_email" class="form-control {{$errors->has('persona_email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del usuario" value="{{old('persona_email', '')}}">
                                @if ($errors->has('persona_email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="persona_codpostal" class="required">Codigo Postal</label>
                                <input type="text" name="persona_codpostal" id="persona_codpostal" class="form-control {{$errors->has('persona_codpostal') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_codpostal', '')}}">
                                @if ($errors->has('persona_codpostal'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_codpostal') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="persona_direccion" class="required">Dirección</label>
                                <input type="text" name="persona_direccion" id="persona_direccion" class="form-control {{$errors->has('persona_direccion') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('persona_direccion', '')}}">
                                @if ($errors->has('persona_direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('persona_direccion') }}</strong>
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
                                <label for="contacto=" required">Contacto</label>

                                <select class="form-control select2" name="contacto_id">
                                    <option value="">Seleccione un cliente</option>
                                    @foreach ($contactos as $contacto)
                                    <option value="{{ $contacto->id }}" {{old('contacto_id') == $contacto->id ? 'selected' : ''}}>
                                        {{ $contacto->contacto_nombres }}
                                    </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('contacto_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_id') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="col-md-8 text-right mt-4">
                                <a class="btn btn-info" href="{{route('admin.personas.index')}}">
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