@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Variable</h1>
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

                        <form method="POST" action="{{route('admin.variables.store')}}">
                            @csrf
                            <div class="row">

                            <div class="form-group col-sm-2">
                                    <label for="numeracion" class="required">Numero</label>
                                    <input type="text" name="numeracion" id="numeracion" class="form-control " placeholder="Nombre de la variable " value="{{$ultimo->numeracion + 1}}" disabled>
                                   
                                </div>



                                <div class="form-group col-sm-4">
                                    <label for="nombre" class="required">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Nombre de la variable " value="{{old('nombre', '')}}">
                                    @if ($errors->has('nombre'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="descripcion" class="required">Descripción</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" placeholder="Describa la variable a usar" value="{{old('descripcion', '')}}">
                                    @if ($errors->has('descripcion'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right mt-4">
                                    <a class="btn btn-danger" href="{{route('admin.variables.index')}}">
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
</div>
@endsection