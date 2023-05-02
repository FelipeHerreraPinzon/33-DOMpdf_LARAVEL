@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class=" card-header p-3 bg-primary bg-gradient fw-bold text-white">
                        <h2>Variables <button data-option="create" data-tooltip="tooltip" title="Crear Variable" data-toggle="modal" data-target="#modalVariable" class="btn btn-primary clear">
                                <i class="fas fa-plus-circle"></i> Nueva
                            </button> </h2>


                    </div>
                    <div class="card-body" id="card_variables">
                        <div class="table-responsive ">

                            <table class="table table-bordered" id="variable_table">
                                <thead>
                                    <tr>

                                        <th>Numero</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variables as $variable)
                                    <tr>

                                        <td>{{$variable->numeracion}}</td>
                                        <td>{{$variable->nombre}}</td>
                                        <td>{{$variable->descripcion}}</td>
                                        <td>

                                            <a href="{{ url('/variables/muestraDetalle', $variable) }}" class="btn btn-success">Caracterizar</a>
                                            <button data-id="{!! $variable->id !!}" data-option="update" data-tooltip="tooltip" title="Editar Variable" data-toggle="modal" data-target="#modalVariable" class="btn btn-primary clear">
                                                <i class="fas fa-edit"></i>
                                            </button>



                                            <!--<button data-id="{!! $variable->id !!}" data-tooltip="tooltip" title="Caracterizar Variable" data-toggle="modal" data-target="#modalDetalle" class="btn btn-info clear">
                                                <i class="fas fa-list-ul"></i>
                                            </button>-->

                                            <button data-persona_id="{!! $variable->variable_id !!}" class="btn btn-danger btn_delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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

    <!-- Inicio Modal de Variables -->

    <div class="modal bd-example-modal-lg" id="modalVariable" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h4 id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class=" campos" id="option_select" hidden>
                    <input type="hidden" name="variable_id" id="variable_id">
                    <input type="hidden" class="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="numeracion" class="required">Numero</label>
                            <input type="text" name="numeracion" id="numeracion" class="form-control " placeholder="Nombre de la variable " value="" disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="nombre" class="required">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control " placeholder="Nombre de la variable " value="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="descripcion" class="required">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control " placeholder="Describa la variable a usar" value="">

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right mt-4">
                    <button class="btn btn-primary" id="btn_send" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                    <button class="btn btn-info" data-dismiss="modal" type="button"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--fin Modal de variables //-->

    <div class="modal bd-example-modal-lg" id="modalDetalle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h4 id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <div class="container w-75 border p-4 mt-3">
                        <form method="POST" action="">
                            @csrf

                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif


                            <div class="mb-1 ">

                                <!--<label for="title" class="form-label ml-2">Nombre de la Variable</label>-->
                                <div class="input-group ">
                                    <input type="text" class="form-control mb-3 " name="nomVariable" value="" disabled>

                                </div>



                            </div>


                            <div class="mb-3">
                                <input name="variable_id" type="hidden" value="">
                                <label for="title" class="form-label">Detalle o Caracteristica</label>
                                <input type="text" class="form-control " name="nombre">
                            </div>
                            <button type="submit" class="btn btn-primary"> Crear nueva caracteristica</button>
                        </form>

                        <div>

                            <div class="row py-1">
                                <div class="col-md-9 d-flex align-items-center">

                                    <a href="#"></a>
                                </div>
                                <div class="col-md3 d-flex justify-content-end">
                                    <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>




                </div>
                <div class="card-footer text-right mt-4">
                    <button class="btn btn-primary" id="btn_send" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                    <button class="btn btn-info" data-dismiss="modal" type="button"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/variable_index.js') }}"></script>
@endsection