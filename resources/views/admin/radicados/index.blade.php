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
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class=" card-header p-3 bg-primary bg-gradient fw-bold text-white">
                        <h5>Solicitudes radicadas pendientes de asignar <button data-option="create" data-tooltip="tooltip" title="Radicar nueva Solicitud" data-toggle="modal" data-target="#modalAdmin" class="btn btn-primary clear">
                                <i class="fas fa-plus-circle"></i> Nuevo
                            </button> </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Fecha</th>
                                        <th>Solicitante</th>
                                        <th>Dirección</th>
                                        <th>Zona</th>
                                        <th>Municipio</th>
                                        <th>Departamento</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($radicados as $radicado)
                                    <tr>
                                        <td>{{ $radicado->numero_radicado }}</td>
                                        <td>{{ $radicado->fecha }}</td>
                                        <td>{{ $radicado->solicitante_nombre." ".$radicado->solicitante_apellidos }}</td>
                                        <td>{{ $radicado->direccion }}</td>
                                        <td>{{ $radicado->zona }}</td>
                                        <td>{{ $radicado->municipio_nombre }}</td>
                                        <td>{{ $radicado->departamento_nombre }}</td>
                                        <td>{{ $radicado->cliente_nombre." ".$radicado->cliente_apellidos }}</td>
                                        <td>
                                            <button data-id="{!! $radicado->radicado_id !!}" data-option="update" data-tooltip="tooltip" title="Editar registro" data-toggle="modal" data-target="#modalAdmin" class="btn btn-primary btn-sm clear">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <a href="{{ url('radicados/'. $radicado->radicado_id.'/documentos') }}" title="Documentos" class="btn btn-secondary btn-sm"> <i class="fas fa-folder-open"></i></a>

                                            <button data-id="{!!  $radicado->radicado_id !!}" data-option="update" data-tooltip="tooltip" title="Asignar solicitud" data-toggle="modal" data-target="#modalAsignado" class="btn btn-success btn-sm clear">
                                                <i class="fas fa-hand-point-right"></i>
                                            </button>

                                            <button data-radicado_id="{!! $radicado->radicado_id !!}" title="Eliminar registro" class="btn btn-danger btn_delete btn-sm">
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
</div>

