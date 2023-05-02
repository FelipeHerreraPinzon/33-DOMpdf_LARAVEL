@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Avaluos</h1>
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

                        <a href="{{route('admin.avaluos.create')}}" class="btn btn-primary mb-3">Nueva
                            Solicitud</a>


                        <table class="table table-bordered" id="avaluo_table">
                            <thead>
                                <tr>
                                    <!--<th>Radicado por</th>-->
                                    <th>Radicado</th>
                                    <th>Avaluo</th>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Fecha y hora</th>
                                    <th>Estado</th>
                                    <!--<th>Zona</th>
                                    <th>Municipio</th>
                                    <th>Departamento</th>                                    <th>Cliente</th>
                                    <th>Solicitante</th>-->
                                    <!--<th>Contacto</th>
                                    <th>Vr Esperado</th>
                                    <th>Honorarios</th>-->
                                    <th>Acciones</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($avaluos as $avaluo)
                                <tr>

                                    <td>{{$avaluo->numero_radicado}}</td>
                                    <td>{{$avaluo->codigo}}</td>
                                    <td>{{$avaluo->numero_documento}}</td>
                                    <td>{{$avaluo->nombres.' '.
                                          $avaluo->apellidos}}</td>
                                    <td>{{$avaluo->fecha.' '.
                                        $avaluo->hora }}</td>
                                    <td>Asignado</td>
                                    <td>

                                        <a href="{{route('admin.avaluos.edit', $avaluo->id)}}" class="btn btn-primary">Seguimiento</a>
                                        <a href="{{route('admin.avaluos.edit', $avaluo->id)}}" class="btn btn-success">Editar</a>
                                        <form action="{{ route('admin.avaluos.destroy', $avaluo->id) }}" id="delete_form" method="POST" onsubmit="return
                                         confirm('Esta seguro que desea eliminar el registro?')" style="display: 
                                          inline-block;">
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
        $('#avaluo_table').DataTable();
    });
</script>
@endsection