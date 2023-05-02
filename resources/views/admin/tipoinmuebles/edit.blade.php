@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Tipo Inmueble</h1>
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

                        <form method="POST" action="{{route('admin.tipoinmuebles.update', $tipoinmueble->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-6  ">
                                    <label for="nombre" class="required">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('nombre', $tipoinmueble->nombre)}}">
                                    @if ($errors->has('nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            <div class="col-sm-4 text-right mt-4">
                                <a class="btn btn-danger" href="{{route('admin.tipoinmuebles.index')}}">
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