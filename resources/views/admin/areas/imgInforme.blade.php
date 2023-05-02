@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Imagenes de informe</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p class="bd-lead">Aqui encuentras las imagenes agregadas al
                            avaluo: <span>{{ $inmueble->codigo }}</span></p>
                        <!--<form class="form-inline" action="{{ route('admin.documentos.store') }}" method="POST"-->
                        <form action="{{ route('admin.documentos.store') }}" method="POST"
                            enctype='multipart/form-data'> @csrf
                            <input name="inmueble_id" value="{{ $inmueble->inmueble_id }}" hidden>
                            <input name="option_view" value="{{ $option_view }}" hidden>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="name" class="required">Cargar imagenes</label>

                                    <input class="form-control" type="file" name="files[]" id="" multiple required>
                                    <br>
                                    @error('files')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="nombre_imagen">Nombre imagen</label>
                                    <input type="text" class="form-control campos" id="nombre_imagen"
                                        name="nombre_imagen" placeholder="Nombre la imagen a su gusto">
                                </div>

                                <div class="form-group col-md-2 my-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Cargar</button>
                                </div>
                            </div>
                        </form>
                        </br>
                        <table class="table table-bordered" id="documento_table">
                            <thead>
                                <tr>
                                    <th>Nombre archivo</th>
                                    <th>Nombre indicado</th>
                                    <th>Fecha y hora de carga</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                <tr>
                                    <td>{{ $documento->nombre }}</td>
                                    <td>{{ $documento->nombre_imagen }}</td>
                                    <td>{{ $documento->created_at }}</td>
                                    <td>
                                        <a href="{{ url('radicados/documentos/' . $documento->id . '/descargar') }}"
                                            class="btn btn-outline-success btn-sm">Descargar</a>
                                        <a target="_blank"
                                            href="{{ url('radicados/documentos/' . $documento->id . '/ver') }}"
                                            class="btn btn-info btn-sm">Ver</a>
                                        <form action="{{ route('admin.documentos.destroy', $documento->id) }}"
                                            id="delete_form" method="POST"
                                            onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#documento_table').DataTable();
});
</script>
@endsection