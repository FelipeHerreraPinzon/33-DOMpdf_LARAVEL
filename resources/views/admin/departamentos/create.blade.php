@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Departamento</h1>
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

                        <form method="POST" action="{{route('admin.departamentos.store')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="departamento_codigo" class="required">Codigo</label>
                                    <input type="text" name="departamento_codigo" id="departamento_codigo" class="form-control {{$errors->has('departamento_codigo') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('departamento_codigo', '')}}">
                                    @if ($errors->has('departamento_codigo'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('departamento_codigo') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="departamento_nombre" class="required">Nombre Departamento</label>
                                    <input type="text" name="departamento_nombre" id="departamento_nombre" class="form-control {{$errors->has('departamento_nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('departamento_nombre', '')}}">
                                    @if ($errors->has('departamento_nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('departamento_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                                
                                    <div class="col-sm-4 text-right mt-4">
                                        <a class="btn btn-danger " href="{{route('admin.departamentos.index')}}">
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