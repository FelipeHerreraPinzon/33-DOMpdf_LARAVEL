@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div id="mi_mapa" style="width: 100%; height: 500px;"></div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Formatos de Visita Inmueble Valorar</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button data-option="create" data-tooltip="tooltip" title="Crear Visita" data-toggle="modal" data-target="#modalAdmin" class="btn btn-info clear">
                            <i class="fas fa-file-medical"></i>
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Consecutivo</th>
                                        <th>Visita por</th>
                                        <th>Fecha visita</th>
                                        <th>Montaje</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Novedades</th>
                                        <th>Banco</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inmuebles as $inmueble)
                                    <tr>
                                        <td>{{ $inmueble->avaluo_codigo }}</td>
                                        <td>{{ $inmueble->visitador_nombre }}</td>
                                        <td>{{ $inmueble->fecha_visita }}</td>
                                        <td>{{ $inmueble->montaje }}</td>
                                        <td>{{ $inmueble->direccion }}</td>
                                        <td>{{ $inmueble->visitador_nombre }}</td>
                                        <td>{{ $inmueble->novedades }}</td>
                                        <td>{{ $inmueble->cliente_nombres }} {{ $inmueble->cliente_apellidos }}</td>
                                        <td>
                                            <button data-template="{!! $inmueble->inmueble_id !!}" data-option="update" data-tooltip="tooltip" title="Editar visita" data-toggle="modal" data-target="#modalAdmin" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button data-template="{!! $inmueble->inmueble_id !!}" class="btn btn-danger btn_delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <a href="{{ url('admin.radicados.show', $inmueble->inmueble_id) }}" class="btn btn-secondary"> <i class="fas fa-folder-open"></i></a>
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
</div>

