@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Municipio</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('admin.municipios.store')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="municipio_codigo" class="required">Codigo</label>
                                    <input type="text" name="municipio_codigo" id="municipio_codigo" class="form-control {{$errors->has('municipio_codigo') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('municipio_codigo', '')}}">
                                    @if ($errors->has('municipio_codigo'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('municipio_codigo') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="municipio_nombre" class="required">Nombre Municipio</label>
                                    <input type="text" name="municipio_nombre" id="municipio_nombre" class="form-control {{$errors->has('municipio_nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('municipio_nombre', '')}}">
                                    @if ($errors->has('municipio_nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('municipio_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="departamento_id" class="required">Nombre Departamento</label>
                                    <input type="text" name="departamento_id" id="departamento_id" class="form-control {{$errors->has('departamento_id') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('departamento_id', '')}}">
                                    @if ($errors->has('departamento_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('departamento_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right mt-4">
                                    <a class="btn btn-danger " href="{{route('admin.municipios.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success " type="submit">
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
</div>
@endsection