@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Tipo de Documento</h1>
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

                        <form method="POST" action="{{route('admin.tipodocumentos.store')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="nombre" class="required">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('nombre', '')}}">
                                    @if ($errors->has('nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-4 text-right mt-4">
                                    <a class="btn btn-danger" href="{{route('admin.tipodocumentos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
                                    </button>
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