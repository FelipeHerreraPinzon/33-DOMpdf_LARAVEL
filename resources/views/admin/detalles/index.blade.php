@extends('layouts.admin')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    .color-container {
        width: 16px;
        height: 16px;
        display: inline-block;
        border-radius: 4px;
    }

    a {
        text-decoration: none;
    }
</style>
@section('content')

<div class="container w-25 border p-4 mt-3">
    <form method="POST" action="{{route('admin.detalles.store')}}">
        @csrf

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->has('nombre'))
        <h6 class="alert alert-danger">{{ $errors->first('nombre') }}</h6>
        <!--<span class="text-danger">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>-->
        @endif
        <div class="mb-1 ">

            <!--<label for="title" class="form-label ml-2">Nombre de la Variable</label>-->
            <div class="input-group ">
                <input type="text" class="form-control mb-3 " name="nomVariable" value="{{$variable->nombre}}" disabled>

            </div>
        </div>
        <div class="mb-3">
            <input name="variable_id" id="variable_id" type="hidden" value="{{$variable->numeracion}}">
            <label for="title" class="form-label">Detalle o Caracteristica</label>
            <input type="text" class="form-control " name="nombre">
        </div>
        <button type="submit" class="btn btn-primary"> Crear nueva caracteristica</button>
    </form>

    <div>
        @foreach($detalles as $detalle)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">

                <a href="{{route('admin.detalles.show', $detalle->id)}}">{{$detalle->nombre}}</a>
            </div>
            <div class="col-md3 d-flex justify-content-end">
                <form action="{{route('admin.detalles.destroy', $detalle->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection