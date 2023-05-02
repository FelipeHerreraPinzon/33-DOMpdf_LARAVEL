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
                        <h5>Avaluo comercial</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Avaluo</th>
                                        <th>Solicitante</th>
                                        <th>Fecha asignado</th>
                                        <th>Tio inmueble</th>
                                        <th>direccion</th>
                                        <th>Municipio</th>
                                        <th>Departamento</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avaluos as $avaluo)
                                    <tr>
                                        <td>{{$avaluo->codigo}}</td>
                                        <td>{{$avaluo->asigna_visitador}}</td>
                                        <td>{{$avaluo->fecha_visita}}</td>
                                        <td>{{$avaluo->novedades}}</td>
                                        <td>{{$avaluo->entrega_visitador}}</td>
                                        <td>{{$avaluo->estado_nombre }}</td>
                                        <td>{{$avaluo->estado_nombre }}</td>
                                        <td>{{$avaluo->estado_nombre }}</td>
                                        <td>
                                            <button data-template="{!!$avaluo->id!!}" data-option="Informe"
                                                data-tooltip="tooltip" title="Informe de Visita" data-toggle="modal"
                                                data-target="#modalInforme" class="btn btn-success clear">
                                                <i class=" fas fa-file-alt"></i>
                                            </button>
                                            <a href="{{ 'avaluoComercial/pdf'}}" class="btn btn-danger">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
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

