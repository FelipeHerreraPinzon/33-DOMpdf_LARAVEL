@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Municipio</h1>
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
                        
                        <form method="POST" action="{{route('admin.municipios.update', $municipio->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-sm-2">
                                    <label for="municipio_codigo" class="required">Codigo</label>
                                    <input type="text" name="municipio_codigo" id="municipio_codigo" class="form-control {{$errors->has('municipio_codigo') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del usuario" value="{{old('municipio_codigo', $municipio->municipio_codigo)}}">
                                    @if ($errors->has('municipio_codigo'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('municipio_codigo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-sm-5  ">
                                    <label for="municipio_nombre" class="required">Nombre Municipio</label>
                                    <input type="text" name="municipio_nombre" id="municipio_nombre" class="form-control {{$errors->has('municipio_nombre') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('municipio_nombre', $municipio->municipio_nombre)}}">
                                    @if ($errors->has('municipio_nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('municipio_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!--<div class="form-group col-sm-5  ">
                                    <label for="departamento_id" class="required">Nombre Departamento</label>
                                    <input type="text" name="departamento_id" id="departamento_id" class="form-control {{$errors->has('departamento_id') ? 'is-invalid' : ''}}" placeholder="Seleccione Tipo Documento" value="{{old('departamento_id', $municipio->departamento->departamento_nombre)}}">
                                    @if ($errors->has('departamento_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('departamento_id') }}</strong>
                                    </span>
                                    @endif
                                </div>-->
                            

                            <div class="form-group col-sm-5 ">
                                <label for="departamento_id=" required">Contacto</label>

                                <select class="form-control select2" name="departamento_id" style="width: 100%;">
                                    <option value="">Seleccione un Departamento</option>
                                    @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}" {{(old('departamento_id') ? old('departamento_id') : $municipio->departamento->id ?? '' ) == $departamento->id ? 'selected' : ''}}>
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
                                <div class="col-sm-12 text-right mt-4">
                                    <a class="btn btn-danger" href="{{route('admin.municipios.index')}}">
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