@extends('layouts.admin')
<style>
    header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }

    .card-header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }
</style>
@section('content')


<header style="height:70 px">
</header>
<div style="height: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white">
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Administrador de Documentos</div>
                <div class="card-body">

                    <!--<form id="form1" action="{{route('admin.tipodocumentos.index')}}" method="POST">-->
                    <form action="{{route('admin.documentos.store')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="name" class="required">Nuevo documento</label>
                                    <input name="radicado_id" type="hidden" value="{{$radicado->id}}">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="files[]" id="" multiple required>
                                    <br>
                                    @error('files')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-primary ">Subir</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card shadow-lg p-3 mb-5 bg-white">
                        <table class="table table-bordered pd-3" id="documento_table">
                            <thead>
                                <tr>
                                    <th>Solicitud</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                <tr>
                                    <td>{{$radicado->numradicado}}</td>
                                    <td>{{$documento->documento_nombre}}</td>
                                    <td>

                                        <a href="{{route('admin.documentos.edit', $documento->id)}}" class="btn btn-outline-success btn-sm">Descargar</a>
                                        <a target="_blank" href="../storage/{{$radicado->numradicado}}/{{$documento->documento_nombre}}" class="btn btn-info btn-sm">Ver</a>
                                        <form action="{{ route('admin.documentos.destroy', $documento->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="radicado_id" value="{{$radicado->id}}">
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
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#documento_table').DataTable();
    });
</script>
@endsection