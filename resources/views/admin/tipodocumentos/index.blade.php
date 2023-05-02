@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de tipo de Documentos</h1>
            </div>



        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.tipodocumentos.create')}}" class="btn btn-primary mb-3">Nuevo Tipo de documento</a>

                        <table class="table table-bordered" id="tipodocumento_table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipodocumentos as $tipodocumento)
                                <tr>
                                    <td>{{$tipodocumento->nombre}}</td>
                                    
                                    <td>
                                        <a href="{{route('admin.tipodocumentos.edit', $tipodocumento->id)}}" class="btn btn-success">Editar</a>
                                        <form action="{{ route('admin.tipodocumentos.destroy', $tipodocumento->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
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
        $('#tipodocumentoe_table').DataTable();
    });
</script>
@endsection