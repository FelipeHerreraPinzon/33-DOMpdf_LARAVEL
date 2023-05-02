@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Municipios</h1>
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.municipios.create')}}" class="btn btn-primary mb-3">Nuevo Municipio</a>

                        <table class="table table-bordered" id="municipio_table">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{$municipio->municipio_codigo}}</td>
                                    <td>{{$municipio->municipio_nombre}}</td>
                                    <td>{{$municipio->departamento->departamento_nombre}}</td>
                                    <td>
                                        <a href="{{route('admin.municipios.edit', $municipio->id)}}" class="btn btn-success">Editar</a>
                                        <form action="{{ route('admin.municipios.destroy', $municipio->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
        $('#municipio_table').DataTable();
    });
</script>
@endsection