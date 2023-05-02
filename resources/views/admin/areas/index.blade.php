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
                        <h5>Area de trabajo Visitador {{ auth()->user()->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Avaluo</th>
                                        <th>Solicitante</th>
                                        <th>Asignado</th>
                                        <th>Visita</th>
                                        <th>Novedades</th>
                                        <th>Fecha enviado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avaluos as $avaluo)
                                    <tr>
                                        <td>{{$avaluo->codigo}}</td>
                                        <td>{{$avaluo->solicitante_nombres." ".$avaluo->solicitante_apellidos}}</td>
                                        <td>{{$avaluo->asigna_visitador}}</td>
                                        <td>{{$avaluo->fecha_visita}}</td>
                                        <td>{{$avaluo->novedades}}</td>
                                        <td>{{$avaluo->entrega_visitador}}</td>
                                        <td>{{$avaluo->estado_nombre }}</td>
                                        <td>

                                            <button data-id="{!! $avaluo->id !!}" data-option="update"
                                                data-tooltip="tooltip" title="Actualizar registro" data-toggle="modal"
                                                data-target="#modalAreaVisita" class="btn btn-primary btn-sm clear">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            @if( $avaluo->fecha_visita != null)
                                            <button data-template="{!! $avaluo->id !!}" data-option="Informe"
                                                data-tooltip="tooltip" title="Informe de Visita" data-toggle="modal"
                                                data-target="#modalInforme" class="btn btn-success btn-sm clear">
                                                <i class=" fas fa-file-alt"></i>
                                            </button>

                                            <!--
                                            <button data-id="{!! $avaluo->id !!}" data-option="update"
                                                data-tooltip="tooltip" title="Documentos e Imagenes" data-toggle="modal"
                                                data-target="#modalAreaVisita" class="btn btn-warning clear">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </button>
                                            -->
                                            @endif
                                            @if( $avaluo->inmueble_id != null)
                                            <a target="_blank"
                                                href="{{ url('areas/inmueble/'. $avaluo->inmueble_id.'/imagenes') }}"
                                                title="Imagenes inmueble" class="btn btn-secondary btn-sm"> <i
                                                    class="fas fa-folder-open"></i>
                                            </a>
                                            @endif
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
<div class="modal fade" id="modalAreaVisita" aria-hidden="true" aria-labelledby="modal-title" role="dialog"
    tabindex="-2">
    <div class="modal-dialog modal-lg modal-center">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input class="campos" id="option_select" hidden>
                <input class="campos" id="avaluo_id" hidden>
                <input class="_token" value="{{ csrf_token() }}" hidden>
            </div>
            <div class="modal-body">

                <ul>
                    <li>Solicitante: <input class="input-sinborde w-50" id="sol_nombre"></li>

                    <li>Direccion: <input class="input-sinborde w-50" id="sol_direccion"> Municipio - <input
                            class="input-sinborde w-25" id="sol_municipio"></li>

                    <li>Contacto: <input class="input-sinborde w-50" id="sol_contacto_nombre"> Telefono:<input
                            class="input-sinborde" id="sol_contacto_telefono"></li>
                </ul>



                <!--<p>Solicitante:_<input class="input-sinborde" id="sol_nombre"><br>
                    Dirección :<input class="input-sinborde" id="sol_direccion"> Municipio - <input class="input-sinborde" id="sol_municipio"><br>
                    Contacto: <input class="input-sinborde" id="sol_contacto_nombre">
                    Telefono:<input class="input-sinborde" id="sol_contacto_telefono">
                </p>-->

                <div class="form-row">


                    <div class="form-group col-md-4">
                        <label for="fecha_asignado">Fecha de Asignación</label>
                        <input class="form-control campos  bg-secondary" id="fecha_asignado" name="fecha_asignado"
                            type="datetime-local" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_visita">Fecha programada de Visita</label>
                        <input class="form-control campos  bg-info" id="fecha_visita" type="datetime-local" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado_id">Estado Avaluo</label><br>
                        <select class="custom-select form-control" name="estado_id" id="estado_id" style="width: 100%">
                            <option value="" selected>Estado actual</option>

                            @foreach ($detalle_estado_visitadores as $detalle_estado_visitador)
                            <option value="{{ $detalle_estado_visitador->id }}">{{ $detalle_estado_visitador->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="reprogramar" class="form-group col-md-4">
                        <label for="fecha_visita2">Reprogramación de Visita</label>
                        <input class="form-control campos  bg-info" id="fecha_visita2" type="datetime-local" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="novedades">Novedades</label>
                        <textarea class="form-control campos" name="novedades" id="novedades" type="textarea"
                            value=""></textarea>
                    </div>
                </div>


                <!--<div class="form-row">
                    <div class="form-group col-md-12">
                        <div id="mi_mapa" style="margin:0 auto; width: 100%; height: 250px;"></div>
                    </div>
                </div>-->



            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn_send" type="button">Guardar</button>
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- Fin Modal Editar --}}

{{-- Inicio Modal informe --}}
<div class="modal fade" id="modalInforme" aria-hidden="true" aria-labelledby="modal-title" role="dialog" tabindex="-2">
    <div class="modal-dialog modal-xl modal-center">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title">Informe vista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="text" class="_token" value="{{ csrf_token() }}" hidden>
            </div>
            <form id="form_inmueble">
                <div class="modal-body">

                    <input type="number" class="campos" name="informe_avaluo_id" id="informe_avaluo_id" hidden>
                    <input type="number" class="campos" name="informe_propiedad_horizontal_id"
                        id="informe_propiedad_horizontal_id" hidden>
                    <input type="number" class="campos" name="informe_dependencia_id" id="informe_dependencia_id" hidden>
                    <input type="number" class="campos" name="informe_inmueble_id" id="informe_inmueble_id" hidden>
                    <input type="number" class="campos" name="informe_sector_id" id="informe_sector_id" hidden>


                    <ul class="nav nav-tabs padre" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="informacion-tab" data-toggle="tab"
                                data-target="#informacion" data-nombre="informacion" type="button" role="tab"
                                aria-controls="informacion" aria-selected="true">Información</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="serv-publicos-tab" data-toggle="tab"
                                data-target="#serv-publicos" type="button" role="tab" aria-controls="serv-publicos"
                                aria-selected="false">Serv
                                Publicos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="acabados-tab" data-toggle="tab" data-target="#acabados"
                                type="button" role="tab" aria-controls="acabados"
                                aria-selected="false">Dependencias</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="propiedad-horizontal-tab" data-toggle="tab"
                                data-target="#propiedad-horizontal" type="button" role="tab"
                                aria-controls="propiedad-horizontal" aria-selected="false">Propiedad Horizontal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dotacion-comunal-tab" data-toggle="tab"
                                data-target="#dotacion-comunal" type="button" role="tab"
                                aria-controls="dotacion-comunal" aria-selected="false">Amenidades</button>
                        </li>
                    </ul>

                    <!-- Incio tabs-->
                    <div class="tab-content" id="myTabContent">
                        <!-- Inicio informacion basica-->
                        <div class="tab-pane fade show active" id="informacion" role="tabpanel"
                            aria-labelledby="informacion-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Información Básica</h5>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="codigo">Numero avaluo</label>
                                                <input type="text" class="form-control campos" id="codigo" name="codigo"
                                                    placeholder="codigo" disabled>
                                            </div>
                                            <!--<div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="referente_nombre">Referente</label>
                                                        <input type="text" class="form-control campos" id="referente_nombre" name="referente_nombre" placeholder="referente_nombre" disabled>
                                                    </div>-->
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="solicitante_nombre">Solicitante</label>
                                                <input type="text" class="form-control campos" id="solicitante_nombre"
                                                    name="solicitante_nombre" placeholder="solicitante_nombre" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="banco">Banco</label>
                                                <input type="text" class="form-control campos" id="banco" name="banco"
                                                    placeholder="Banco" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="visitador_nombre">Visitador</label>
                                                <input type="text" class="form-control campos" id="visitador_nombre"
                                                    name="visitador_nombre" placeholder="Nombre visitador" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="fecha_visita">Fecha visita</label>
                                                <input type="datetime-local" class="form-control campos"
                                                    id="informe_fecha_visita" name="fecha_visita" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="montaje">Montaje</label>
                                                <input type="text" class="form-control campos" id="montaje"
                                                    name="montaje" placeholder="Montaje">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="direccion">Direccion</label>
                                                <input type="text" class="form-control campos" id="direccion"
                                                    name="direccion" placeholder="Direccion">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="barrio">Barrio</label>
                                                <input type="text" class="form-control campos" id="barrio" name="barrio"
                                                    placeholder="Barrio">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="zona">Zona</label>
                                                <input type="text" class="form-control campos" id="zona" name="zona"
                                                    placeholder="zona">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="nomConjunto">Nombre conjunto</label>
                                                <input type="text" class="form-control campos" id="nombre_conjunto"
                                                    name="nombre_conjunto" placeholder="Nombre conjunto">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="vetustez">Vetustez</label>
                                                <input type="text" class="form-control campos" id="vetustez"
                                                    name="vetustez" placeholder="Vetustez">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="atendido_por">Atentido por</label>
                                                <input type="text" class="form-control campos" id="atendido_por"
                                                    name="atendido_por" placeholder="Atendido por">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="telefono">Telefono</label>
                                                <input type="text" class="form-control campos" id="telefono"
                                                    name="telefono" placeholder="Telefono">
                                            </div>

                                            <!--- para las coordenadas-->
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="latitud">Latitud</label>
                                                <input type="text" class="form-control campos" id="latitud"
                                                    name="latitud" placeholder="Latitud">
                                            </div>

                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="longitud">Longitud</label>
                                                <input type="text" class="form-control campos" id="longitud"
                                                    name="longitud" placeholder="Longitud">
                                            </div>

                                            <!-- div para el mapa -->

                                            <div class="col-12">
                                                <!-- div para el mapa -->
                                                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div id="mi_mapa" style=" width: 100%; height: 350px;">
                                                    </div>
                                                </div>
                                                <!-- fin div del mapa -->
                                            </div>

                                            <!-- fin div del mapa -->


                                            <div class="form-group col-md-12">
                                                <hr>
                                                <label for="nomConjunto">DOCUMENTOS SUMINISTRADOS</label>
                                                <div class="row">
                                                    @foreach ($documentos as $documento)
                                                    <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input campos_checkbox"
                                                                type="checkbox" value="{!! $documento->id !!}"
                                                                id="doc-{!! $documento->id !!}"
                                                                name="detalle_documentos_suministrados">
                                                            <label for="doc-{!! $documento->id !!}"
                                                                class="custom-control-label">{!!
                                                                $documento->nombre
                                                                !!}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin informacion basica-->

                        <!-- Inicio Servicios Publicos-->
                        <div class="tab-pane fade" id="serv-publicos" role="tabpanel"
                            aria-labelledby="serv-publicos-tab">
                            <div class="card">
                                <div class="card-body">
                                    <label> SERVICIOS PUBLICOS</label>
                                    <div class="row form-group">
                                        <div class="form-group col-md-12">
                                            <label>SECTOR</label>
                                            <div class="row">
                                                @foreach ($servicios_sector_predio as $servicio)
                                                <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input campos_checkbox"
                                                            type="checkbox" id="sector-{!! $servicio->id !!}"
                                                            name="detalle_servicios_sector"
                                                            value="{!! $servicio->id !!}">
                                                        <label for="sector-{!! $servicio->id !!}"
                                                            class="custom-control-label">{!!
                                                            $servicio->nombre
                                                            !!}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <hr>
                                            <label>PREDIO</label>
                                            <div class="row">
                                                @foreach ($servicios_sector_predio as $servicio)
                                                <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input campos_checkbox"
                                                            type="checkbox" id="predio-{!! $servicio->id !!}"
                                                            name="detalle_servicios_predio"
                                                            value="{!! $servicio->id !!}">
                                                        <label for="predio-{!! $servicio->id !!}"
                                                            class="custom-control-label">{!!
                                                            $servicio->nombre
                                                            !!}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <hr>
                                            <label>CONTADOR</label>
                                            <div class="row">
                                                @foreach ($servicios_contador as $servicio)
                                                <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input campos_checkbox"
                                                            type="checkbox" id="contador-{!! $servicio->id !!}"
                                                            name="detalle_servicios_contador"
                                                            value="{!! $servicio->id !!}">
                                                        <label for="contador-{!! $servicio->id !!}"
                                                            class="custom-control-label">{!!
                                                            $servicio->nombre
                                                            !!}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="form-group row">
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="estrato">Estrato</label>
                                                    <input type="number" class="form-control" id="estrato"
                                                        name="estrato" placeholder="Numero">
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="topografias">Topografia</label>
                                                    <select class="custom-select" data-mdb-filter="true"
                                                        id="detalle_topografia" name="detalle_topografia">
                                                        <option value="" selected>Seleccione una topografia
                                                        </option>
                                                        @foreach ($topografias as $topogafia)
                                                        <option value="{{ $topogafia->id }}">
                                                            {{ $topogafia->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="numero_pisos">Numero pisos</label>
                                                    <input type="number" class="form-control" id="numero_pisos"
                                                        name="numero_pisos" placeholder="numero_pisos">
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="numero_sotanos">Numero sotanos</label>
                                                    <input type="number" class="form-control" id="numero_sotanos"
                                                        name="numero_sotanos" placeholder="Numero">
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="detalle_tipo_inmueble">Tipo inmueble</label>
                                                    <select class="custom-select" data-mdb-filter="true"
                                                        id="detalle_tipo_inmueble" name="detalle_tipo_inmueble">
                                                        <option value="" selected>Seleccione un tipo de
                                                            inmueble
                                                        </option>
                                                        @foreach ($tipo_inmuebles as $tipo_inmueble)
                                                        <option value="{{ $tipo_inmueble->id }}">
                                                            {{ $tipo_inmueble->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="detalle_uso_actual">Uso</label>
                                                    <select class="custom-select" data-mdb-filter="true"
                                                        id="detalle_uso_actual" name="detalle_uso_actual">
                                                        <option value="" selected>Seleccione el uso del
                                                            inmueble
                                                        </option>
                                                        @foreach ($usos as $uso)
                                                        <option value="{{ $uso->id }}">{{ $uso->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <label for="detalle_estado_construccion">Estado de la
                                                        consctrucción</label>
                                                    <select class="custom-select" data-mdb-filter="true"
                                                        id="detalle_estado_construccion"
                                                        name="detalle_estado_construccion">
                                                        <option value="" selected>Seleccione un estado de
                                                            construccion</option>
                                                        @foreach ($estados as $estado)
                                                        <option value="{{ $estado->id }}">
                                                            {{ $estado->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Servicios Publicos-->

                        <!-- Inicio Acabados-->
                        <div class="tab-pane fade" id="acabados" role="tabpanel" aria-labelledby="acabados-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">DEPENDENCIA</th>
                                                                <th scope="col">#</th>
                                                                <th scope="col">ÁREA</th>
                                                                <th scope="col">TIPO ACABADOS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Sala</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm" id="salas"
                                                                        name="salas">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="salas_area" name="salas_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="salas_detalle"
                                                                        name="salas_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Comedor</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="comedores" name="comedores">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="comedores_area" name="comedores_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="comedores_detalle"
                                                                        name="comedores_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estudio</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="estudios" name="estudios">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="estudios_area" name="estudios_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="estudios_detalle"
                                                                        name="estudios_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Baño Social</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_sociales" name="banos_sociales">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_sociales_area"
                                                                        name="banos_sociales_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="banos_sociales_detalle"
                                                                        name="banos_sociales_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estar de Habitación</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="star_habitaciones" name="star_habitaciones">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="star_habitaciones_area"
                                                                        name="star_habitaciones_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="star_habitaciones_detalle"
                                                                        name="star_habitaciones_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Habitaciones</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="habitaciones" name="habitaciones">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="habitaciones_area" name="habitaciones_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="habitaciones_detalle"
                                                                        name="habitaciones_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Baño Privado</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_privados" name="banos_privados">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_privados_area"
                                                                        name="banos_privados_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="banos_privados_detalle"
                                                                        name="banos_privados_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cocina</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="cocinas" name="cocinas">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="cocinas_area" name="cocinas_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="cocinas_detalle"
                                                                        name="cocinas_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cuarto de Servicio</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="cuartos_servicio" name="cuartos_servicio">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="cuartos_servicio_area"
                                                                        name="cuartos_servicio_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="cuartos_servicio_detalle"
                                                                        name="cuartos_servicio_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Baño de Servicio</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_servicio" name="banos_servicio">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="banos_servicio_area"
                                                                        name="banos_servicio_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="banos_servicio_detalle"
                                                                        name="banos_servicio_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Patio de Ropas</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="patios_ropas" name="patios_ropas">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="patios_ropas_area" name="patios_ropas_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="patios_ropas_detalle"
                                                                        name="patios_ropas_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Terraza</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="terrazas" name="terrazas">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="terrazas_area" name="terrazas_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="terrazas_detalle"
                                                                        name="terrazas_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jardín</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="jardines" name="jardines">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="jardines_area" name="jardines_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="jardines_detalle"
                                                                        name="jardines_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Balcón</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="balcones" name="balcones">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="balcones_area" name="balcones_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="balcones_detalle"
                                                                        name="balcones_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zona Verde Privada</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="zonas_verdes" name="zonas_verdes">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="zonas_verdes_area" name="zonas_verdes_area">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        id="zonas_verdes_detalle"
                                                                        name="zonas_verdes_detalle">
                                                                        <option value="" selected>Seleccione
                                                                            un tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Otro</td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="acabados_otro" name="acabados_otro">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="acabados_otro" name="acabados_otro">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="acabado_otro"
                                                                        name="acabado_otro">
                                                                        <option value="null" selected disabled>
                                                                            Seleccione un
                                                                            tipo de
                                                                            acabado
                                                                        </option>
                                                                        @foreach ($acabados as $acabado)
                                                                        <option value="{{ $acabado->id }}">
                                                                            {{ $acabado->nombre }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Acabados-->

                        <!-- Inicio propiedad horizontal-->
                        <div class="tab-pane fade" id="propiedad-horizontal" role="tabpanel"
                            aria-labelledby="propiedad-horizontal-tab">
                            <div class="card">
                                <div class="card-body">
                                    <p>Selecciona si, si el inmueble es propiedad horizontal</p>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Es propiedad Horizontal?</label>
                                        <select class="form-control" id="sometido" name="sometido">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="section_propiedad_horizontal">
                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="conjunto_cerrado">Conjunto cerrado</label>
                                                <input type="text" class="form-control" id="conjunto_cerrado"
                                                    name="conjunto_cerrado" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="ubicacion_inmueble">Ubicacion inmueble</label>
                                                <input type="text" class="form-control" id="ubicacion_inmueble"
                                                    name="ubicacion_inmueble" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="numero_edificios">Numero Edificios</label>
                                                <input type="text" class="form-control" id="numero_edificios"
                                                    name="numero_edificios" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="unidades_por_piso">Unidades por piso</label>
                                                <input type="text" class="form-control" id="unidades_por_piso"
                                                    name="unidades_por_piso" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="total_unidades">Total unidades</label>
                                                <input type="text" class="form-control" id="total_unidades"
                                                    name="total_unidades" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="total_garajes">Total Parqueaderos</label>
                                                <input type="text" class="form-control" id="total_garajes"
                                                    name="total_garajes" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="total_garajes_comunales">Parq. comunales</label>
                                                <input type="text" class="form-control" id="total_garajes_comunales"
                                                    name="total_garajes_comunales" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="garajes_cubiertos">Parq. cubiertos</label>
                                                <input type="text" class="form-control" id="garajes_cubiertos"
                                                    name="garajes_cubiertos" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="garajes_descubiertos">Parq. descubiertos</label>
                                                <input type="text" class="form-control" id="garajes_descubiertos"
                                                    name="garajes_descubiertos" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="total_garajes_servidumbre_comunales">Parq.
                                                    servidumbre</label>
                                                <input type="text" class="form-control"
                                                    id="total_garajes_servidumbre_comunales"
                                                    name="total_garajes_servidumbre_comunales" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="garaje_sencillo">Parq. sencillos</label>
                                                <input type="text" class="form-control" id="garaje_sencillo"
                                                    name="garaje_sencillo" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="garaje_doble">Parq. dobles</label>
                                                <input type="text" class="form-control" id="garaje_doble"
                                                    name="garaje_doble" placeholder="Numero" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                <label for="total_depositos">Total depositos</label>
                                                <input type="text" class="form-control" id="total_depositos"
                                                    name="total_depositos" placeholder="Numero" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin propiedad Horizontal-->

                        <!-- Inicio dotacion comunal - Amenidades-->
                        <div class="tab-pane fade" id="dotacion-comunal" role="tabpanel"
                            aria-labelledby="dotacion-comunal-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Dotacion Comunal</label>
                                            <div class="row">
                                                @foreach ($dotacion_comunal as $dotacion)
                                                <div class="form-group col-6 col-md-6 col-lg-4 col-xl-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input campos_checkbox"
                                                            type="checkbox" id="dot-{!! $dotacion->id !!}"
                                                            value="{!! $dotacion->id !!}"
                                                            name="detalle_dotacion_comunal">
                                                        <label for="dot-{!! $dotacion->id !!}"
                                                            value="{!! $dotacion->id !!}"
                                                            class="custom-control-label">{!!
                                                            $dotacion->nombre
                                                            !!}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Inicio Observaciones-->
                            <div class="card">
                                <div class="card-body">
                                    <h5>Observaciones</h5>
                                    <div class="form-group">
                                        <textarea id="observaciones" name="observaciones" class="form-control" rows="5"
                                            placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin dotacion comunal - Amenidades-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btn_enviar_iforme" type="button">Guardar</button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Fin Modal informe --}}
@endsection
@section('scripts')
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/area_visita_index.js') }}"></script>
<script src="{{ asset('js/js_blade/geolocalizacion.js') }}"></script>

@endsection