{{-- Fin Modal Editar --}}
<div class="modal fade" id="modalAdmin" aria-hidden="true" aria-labelledby="modal-title" role="dialog">
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
            <div class="modal-body">
                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label for="numero_radicado">Numero Radicado</label>
                        <input type="text" class="form-control campos" id="numero_radicado" placeholder="Numero radicado">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fecha">Fecha</label>
                        <input type="datetime-local" class="form-control campos" name="fecha" id="fecha" placeholder="Fecha">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cliente" style="width: 100%">Cliente</label>
                        <input type="text" class="form-control typeahead_cliente campos " placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_cliente" class="campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo_inmueble">Tipo inmueble</label>
                        <select class="custom-select form-control" name="id_tipo_inmueble" id="id_tipo_inmueble" style="width: 100%">
                            <option value="" selected disabled>Seleccione un tipo de inmueble</option>
                            @foreach ($detalle_tipo_inmuebles as $detalle_tipo_inmueble)
                            <option value="{{ $detalle_tipo_inmueble->id }}">{{ $detalle_tipo_inmueble->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="solicitante_id">Solicitante</label><br>
                        <input type="text" id="solicitante" class="form-control typeahead_solicitante campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_solicitante" class="campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control campos" id="direccion" placeholder="Direccion">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="departamento">Departamento</label><br>
                        <input type="text" class="form-control typeahead_departamento campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_departamento" class="campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="municipio">Municipio</label><br>
                        <input type="text" class="form-control typeahead_municipio campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_municipio" class="campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="referente">Referente</label><br>
                        <input type="text" id="referente" class="form-control typeahead_referente campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_referente" class="campos" autocomplete="off" hidden>
                    </div>
                    <!--<div class="form-group col-md-3">
                        <label for="barrio">Barrio</label>
                        <input type="text" class="form-control campos" id="barrio" placeholder="Barrio">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="zona">Zona</label>
                        <input type="text" class="form-control campos" id="zona" placeholder="Zona">
                    </div>-->
                </div>

                <div class="form-row">


                    <!--<div class="form-group col-md-5">
                        <label for="solicitante_id">Solicitante</label><br>
                        <input type="text" id="solicitante" class="form-control typeahead_solicitante campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_solicitante" class="campos" autocomplete="off" hidden>
                    </div>-->

                    <div class="form-group col-md-3">

                        <label for="tipo_credito">Linea de Crédito</label>
                        <select class="custom-select form-control" name="id_tipo_credito" id="id_tipo_credito" style="width: 100%">
                            <option value="" selected disabled>Seleccione una linea de crédito</option>
                            @foreach ($detalle_tipo_creditos as $detalle_tipo_credito)
                            <option value="{{ $detalle_tipo_credito->id }}">{{ $detalle_tipo_credito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="valor_referente">Expectativa de Valor</label>
                        <!--<input type="text" class="form-control campos" id="valor_referente" onblur="check(this)" placeholder="Valor referente">-->
                        <input type="text" class="form-control campos " id="valor_referente" placeholder="Valor referente">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="valor_referente">Cuenta</label><br>
                        <button class="btn btn-primary" id="btn_honorarios" type="button"><i class="fas fa-file-invoice-dollar "></i>Honorarios</button>
                    </div>


                </div>

                <div class="form-row">
                </div>
                <div id="card_honorarios" class="card shadow-lg col-lg-12 mt-4 p-3 bg-white">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="honorarios">Honorarios</label>
                            <!--<input type="text" class="form-control campos" name="honorarios" id="honorarios" onblur="check(this)" placeholder="Valor honorarios">-->
                           
                            <input type="text" class="form-control campos" name="honorarios" id="honorarios" " placeholder=" Valor honorarios">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_honorarios">Fecha</label>
                            <input type="date" class="form-control campos" name="fecha_honorarios" id="fecha_honorarios" placeholder="Fecha Recaudo">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="codigo_verificacion">Codigo</label>
                            <input type="text" class="form-control campos" name="codigo_verificacion" id="codigo_verificacion" placeholder="Codigo de verificacion">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="btn_send" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                    <button class="btn btn-info" data-dismiss="modal" type="button"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cancel</button>
                    <!-- <button class="btn btn-success" id="btn_send" type="button">Guardar</button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>-->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- la modal siguiente es la de asignacion // -->
<div class="modal bd-example-modal-md" id="modalAsignado" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-center">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title2"></h5>
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
                                <p id="fecha_asigna"></p>
                            </td>
                            <td>
                                <h5><strong>Solicitante</strong></h5>
                                <p id="nombre"></p>
                            </td>
                            <td>
                                <h5><strong>Dirección</strong></h5>
                                <p class="direccion"></p>
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
                        <button type="button" class="btn-btn-success" title="Ver Avaluador" data-toggle="modal" data-target="#modalVerValuadores">
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
                        <input type="text" id="" class="form-control typeahead_lider  campos" placeholder="Escribe y selecciona" autocomplete="off">
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
                    <button class="btn btn-primary" id="btn_send_asignado" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
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
                            <th>Asignado</th>
                            <th>Visitados</th>
                            <th>Proceso</th>
                            <th>Terminado</th>
                            <th>Total</th>



                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">

            <button class="btn btn-info" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Regresar</button>
        </div>
    </div>
</div>
</div>
{{-- Fin Modal Ver visitador --}}


{{-- Inicio Modal Ver valuador --}}
<div class="modal fade" id="modalVerValuadores" data-backdrop="static">
    <div class=" modal-dialog modal-xl modal-center"">
        <div class=" modal-content">
        <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
            <h5 id="modal-title3 headerRegister">Consulta y estado de valuadores </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="table_valuadores">
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
{{-- Fin Modal Ver valuador --}}


@endsection
@section('scripts')

<script src="{{ asset('js/js_blade/tables.js') }}">
</script>
<script src="{{ asset('js/js_blade/radicado_index.js') }}"></script>
@endsection