{{-- Inicio Modal Editar --}}
<div class="modal fade" id="modalAdmin" aria-hidden="true" aria-labelledby="modal-title" role="dialog" tabindex="-2">
    <div class="modal-dialog modal-xl modal-center">
        <div class="modal-content">
            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title"></h5>
                <input type="hidden" class="campos" id="option_select">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="hidden" class="campos" id="option_select">
                <input type="hidden" class="campos" id="id_inmueble">
                <input type="hidden" class="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-body">

                <form id="form_inmueble">
                    <!-- Inicio informacion basica-->
                    <div class="card">
                        <div class="card-body">
                            <h5>Información Básica</h5>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="visitador_nombre">Visitador</label>
                                        <input type="text" class="form-control campos" id="visitador_nombre" name="visitador_nombre" placeholder="Nombre visitador">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="montaje">Montaje</label>
                                        <input type="text" class="form-control campos" id="montaje" name="montaje" placeholder="Montaje">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha_visita">Fecha visita</label>
                                        <input type="datetime-local" class="form-control campos" id="fecha_visita" name="fecha_visita">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control campos" id="direccion" name="direccion" placeholder="Dirección inmueble">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="barrio">Barrio</label>
                                        <input type="text" class="form-control campos" id="barrio" name="barrio" placeholder="Barrio">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="atentidoPor">Atentido por</label>
                                        <input type="text" class="form-control campos" id="atendido_por" name="atendido_por" placeholder="Atendido por">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" class="form-control campos" id="telefono" name="telefono" placeholder="Telefono">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="banco">Banco</label>
                                        <input type="text" class="form-control campos" id="banco" name="banco" placeholder="Banco">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nomConjunto">Nombre conjunto</label>
                                        <input type="text" class="form-control campos" id="nombre_conjunto" name="nombre_conjunto" placeholder="Nombre conjunto">
                                    </div>

                                    <!--- para el mapa -->
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            sdfsasf
                                            <div id="mi_mapa" style="margin:0 auto; width: 100%; height: 250px;"></div>
                                        </div>
                                    </div>
                                    <!-- fin mapa -->


                                    <div class="form-group col-md-12">
                                        <label for="nomConjunto">Documentos suministrados</label>
                                        <div class="row">
                                            @foreach ($documentos as $documento)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input campos" type="checkbox" id="doc-{!! $documento->id !!}" name="detalle_documentos_suministrados" value="{!! $documento->id !!}">
                                                        <label for="doc-{!! $documento->id !!}" class="custom-control-label">{!! $documento->nombre
                                                            !!}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin informacion basica-->

                    <!-- Inicio Servicios Publicos-->
                    <div class="card">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">SERVICIOS PÚBLICOS</th>
                                                    @foreach ($servicios_sector_predio as $servicio)
                                                    <th scope="col">{{ $servicio->nombre }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>SECTOR</td>
                                                    @foreach ($servicios_sector_predio as $servicio)
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="sector-{!! $servicio->id !!}" name="detalle_servicios_sector" value="{!! $servicio->id !!}">
                                                            <label for="sector-{!! $servicio->id !!}" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>PREDIO</td>
                                                    @foreach ($servicios_sector_predio as $servicio)
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="predio-{!! $servicio->id !!}" name="detalle_servicios_predio" value="{!! $servicio->id !!}">
                                                            <label for="predio-{!! $servicio->id !!}" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>CONTADOR</td>
                                                    @foreach ($servicios_contador as $servicio)
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" id="contador-{!! $servicio->id !!}" name="detalle_servicios_contador" value="{!! $servicio->id !!}">
                                                            <label for="contador-{!! $servicio->id !!}" class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="estrato">Estrato</label>
                                                <input type="number" class="form-control" id="estrato" name="estrato" placeholder="Numero">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="topografias">Topografia</label>
                                                <select class="custom-select" data-mdb-filter="true" id="detalle_topografia" name="detalle_topografia">
                                                    <option value="" selected disabled>Seleccione una topografia
                                                    </option>
                                                    @foreach ($topografias as $topogafia)
                                                    <option value="{{ $topogafia->id }}">{{ $topogafia->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="numero_pisos">Numero pisos</label>
                                                <input type="number" class="form-control" id="numero_pisos" name="numero_pisos" placeholder="numero_pisos">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="numero_sotanos">Numero sotanos</label>
                                                <input type="number" class="form-control" id="numero_sotanos" name="numero_sotanos" placeholder="Numero">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="detalle_tipo_inmueble">Tipo inmueble</label>
                                                <select class="custom-select" data-mdb-filter="true" id="detalle_tipo_inmueble" name="detalle_tipo_inmueble">
                                                    <option value="" selected disabled>Seleccione un tipo de inmueble
                                                    </option>
                                                    @foreach ($tipo_inmuebles as $tipo_inmueble)
                                                    <option value="{{ $tipo_inmueble->id }}">
                                                        {{ $tipo_inmueble->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="detalle_uso_actual">Uso</label>
                                                <select class="custom-select" data-mdb-filter="true" id="detalle_uso_actual" name="detalle_uso_actual">
                                                    <option value="" selected disabled>Seleccione el uso del inmueble
                                                    </option>
                                                    @foreach ($usos as $uso)
                                                    <option value="{{ $uso->id }}">{{ $uso->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="detalle_estado_construccion">Estado de la
                                                    consctrucción</label>
                                                <select class="custom-select" data-mdb-filter="true" id="detalle_estado_construccion" name="detalle_estado_construccion">
                                                    <option value="" selected disabled>Seleccione un estado de
                                                        construccion</option>
                                                    @foreach ($estados as $estado)
                                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="text" class="form-control form-control-sm" id="dependencia_id" name="dependencia_id">
                                    <div class="row">
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
                                                    <td>SALA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="salas" name="salas">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="salas_area" name="salas_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="salas_detalle" name="salas_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>COMEDOR</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="comedores" name="comedores">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="comedores_area" name="comedores_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="comedores_detalle" name="comedores_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>ESTUDIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="estudios" name="estudios">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="estudios_area" name="estudios_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="estudios_detalle" name="estudios_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>BAÑO SOCIAL</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_sociales" name="banos_sociales">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_sociales_area" name="banos_sociales_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="banos_sociales_detalle" name="banos_sociales_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>ESTAR DE HABITACION</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="star_habitaciones" name="star_habitaciones">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="star_habitaciones_area" name="star_habitaciones_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="star_habitaciones_detalle" name="star_habitaciones_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>HABITACIONES</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="habitaciones" name="habitaciones">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="habitaciones_area" name="habitaciones_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="habitaciones_detalle" name="habitaciones_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>BRAÑO PRIVADO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_privados" name="banos_privados">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_privados_area" name="banos_privados_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="banos_privados_detalle" name="banos_privados_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>COCINA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="cocinas" name="cocinas">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="cocinas_area" name="cocinas_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="cocinas_detalle" name="cocinas_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>CUARTO DE SERVICIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="cuartos_servicio" name="cuartos_servicio">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="cuartos_servicio_area" name="cuartos_servicio_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="cuartos_servicio_detalle" name="cuartos_servicio_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>BAÑO SERVICIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_servicio" name="banos_servicio">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="banos_servicio_area" name="banos_servicio_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="banos_servicio_detalle" name="banos_servicio_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>PATIO ROPAS</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="patios_ropas" name="patios_ropas">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="patios_ropas_area" name="patios_ropas_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="patios_ropas_detalle" name="patios_ropas_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>TERRAZA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="terrazas" name="terrazas">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="terrazas_area" name="terrazas_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="terrazas_detalle" name="terrazas_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>JARDÍN</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="jardines" name="jardines">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="jardines_area" name="jardines_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="jardines_detalle" name="jardines_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>BALCON</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="balcones" name="balcones">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="balcones_area" name="balcones_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="balcones_detalle" name="balcones_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>ZONA VERDE PRIVADA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="zonas_verdes" name="zonas_verdes">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="zonas_verdes_area" name="zonas_verdes_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="zonas_verdes_detalle" name="zonas_verdes_detalle">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                                                    <td>OTRO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="acabados_otro" name="acabados_otro">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm" id="acabados_otro" name="acabados_otro">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="acabado_otro" name="acabado_otro">
                                                            <option value="" selected disabled>Seleccione un tipo de
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
                    <!-- Fin Acabados-->

                    <!-- Inicio propiedad horizontal-->
                    <div class="card">
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3">Es Propiedad horizontal: </dt>
                                <dd class="col-sm-9">
                                    <button class="btn btn-primary btn-sm" type="button" id="btn_toogle">
                                        No
                                    </button>
                                </dd>
                            </dl>

                            <div class="form-group" id="section_propiedad_horizontal">
                                <input type="number" class="form-control" name="propiedad_horizontal_id" id="propiedad_horizontal_id" hidden>
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="conjunto_cerrado">Conjunto cerrado</label>
                                        <input type="text" class="form-control" id="conjunto_cerrado" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ubicacion_inmueble">Ubicacion inmueble</label>
                                        <input type="text" class="form-control" id="ubicacion_inmueble" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="numero_edificios">Numero Edificios</label>
                                        <input type="text" class="form-control" id="numero_edificios" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="unidades_por_piso">Unidades por piso</label>
                                        <input type="text" class="form-control" id="unidades_por_piso" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="total_unidades">Total unidades</label>
                                        <input type="text" class="form-control" id="total_unidades" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="total_garajes">Total garajes</label>
                                        <input type="text" class="form-control" id="total_garajes" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="total_garajes_comunales">Total garajes comunales</label>
                                        <input type="text" class="form-control" id="total_garajes_comunales" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="garajes_cubiertos">Total garajes cubiertos</label>
                                        <input type="text" class="form-control" id="garajes_cubiertos" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="garajes_descubiertos">Total garajes descubiertos</label>
                                        <input type="text" class="form-control" id="garajes_descubiertos" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="total_garajes_servidumbre_comunales">Total garajes
                                            servidumbre</label>
                                        <input type="text" class="form-control" id="total_garajes_servidumbre_comunales" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="garaje_sencillo">Total garajes sencillo</label>
                                        <input type="text" class="form-control" id="garaje_sencillo" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="garaje_doble">Total garajes doble</label>
                                        <input type="text" class="form-control" id="garaje_doble" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="total_depositos">Total depositos</label>
                                        <input type="text" class="form-control" id="total_depositos" placeholder="Numero">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin propiedad Horizontal-->

                    <!-- Inicio Amenidades-->
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nomConjunto">Dotacion Comunal</label>
                                    <div class="row">
                                        @foreach ($dotacion_comunal as $dotacion)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="dot-{!! $dotacion->id !!}" value="{!! $dotacion->id !!}" name="detalle_dotacion_comunal">
                                                    <label for="dot-{!! $dotacion->id !!}" value="{!! $dotacion->id !!}" class="custom-control-label">{!! $dotacion->nombre !!}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Amenidades-->

                    <!-- Inicio Observaciones-->
                    <div class="card">
                        <div class="card-body">
                            <h5>Observaciones</h5>
                            <div class="form-group">
                                <textarea id="observaciones" name="observaciones" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Inicio propiedad horizontal-->
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="btn_send" type="button">Guardar</button>
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- Fin Modal Editar --}}
@endsection
@section('scripts')
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/inmuebles_index.js') }}"></script>
@endsection