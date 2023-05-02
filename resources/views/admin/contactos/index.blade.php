@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Contactos</h1>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('admin.contactos.create')}}" class="btn btn-primary mb-3">Nuevo Contacto</a>

                        <table class="table table-bordered" id="contacto_table">
                            <thead>
                                <tr>
                                    
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactos as $contacto)
                                <tr>
                                    <td>{{$contacto->contacto_nombres}}</td>
                                    <td>{{$contacto->contacto_apellidos}}</td>
                                    <td>{{$contacto->contacto_tel}}</td>
                                    <td>{{$contacto->contacto_email}}</td>
                                    <td>{{$contacto->contacto_direccion}}</td>
                                   
                                    <td>
                                        <a href="{{route('admin.contactos.edit', $contacto->id)}}" class="btn btn-success">Editar</a>
                                        <form action="{{ route('admin.contactos.destroy', $contacto->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
        $('#contacto_table').DataTable();
    });
</script>
@endsection