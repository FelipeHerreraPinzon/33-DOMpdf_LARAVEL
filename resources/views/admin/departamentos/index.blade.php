@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Departamentos</h1>
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
                        <a href="{{route('admin.departamentos.create')}}" class="btn btn-primary mb-3">Nuevo Departamento</a>

                        <table class="table table-bordered" id="departamento_table">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departamentos as $departamento)
                                <tr>
                                    <td>{{$departamento->departamento_codigo}}</td>
                                    <td>{{$departamento->departamento_nombre}}</td>
                                    <td>
                                        <a href="{{route('admin.departamentos.edit', $departamento->id)}}" class="btn btn-success">Editar</a>
                                        <form action="{{ route('admin.departamentos.destroy', $departamento->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
        $('#departamento_table').DataTable();
    });
</script>
@endsection