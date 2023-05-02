@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Administrador de Documentos</h1>
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
                            <p class="bd-lead">Aqui encuentras los archivos agregados al
                                readicado: <span>{{ $radicado->numero_radicado }}</span></p>
                            <form class="form-inline" action="{{ route('admin.documentos.store') }}" method="POST"
                                enctype='multipart/form-data'> @csrf
                                <input name="radicado_id" type="hidden" value="{{ $radicado->id }}">
                                <input name="option_view" value="{{ $option_view }}" hidden>

                                <div class="form-group mb-2">
                                    <label for="name" class="required">Cargar Documentos</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input class="form-control" type="file" name="files[]" id="" multiple
                                        required>
                                    <br>
                                    @error('files')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 8px;">Cargar</button>
                            </form>
                            </br>
                            <table class="table table-bordered" id="documento_table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha y hora de carga</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $documento)
                                        <tr>
                                            <td>{{ $documento->nombre }}</td>
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
