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

<div class="container w-25 border p-4 mt-2">
    <form method="POST" action="{{route('admin.detalles.update', $detalle->id)}}">
        @csrf
        @method('PUT')

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
        <div class="mb-3">
            <input name="variable_id" type="hidden" value="{{$detalle->id}}">
            <input name="variable_numeracion" type="hidden" value="{{$detalle->variable_numeracion}}">
            <label for="title" class="form-label">Detalle o Caracteristica</label>
            <input type="text" class="form-control " name="nombre" value="{{$detalle->nombre}}">


        </div>
        <button type="submit" class0"btn btn-primary"> Actualizar caracteristica</button>
    </form>



</div>

@endsection