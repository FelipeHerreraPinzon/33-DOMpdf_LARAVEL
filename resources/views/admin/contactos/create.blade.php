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
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Formulario de Contactos</div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.contactos.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="contacto_nombres" class="required">Nombres</label>
                                <input type="text" name="contacto_nombres" id="contacto_nombres" class="form-control {{$errors->has('contacto_nombres') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('contacto_nombres', '')}}">
                                @if ($errors->has('contacto_nombres'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_nombres') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contacto_apellidos" class="required">Apellidos</label>
                                <input type="text" name="contacto_apellidos" id="contacto_apellidos" class="form-control {{$errors->has('contacto_apellidos') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('contacto_apellidos', '')}}">
                                @if ($errors->has('contacto_apellidos'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_apellidos') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="contacto_tel" class="required">Telefono</label>
                                <input type="text" name="contacto_tel" id="contacto_tel" class="form-control {{$errors->has('contacto_tel') ? 'is-invalid' : ''}}" placeholder="Ingrese numero telefono de contactoi" value="{{old('contacto_tel', '')}}">
                                @if ($errors->has('contacto_tel'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_tel') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contacto_direccion" class="required">Dirección</label>
                                <input type="text" name="contacto_direccion" id="contacto_direccion" class="form-control {{$errors->has('contacto_direccion') ? 'is-invalid' : ''}}" placeholder="Ingrese la contraseña del usuario" value="{{old('contacto_contacto_tel', '')}}">
                                @if ($errors->has('contacto_direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="contacto_email" class="required">Correo </label>
                                <input type="email" name="contacto_email" id="contacto_email" class="form-control {{$errors->has('contacto_email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del usuario" value="{{old('contacto_email', '')}}">
                                @if ($errors->has('contacto_email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_email') }}</strong>
                                </span>
                                @endif
                            </div>


                           
                                <div class="col-md-6 text-right">
                                    <a class="btn btn-info mt-3" href="{{route('admin.contactos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-primary mt-3" type="submit">
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





<!--<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Contacto</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">


                        <form method="POST" action="{{route('admin.contactos.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="contacto_nombres" class="required">Nombres</label>
                                <input type="text" name="contacto_nombres" id="contacto_nombres" class="form-control {{$errors->has('contacto_nombres') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('contacto_nombres', '')}}">
                                @if ($errors->has('contacto_nombres'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_nombres') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="contacto_apellidos" class="required">Apellidos</label>
                                <input type="text" name="contacto_apellidos" id="contacto_apellidos" class="form-control {{$errors->has('contacto_apellidos') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('contacto_apellidos', '')}}">
                                @if ($errors->has('contacto_apellidos'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_apellidos') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="contacto_tel" class="required">Telefono</label>
                                <input type="text" name="contacto_tel" id="contacto_tel" class="form-control {{$errors->has('contacto_tel') ? 'is-invalid' : ''}}" placeholder="Ingrese numero telefono de contactoi" value="{{old('contacto_tel', '')}}">
                                @if ($errors->has('contacto_tel'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_tel') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="contacto_direccion" class="required">Dirección</label>
                                <input type="text" name="contacto_direccion" id="contacto_direccion" class="form-control {{$errors->has('contacto_direccion') ? 'is-invalid' : ''}}" placeholder="Ingrese la contraseña del usuario" value="{{old('contacto_contacto_tel', '')}}">
                                @if ($errors->has('contacto_direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_direccion') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="contacto_email" class="required">Correo </label>
                                <input type="email" name="contacto_email" id="contacto_email" class="form-control {{$errors->has('contacto_email') ? 'is-invalid' : ''}}" placeholder="Ingrese el email del usuario" value="{{old('contacto_email', '')}}">
                                @if ($errors->has('contacto_email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('contacto_email') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.contactos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
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
</div>
@endsection