{{-- Inicio Modal informe --}}
<div class="modal fade" id="modalInforme" aria-hidden="true" aria-labelledby="modal-title" role="dialog" tabindex="-2">
    <div class="modal-dialog modal-xl modal-center">
        <div class="modal-content">

            <div class="modal-header p-3 bg-primary bg-gradient fw-bold text-white">
                <h5 id="modal-title">Información avaluo: id_avaluo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="text" class="_token" value="{{ csrf_token() }}" hidden>
            </div>
            <div class="modal-body">
                <!-- Inicio informacion General-->
                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-6 col-md-4 col-lg-3 col-xl-3">
                            <label for="solicitante">Solicitante</label>
                            <input type="text" class="form-control campos" id="solicitante"
                                name="solicitante" placeholder="Solicitante" disabled>
                        </div>
                        <div class="form-group col-6 col-md-4 col-lg-3 col-xl-3">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control campos" id="direccion" name="direccion"
                                placeholder="Direccion" disabled>
                        </div>
                        <div class="form-group col-6 col-md-4 col-lg-3 col-xl-3">
                            <label for="municipio">Municipio</label>
                            <input type="text" class="form-control campos" id="municipio"
                                name="municipio" placeholder="Municipio" disabled>
                        </div>
                        <div class="form-group col-6 col-md-4 col-lg-3 col-xl-3">
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control campos" id="departamento" name="departamento"
                                placeholder="Departamento" disabled>
                        </div>
                        <div class="form-group col-6 col-md-4 col-lg-3 col-xl-3">
                            <label for="tipo_inmueble">Tipo inmueble</label>
                            <input type="text" class="form-control campos" id="tipo_inmueble"
                                name="tipo_inmueble" placeholder="Tipo inmueble" disabled>
                        </div>
                    </div>
                </div>
                <!-- Fin-->

                <div class="d-flex align-items-start">
                    <!--Inicio TABS -->
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-basica-tab" data-toggle="pill" href="#v-pills-basica"
                            role="tab" aria-controls="v-pills-basica" aria-selected="true">Básica</a>
                        <a class="nav-link" id="v-pills-barrio-tab" data-toggle="pill" href="#v-pills-barrio" role="tab"
                            aria-controls="v-pills-barrio" aria-selected="false">Barrio</a>
                        <a class="nav-link" id="v-pills-juridica-tab" data-toggle="pill" href="#v-pills-juridica"
                            role="tab" aria-controls="v-pills-juridica" aria-selected="false">Jurídica</a>
                        <a class="nav-link" id="v-pills-inmueble-tab" data-toggle="pill" href="#v-pills-inmueble"
                            role="tab" aria-controls="v-pills-inmueble" aria-selected="false">Inmueble</a>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Inicio informacion basica-->
                        <div class="tab-pane fade show active" id="v-pills-basica" role="tabpanel"
                            aria-labelledby="v-pills-basica-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="solicitante">Nombre solicitante</label>
                                                <input type="text" class="form-control campos" id="solicitante"
                                                    name="solicitante" placeholder="solicitante" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="solicitante_documento">Identificación</label>
                                                <input type="text" class="form-control campos"
                                                    id="solicitante_documento" name="solicitante_documento"
                                                    placeholder="solicitante_documento" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="fecha_avaluo">Fecha avaluo</label>
                                                <input type="text" class="form-control campos" id="fecha_avaluo"
                                                    name="fecha_avaluo" placeholder="Fecha avaluo" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="fecha_creacion">Fecha corrección</label>
                                                <input type="text" class="form-control campos" id="fecha_creacion"
                                                    name="fecha_creacion" placeholder="fecha_creacion" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="sector">Sector</label>
                                                <input type="text" class="form-control campos" id="sector" name="sector"
                                                    placeholder="Sector" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="departamento">Departamento</label>
                                                <input type="text" class="form-control campos" id="departamento"
                                                    name="departamento" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="ciudad">Ciudad</label>
                                                <input type="text" class="form-control campos" id="ciudad" name="ciudad"
                                                    placeholder="Ciudad" disabled>
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="codigo_dane">Código dane</label>
                                                <input type="text" class="form-control campos" id="codigo_dane"
                                                    name="codigo_dane" placeholder="codigo_dane">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="direccion">Dirección inmueble</label>
                                                <input type="text" class="form-control campos" id="direccion"
                                                    name="direccion" placeholder="direccion">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="nombre_conjunto">Conjunto / Edificio</label>
                                                <input type="text" class="form-control campos" id="nombre_conjunto"
                                                    name="nombre_conjunto" placeholder="Nombre conjunto">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="uso">Uso</label>
                                                <input type="text" class="form-control campos" id="uso" name="uso"
                                                    placeholder="Uso">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="barrio">Barrio</label>
                                                <input type="text" class="form-control campos" id="barrio" name="barrio"
                                                    placeholder="Barrio">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="tipo_avaluo">Tipo avaluo</label>
                                                <input type="text" class="form-control campos" id="tipo_avaluo"
                                                    name="tipo_avaluo" placeholder="Tipo avaluo">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="metodologia_valuatoria">Metodologia valuatoria</label>
                                                <input type="text" class="form-control campos"
                                                    id="metodologia_valuatoria" name="metodologia_valuatoria"
                                                    placeholder="metodologia_valuatoria">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="objeto_avaluo">Objeto avaluo</label>
                                                <input type="text" class="form-control campos" id="objeto_avaluo"
                                                    name="objeto_avaluo" placeholder="Objeto avaluo">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="sistema_coordenadas">Sistema coordenadas</label>
                                                <input type="text" class="form-control campos" id="sistema_coordenadas"
                                                    name="sistema_coordenadas" placeholder="Sistema coordenadas">
                                            </div>
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
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="justificacion_metodologia">Justificacion metodologia</label>
                                                <input type="text" class="form-control campos"
                                                    id="justificacion_metodologia" name="justificacion_metodologia"
                                                    placeholder="Justificacion metodologia">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin informacion basica-->
                        <!-- Inicio BARRIO-->
                        <div class="tab-pane fade" id="v-pills-barrio" role="tabpanel"
                            aria-labelledby="v-pills-barrio-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Estrato</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Estrato">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="legalidad">Legalidad</label>
                                                <input type="text" class="form-control" id="legalidad" name="legalidad"
                                                    placeholder="Legalidad">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="topografia">Topografia</label>
                                                <input type="text" class="form-control" id="topografia" name="topografia"
                                                    placeholder="Topografia">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="transporte">Transporte</label>
                                                <input type="text" class="form-control" id="transporte" name="transporte"
                                                    placeholder="Transporte">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="uso_predominante">Uso predominante del barrio</label>
                                                <input type="text" class="form-control" id="uso_predominante" name="uso_predominante"
                                                    placeholder="Uso predominante del barrio">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>SERVICIOS PUBLICOS SECTOR</label>
                                                <div class="row">
                                                    @foreach ($servicios_sector_predio as $servicio)
                                                    <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input campos_checkbox"
                                                                type="checkbox" id="sector-{!!$servicio->id!!}"
                                                                name="detalle_servicios_sector"
                                                                value="{!!$servicio->id!!}">
                                                            <label for="sector-{!!$servicio->id!!}"
                                                                class="custom-control-label">{!!$servicio->nombre!!}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>SERVICIOS PUBLICOS PREDIO</label>
                                                <div class="row">
                                                    @foreach ($servicios_sector_predio as $servicio)
                                                    <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input campos_checkbox"
                                                                type="checkbox" id="predio-{!!$servicio->id!!}"
                                                                name="detalle_servicios_predio"
                                                                value="{!!$servicio->id!!}">
                                                            <label for="predio-{!!$servicio->id!!}"
                                                                class="custom-control-label">{!!$servicio->nombre!!}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>SERVICIOS PUBLICOS CONTADOR</label>
                                                <div class="row">
                                                    @foreach ($servicios_contador as $servicio)
                                                    <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input campos_checkbox"
                                                                type="checkbox" id="contador-{!!$servicio->id!!}"
                                                                name="detalle_servicios_contador"
                                                                value="{!!$servicio->id!!}">
                                                            <label for="contador-{!!$servicio->id!!}"
                                                                class="custom-control-label">{!!$servicio->nombre!!}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label> VIAS DE ACCESO</label>
                                                <div class="form-row">
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="estado">Estado</label>
                                                        <input type="text" class="form-control" id="estado"
                                                            name="estado" placeholder="Estado">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="pavimentada">Pavimentada</label>
                                                        <input type="text" class="form-control" id="pavimentada"
                                                            name="pavimentada" placeholder="Pavimentada">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="andenes">Andenes</label>
                                                        <input type="text" class="form-control" id="andenes"
                                                            name="andenes" placeholder="Andenes">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="sardineles">Sardineles</label>
                                                        <input type="text" class="form-control" id="sardineles"
                                                            name="sardineles" placeholder="Sardineles">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> AMOBLAMIENTO URBANO</label>
                                                <div class="form-row">
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="parques">Parques</label>
                                                        <input type="text" class="form-control" id="parques"
                                                            name="parques" placeholder="Parques">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="paradero">Paradero</label>
                                                        <input type="text" class="form-control" id="paradero"
                                                            name="paradero" placeholder="Paradero">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="alumbrado">Alumbrado</label>
                                                        <input type="text" class="form-control" id="alumbrado"
                                                            name="alumbrado" placeholder="Alumbrado">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="arborizacion">Arborización</label>
                                                        <input type="text" class="form-control" id="arborizacion"
                                                            name="arborizacion" placeholder="Arborizacion">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="ciclo_rutas">Ciclo rutas</label>
                                                        <input type="text" class="form-control" id="ciclo_rutas"
                                                            name="ciclo_rutas" placeholder="Ciclo rutas">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="alamedas">Alamedas</label>
                                                        <input type="text" class="form-control" id="alamedas"
                                                            name="alamedas" placeholder="Alamedas">
                                                    </div>
                                                    <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                        <label for="zonas_verdes">Z. Verdes</label>
                                                        <input type="text" class="form-control" id="zonas_verdes"
                                                            name="zonas_verdes" placeholder="Zonas verdes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12">
                                                <label for="perspectivas_valorizacion">Perspectivas de valorizacion</label>
                                                <textarea type="text" class="form-control" id="perspectivas_valorizacion" name="perspectivas_valorizacion"
                                                    placeholder="Perspectivas de valorizacion"> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin BARRIO-->
                        <!-- Inicio JURIDICO-->
                        <div class="tab-pane fade" id="v-pills-juridica" role="tabpanel"
                            aria-labelledby="v-pills-juridica-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="tipo_inmueble">Tipo inmueble</label>
                                                <input type="text" class="form-control" id="tipo_inmueble" name="tipo_inmueble"
                                                    placeholder="Tipo inmueble">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="ubicacion">Ubicación</label>
                                                <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                                                    placeholder="Ubicación">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="ubicacion_inmueble">Ubicación del inmueble</label>
                                                <input type="text" class="form-control" id="ubicacion_inmueble" name="ubicacion_inmueble"
                                                    placeholder="Ubicacion del inmueble">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="propietario">Propietario</label>
                                                <input type="text" class="form-control" id="propietario" name="propietario"
                                                    placeholder="Propietario">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="uso">Uso</label>
                                                <input type="text" class="form-control" id="uso" name="uso"
                                                    placeholder="Uso">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="clase">Clase</label>
                                                <input type="text" class="form-control" id="clase" name="clase"
                                                    placeholder="Clase">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="m_inmob_pal_1">M. INMOB. PPAL 1</label>
                                                <input type="text" class="form-control" id="m_inmob_pal_1" name="m_inmob_pal_1"
                                                    placeholder="M. INMOB. PPAL 1">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="m_inmob_pal_2">M. INMOB. PPAL 2</label>
                                                <input type="text" class="form-control" id="m_inmob_pal_2" name="m_inmob_pal_2"
                                                    placeholder="M. INMOB. PPAL 2">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="m_inmob_pal_3">M. INMOB. PPAL 3</label>
                                                <input type="text" class="form-control" id="m_inmob_pal_3" name="m_inmob_pal_3"
                                                    placeholder="M. INMOB. PPAL 3">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="m_inmob_gj_1">M. INMOB. GJ 1</label>
                                                <input type="text" class="form-control" id="m_inmob_gj_1" name="m_inmob_gj_1"
                                                    placeholder="M. INMOB. GJ 1">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">M. INMOB. GJ 2</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">M. INMOB. GJ 3</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">M. INMOB. DP 1</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">M. INMOB. DP 2</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">M. INMOB. DP 3</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Número escritura</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Num notaria</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Ciudad notaria</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">CHIP/CED. CASTAS</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Expedicion escritura</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3">
                                                <label for="estrato">Licencia de construcción</label>
                                                <input type="text" class="form-control" id="estrato" name="estrato"
                                                    placeholder="Numero">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- Fin JURIDICO-->
                        <!-- Inicio INMUEBLE-->
                        <div class="tab-pane fade" id="v-pills-inmueble" role="tabpanel"
                            aria-labelledby="v-pills-inmueble-tab">
                            <div class="card">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link prueba active" id="informacion-tab" data-toggle="tab"
                                            data-target="#informacion" type="button" role="tab"
                                            aria-controls="informacion" aria-selected="true">Información</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="estado-construccion-tab" data-toggle="tab"
                                            data-target="#estado-construccion" type="button" role="tab"
                                            aria-controls="estado-construccion"
                                            aria-selected="false">Construcción</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="dependencias-tab" data-toggle="tab"
                                            data-target="#dependencias" type="button" role="tab"
                                            aria-controls="dependencias" aria-selected="false">Dependencias</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="estado-acabados-tab" data-toggle="tab"
                                            data-target="#estado-acabados" type="button" role="tab"
                                            aria-controls="estado-acabados" aria-selected="false">Acabados</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="calidad-acabados-tab" data-toggle="tab"
                                            data-target="#calidad-acabados" type="button" role="tab"
                                            aria-controls="calidad-acabados" aria-selected="false">Calidad
                                            acabados</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="propiedad-horizontal-tab" data-toggle="tab"
                                            data-target="#propiedad-horizontal" type="button" role="tab"
                                            aria-controls="propiedad-horizontal" aria-selected="false">Prop
                                            horizontal</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="dotacion-comunal-tab" data-toggle="tab"
                                            data-target="#dotacion-comunal" type="button" role="tab"
                                            aria-controls="dotacion-comunal" aria-selected="false">Dot
                                            comunal</button>
                                    </li>
                                </ul>
                                <div class="card-body">

                                    <!-- Inicio Segundo tap-->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="informacion" role="tabpanel"
                                            aria-labelledby="informacion-tab">
                                            <div class="form-row">
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Año construcción</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Vetustez</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Vida util</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Vida remanente</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Estado construccion</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Num pisos</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Num sotanos</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Estado conservación</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="estado-construccion" role="tabpanel"
                                            aria-labelledby="estado-construccion-tab">
                                            <div class="form-row">
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Estado construcción</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Irregularidad planta</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Irregularidad altura</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Daños previos</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Reparados</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Estructura</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Fachada</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                                <div class="form-group col-12 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="estrato">Cubierta</label>
                                                    <input type="text" class="form-control" id="estrato" name="estrato"
                                                        placeholder="Numero">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="dependencias" role="tabpanel"
                                            aria-labelledby="dependencias-tab">
                                            <div class="form-group col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Baño social</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Baño privado</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Baño servicio</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Sala</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Cocina</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Cuarto servicio</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Comedor</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Habitaciones</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Jardin</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Star habitacion</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Estudio</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Terraza</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Balcon</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Patio interior</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Z. verde privada</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Total garajes</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Cubiertos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Descubiertos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Deposito</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Privado</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Uso exclusivo</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Sencillo</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Local</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Doble</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Bahía comunal</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Oficina</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Iluminación</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Ventilación</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Obs dependencias</label>
                                                        <textarea type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="estado-acabados" role="tabpanel"
                                            aria-labelledby="estado-acabados-tab">
                                            <div class="form-group col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Pisos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Muros</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Techos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">C. metal</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">C. madera</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Baños</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Cocina</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="calidad-acabados" role="tabpanel"
                                            aria-labelledby="calidad-acabados-tab">
                                            <div class="form-group col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Pisos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Muros</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Techos</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">C. metal</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">C. madera</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Baños</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-2">
                                                        <label for="estrato">Cocina</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="propiedad-horizontal" role="tabpanel"
                                            aria-labelledby="propiedad-horizontal-tab">
                                            <div class="form-group col-md-12">
                                                <div class="form-row">
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Sometido a propiedad
                                                            horizontal</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Con. o agrup cerrada</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Num edificios/casas</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Unidades por piso</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-4 col-xl-4">
                                                        <label for="estrato">Total unidades</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="dotacion-comunal" role="tabpanel"
                                            aria-labelledby="dotacion-comunal-tab">
                                            <div class="form-group col-md-12">
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
                                                                class="custom-control-label">{!!$dotacion->nombre!!}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label for="estrato">Actualidad edificadora</label>
                                                        <textarea type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero"></textarea>
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label for="estrato">Comportamiento oferta y
                                                            demanda</label>
                                                        <textarea type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero"></textarea>
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label for="estrato">Tiempo esperado comercializacion
                                                            (meses)</label>
                                                        <input type="text" class="form-control" id="estrato"
                                                            name="estrato" placeholder="Numero">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin propiedad Horizontal-->
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="btn_enviar_iforme" type="button">Guardar</button>
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- Fin Modal informe --}}
@endsection
@section('scripts')
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/avaluo_comercial_index.js') }}"></script>
@endsection