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
                        <h5>Listado de Avaluados</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">


                            <table class="table table-bordered text-center " id="table">
                                <thead class="font-italic">
                                    <tr>

                                        <th>Radicado</th>
                                        <th>Avaluo</th>
                                        <th>Identificación</th>
                                        <th>Nombre_razón social</th>
                                        <th>Fecha y hora</th>
                                        <th>Estado_Visitador</th>
                                        <th>Estado_Avaluador</th>
                                        <th>Estado_Verificación</th>
                                        <th>Tiempo_proceso</th>
                                        <!--<th>asd</th>
                                       
                                        <th>asd</th>
                                        <th>asd</th>-->


                                        <th>Acciones_realizar</th>


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
                                        <td>{{$avaluo->fecha}}</td>


                                        <td>{{$avaluo->visitador_nombre}}</td>
                                        <td>{{$avaluo->valuador_nombre}}</td>
                                        <td>{{$avaluo->verificador_nombre}}</td>
                                        <td class=" {{tiempoTranscurrido($avaluo->fecha)[1]}} ">{{tiempoTranscurrido($avaluo->fecha)[0]}}</td>

                                        <!--<td><i class=" fas fa-window-minimize"></i></td>
                                        <td><i class=" fas fa-window-minimize"></i></td>
                                        
                                        <td><i class="fas fa-circle btn btn-success btn-sm"></i></td>-->

                                        <td>
                                            <button data-id="{!! $avaluo->id !!}" data-option="update" data-tooltip="tooltip" title="Seguimiento - Avaluo" data-toggle="modal" data-target="#modalAvaluo" class="btn btn-primary btn-sm clear">
                                                <i class="fas fa-edit"></i>
                                            </button>


                                            <button data-avaluo_id="{!! $avaluo->avaluo_id !!}" class="btn btn-danger btn_delete btn-sm">
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
<div class="modal bd-example-modal-md" id="modalAvaluo" aria-hidden="true">

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

                    <div class="form-group col-md-4">
                        <label class="form-label" for="asigna_visitador" class="required">Fecha y hora de Asignación</label>
                        <input class="form-control bg-info" id="asigna_visitador" name="asigna_visitador" class="form-control" type="datetime-local" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="clock" class="required">Tiempo transcurrido</label>
                        <input class="form-control" id="clock" name="clock" class="form-control" type="text" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <select class="form-select custom-select " name="estado" id="estado" aria-label=".form-select-lg example">
                            <option value="">Seleccione un Estado</option>
                            <option value="1">Sin Iniciar</option>
                            <option value="2">Visitado</option>
                            <option value="3">En Informe</option>
                            <option value="4">Control y Calidad</option>
                            <option value="5">Pendiente de Pago</option>
                            <option value="6">Reconsideración</option>
                            <option value="7">Finalizado</option>
                        </select>
                    </div>
                </div>

                <div class="pt-3 mt-1 text-muted border-top"></div>
                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label>Visitador :</label> <input class="input-sinborde" id="visitador_name" name="visitador_name" type="text" disabled>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-3 ">
                        <label for="fecha_visita" class="required">Visita</label>
                        <input class="form-control " id="fecha_visita" name="fecha_visita" type="text" disabled>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="visitador_id" class="required">Novedades</label>
                        <input class="form-control" name="visitador_id" type="text" value="" disabled>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="visitador_id" class="required">Entregado</label>
                        <input class="form-control" name="visitador_id" type="text" value="" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label for="valuador_name">Avaluador</label>
                        <input class="input-sinborde" id=" valuador_name" name="valuador_name" type="text" " disabled>
                    </div>
                </div>

                <div class=" row">
                        <div class="form-group col-md-3 ">
                            <label for="asigna_valuador" class="required">En Proceso</label>
                            <input class="form-control" id="asigna_valuador" name="asigna_valuador" type="text" disabled>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="visitador_id" class="required">Novedades</label>
                            <input class="form-control" name="visitador_id" type="text" disabled>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="visitador_id" class="required">Mesa tecnica</label>
                            <input class="form-control" name="visitador_id" type="text" value="" disabled>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="visitador_id" class="required">Entregado</label>
                            <input class="form-control" name="visitador_id" type="text" value="" disabled>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-5 ">
                            <label for="valuador_name">Verificador</label>
                            <input class="input-sinborde" id="verificador_name" name="valuador_name" type="text" " disabled>
                        </div>
                    </div>

                   <div class=" row">
                            <div class="form-group col-md-3 ">
                                <label for="asigna_valuador" class="required">En Proceso</label>
                                <input class="form-control" id="asigna_valuador" name="asigna_valuador" type="text" disabled>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="visitador_id" class="required">Novedades</label>
                                <input class="form-control" name="visitador_id" type="text" disabled>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="visitador_id" class="required">Mesa tecnica</label>
                                <input class="form-control" name="visitador_id" type="text" value="" disabled>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label for="visitador_id" class="required">Entregado</label>
                                <input class="form-control" name="visitador_id" type="text" value="" disabled>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-5 ">
                                <label for="valuador_name" class="required">Lider</label>
                                <input class="input-sinborde" id="lider_name" name="valuador_name" type="text" " disabled>
                        </div>
                    </div>

                   <div class=" row">
                                <div class="form-group col-md-3 ">
                                    <label for="asigna_valuador" class="required">En Proceso</label>
                                    <input class="form-control" id="asigna_valuador" name="asigna_valuador" type="text" disabled>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">Novedades</label>
                                    <input class="form-control" name="visitador_id" type="text" disabled>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">Mesa tecnica</label>
                                    <input class="form-control" name="visitador_id" type="text" value="" disabled>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">Entregado</label>
                                    <input class="form-control" name="visitador_id" type="text" value="" disabled>
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label for="avaluo_novedades" class="required">Novedades</label>
                                    <textarea class="form-control" name="avaluo_novedades" type="textarea" value=""></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_solnovedad" class="required">Solicitadas </label>
                                    <input class="form-control" name="fecha-solnovedad" type="datetime-local" value="">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="name" class="required">Recibidas</label>
                                    <input class="form-control" name="radicado_id" type="datetime-local" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label for="name" class="required">Observaciones Finales </label>
                                    <textarea class="form-control" name="radicado_id" type="textarea" value=""></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name" class="required">Fecha de envio </label>
                                    <input class="form-control" name="radicado_id" type="datetime-local" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name" class="required">Vr. Aprobado</label>
                                    <input class="form-control" name="radicado_id" type="text" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 ">
                                    <label for="name" class="required">Codigo de envio </label>
                                    <input class="form-control" name="radicado_id" type="text" value="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name" class="required">Valor Esperado</label>
                                    <input class="form-control" name="radicado_id" type="text" value="">
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
            {{-- Fin Modal Editar --}}



            @endsection
            @section('scripts')
            <script src="{{ asset('js/js_blade/tables.js') }}"></script>
            <script src="{{ asset('js/js_blade/avaluo_index.js') }}"></script>
            @endsection