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
                        <h5>Listado de solicitudes pendientes de asignar</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="avaluo_table">
                                <thead>
                                    <tr>
                                        <th>Radicado</th>
                                        <th>Identificación</th>
                                        <th>Nombre</th>
                                        <th>Fecha y hora</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($radicados as $radicado)
                                    <tr>
                                        <td>{{$radicado->numero_radicado}}</td>
                                        <td>{{$radicado->numero_documento}}</td>
                                        <td>{{$radicado->nombres.' '.
                                          $radicado->apellidos}}</td>
                                        <td>{{$radicado->fecha.' '.$radicado->hora }}</td>
                                        <td>
                                            <button data-id="{!! $radicado->id !!}" data-option="update" data-tooltip="tooltip" title="Asignar solicitud" data-toggle="modal" data-target="#modalAsignado" class="btn btn-primary clear">
                                                <i class="fas fa-edit"></i>
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
</div>





{{-- Fin Modal Editar --}}
<div class="modal bd-example-modal-md" id="modalAsignado" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-center">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title"></h5>
                <input class="campos" id="option_select" hidden>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input class="campos" id="option_select" hidden>
                <input class="campos" id="radicado_id" hidden>
                <input type="number" id="id_referente" class="campos" autocomplete="off" hidden>
                <input class="_token" value="{{ csrf_token() }}" hidden>
            </div>
            <div>
                <table class="table table-secondary table-sm mt-1 ">
                    <tbody>
                        <tr>


                            <td>
                                <h5><strong>Fecha de Radicado</strong></h5>
                                <p id="fecha"></p>
                            </td>
                            <td>
                                <h5><strong>Solicitante</strong></h5>
                                <p id="nombre"></p>
                            </td>
                            <td>
                                <h5><strong>Dirección</strong></h5>
                                <p id="direccion" value=""></p>
                            </td>
                            <td>
                                <h5><strong>Municipio</strong></h5>
                                <p id="municipio"></p>
                            </td>
                            <td>
                                <h5><strong>Departamento</strong></h5>
                                <p id="departamento"></p>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-body">
                <div class="pt-3 mt-1 text-muted border-top"></div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label class="form-label " for="avaluo_codigo" class="required">Numero de Avaluo</label>
                        <input class="form-control" id="avaluo_codigo" name="avaluo_codigo" type="text" value="se debe generar" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="asigna_visitador" class="required">Fecha y hora de Asignación</label>
                        <input class="form-control bg-light" id="asigna_visitador" name="asigna_visitador" class="form-control" type="datetime-local" value="">
                    </div>

                </div>

                <div class="pt-3 mt-1 text-muted border-top"></div>
                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label for="visitador">Visitador</label>
                        <button type="button" class="btn-btn-success" title="Ver Visitador" data-toggle="modal" data-target="#modalVerVisitadores">
                            <i class="far fa-eye"></i>
                        </button><br>

                        <input type="text" id="" class="form-control typeahead_visitador campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_visitador" " class=" campos" autocomplete="off" hidden>

                    </div>
                    <div class="form-group col-md-5 ">
                        <label for="avaluador">Avaluador</label>
                        <button type="button" class="btn-btn-success" title="Ver Avaluador" data-toggle="modal" data-target="#modalVerAvaluadores">
                            <i class="far fa-eye"></i>
                        </button><br>

                        <input type="text" id="" class="form-control typeahead_valuador  campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_valuador" " class=" campos" autocomplete="off" hidden>

                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-5 ">
                        <label for="verificador">Verificador</label><br>
                        <input type="text" id="" class="form-control typeahead_verificador  campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_verificador" " class=" campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-5 ">
                        <label for="lider">Lider</label><br>
                        <input type="text" id=""  class="form-control typeahead_lider  campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_lider" " class=" campos" autocomplete="off" hidden>
                    </div>

                </div>
                <!-- solicitaron esta exclusión en reunión de enero 24 - 2023
                    <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="avaluo_novedades" class="required">Observaciones </label>
                        <textarea class="form-control" name="avaluo_novedades" type="textarea" value=""></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fecha_solnovedad" class="required">Solicitadas </label>
                        <input class="form-control" name="fecha-solnovedad" type="datetime-local" value="">
                    </div>

                </div>-->

                <div class="card-footer text-right mt-4">
                    <button class="btn btn-primary" id="btn_send" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                    <button class="btn btn-info" data-dismiss="modal" type="button"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cancel</button>
                </div>

            </div>
        </div>
    </div>

</div>
{{-- Fin Modal Editar --}}




{{-- Inicio Modal Ver visitador --}}
<div class="modal fade" id="modalVerVisitadores" data-backdrop="static">
    <div class=" modal-dialog modal-xl modal-center"">
        <div class=" modal-content">
        <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
            <h5 id="modal-title2 headerRegister">Consulta y estado de visitadores </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="table_visitadores">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>email</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success">Guardar</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>
{{-- Fin Modal Ver visitador --}}


@endsection

@section('scripts')
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/asignado_index.js') }}"></script>
@endsection