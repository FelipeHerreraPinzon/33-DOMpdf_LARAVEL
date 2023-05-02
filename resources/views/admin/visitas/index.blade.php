@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formatos de Visita Valorar</h1>
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
                            <button data-option="create" data-tooltip="tooltip" title="Crear Visita" data-toggle="modal"
                                data-target="#modalAdmin" class="btn btn-info clear">
                                <i class="fas fa-file-medical"></i>
                            </button>

                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Consecutivo</th>
                                        <th>Visita por</th>
                                        <th>Montaje</th>
                                        <th>Fecha y Hora</th>
                                        <th>Info visita</th>
                                        <!-- TODO: Concatenado con el abarrio la direccion y el nombre del conjunto-->
                                        <th>Atendida por</th>
                                        <th>Telefono</th>
                                        <th>Banco</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($radicados as $radicado)
                                        <tr>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>
                                                <button data-template="{!! $radicado->id !!}" data-option="update"
                                                    data-tooltip="tooltip" title="Editar visita" data-toggle="modal"
                                                    data-target="#modalAdmin" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button data-template="{!! $radicado->id !!}"
                                                    class="btn btn-danger btn_delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <a href="{{ route('admin.radicados.show', $radicado->id) }}"
                                                    class="btn btn-secondary"> <i class="fas fa-folder-open"></i></a>
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

    {{-- Fin Modal Editar --}}
    <div class="modal fade" id="modalAdmin" aria-hidden="true" aria-labelledby="modal-title" role="dialog" tabindex="-2">
        <div class="modal-dialog modal-xl modal-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal-title"></h5>
                    <input type="hidden" class="campos" id="option_select">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" class="campos" id="option_select">
                    <input type="hidden" class="campos" id="id">
                    <input type="hidden" class="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body">

                    <!-- Inicio informacion basica-->
                    <div class="card">
                        <div class="card-body">
                            <h5>Información Básica</h5>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="numradicado">Visita por</label>
                                        <input type="text" class="form-control" id="numradicado" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="numradicado">Montaje</label>
                                        <input type="text" class="form-control" id="numradicado" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha">Fecha visita</label>
                                        <input type="date" class="form-control" id="fecha" placeholder="Fecha">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="hora">Hora visita</label>
                                        <input type="time" class="form-control" id="hora" placeholder="Hora">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="barrio">Barrio</label>
                                        <input type="text" class="form-control" id="barrio" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="atentidoPor">Atentido por</label>
                                        <input type="text" class="form-control" id="atentidoPor"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="banco">Banco</label>
                                        <input type="text" class="form-control" id="banco" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nomConjunto">Nombre conjunto</label>
                                        <input type="text" class="form-control" id="nomConjunto"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nomConjunto">Documentos suministrados</label>
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="ep" value="option1">
                                                        <label for="ep" class="custom-control-label">EP</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="ctl_ppal">
                                                        <label for="ctl_ppal" class="custom-control-label">CTL
                                                            PPAL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="lic" value="option1">
                                                        <label for="lic" class="custom-control-label">LIC</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="ctl_gj">
                                                        <label for="ctl_gj" class="custom-control-label">CTL
                                                            GJ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="ctl_dp" value="option1">
                                                        <label for="ctl_dp" class="custom-control-label">CTL
                                                            DP</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="planos">
                                                        <label for="planos" class="custom-control-label">PLANOS</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="rph" value="option1">
                                                        <label for="rph" class="custom-control-label">R.P.H</label>
                                                    </div>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="doc_sumin_otro">OTRO</span>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            aria-label="Sizing example input"
                                                            aria-describedby="doc_sumin_otro">
                                                    </div>
                                                </div>
                                            </div>

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
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="nomConjunto">SERVICIOS PÚBLICOS</label>
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">SEC</th>
                                                    <th scope="col">PRED</th>
                                                    <th scope="col">CONT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ACUEDUCTO</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="acueducto_sec">
                                                            <label for="acueducto_sec"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="acueducto_pred">
                                                            <label for="acueducto_pred"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="acueducto_cont">
                                                            <label for="acueducto_cont"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ALCANTARILLADO</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="alcantarillado_sec">
                                                            <label for="alcantarillado_sec"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="alcantarillado_pred">
                                                            <label for="alcantarillado_pred"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="alcantarillado_cont">
                                                            <label for="alcantarillado_cont"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ENERGIA ELÉCTRICA</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="energia_electrica_sec">
                                                            <label for="energia_electrica_sec"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="energia_electrica_pred">
                                                            <label for="energia_electrica_pred"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="energia_electrica_cont">
                                                            <label for="energia_electrica_cont"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>GAS NATURAL</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="gas_natural_sec">
                                                            <label for="gas_natural_sec"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="gas_natural_pred">
                                                            <label for="gas_natural_pred"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="gas_natural_cont">
                                                            <label for="gas_natural_cont"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TELEFONIA</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="telefonia_sec">
                                                            <label for="telefonia_sec"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox"
                                                                id="telefonia_pred">
                                                            <label for="telefonia_pred"
                                                                class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="estrato">Estrato</label>
                                                <input type="text" class="form-control" id="estrato"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="topografia">Topografia</label>
                                                <input type="text" class="form-control" id="topografia"
                                                    placeholder="Numero">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="numPisos">Numero pisos</label>
                                                <input type="text" class="form-control" id="numPisos"
                                                    placeholder="numPisos">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="numSotanos">Numero sotanos</label>
                                                <input type="text" class="form-control" id="numSotanos"
                                                    placeholder="Numero">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="nomConjunto">Tipo de inmueble:</label>
                                                <div class="form-row">

                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="tipo_inmueble_cs">
                                                                <label for="tipo_inmueble_cs"
                                                                    class="custom-control-label">CS</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="tipo_inmueble_ap">
                                                                <label for="tipo_inmueble_ap"
                                                                    class="custom-control-label">AP</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="tipo_inmueble_bd">
                                                                <label for="tipo_inmueble_bd"
                                                                    class="custom-control-label">BD</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="tipo_inmueble_lc">
                                                                <label for="tipo_inmueble_lc"
                                                                    class="custom-control-label">LC</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="tipo_inmueble_lt">
                                                                <label for="tipo_inmueble_lt"
                                                                    class="custom-control-label">LT</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="input-group input-group-sm mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="inputGroup-sizing-sm">OTRO</span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    id="tipo_inmueble_otro"
                                                                    aria-label="Sizing example input"
                                                                    aria-describedby="inputGroup-sizing-sm">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="nomConjunto">Uso:</label>
                                                <div class="form-row">

                                                    <div class="col-md-2">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="uso_viv">
                                                                <label for="uso_viv"
                                                                    class="custom-control-label">VIV</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="uso_com">
                                                                <label for="uso_com"
                                                                    class="custom-control-label">COM</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="uso_of">
                                                                <label for="uso_of"
                                                                    class="custom-control-label">OF</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="input-group input-group-sm mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="inputGroup-sizing-sm">OTRO</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="uso_otro"
                                                                    aria-label="Sizing example input"
                                                                    aria-describedby="inputGroup-sizing-sm">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="form-row">

                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_nuevo">
                                                                <label for="sp_nuevo"
                                                                    class="custom-control-label">NUEVO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_terminado">
                                                                <label for="sp_terminado"
                                                                    class="custom-control-label">TERMINADO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_usado">
                                                                <label for="sp_usado"
                                                                    class="custom-control-label">USADO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_sin_terminar">
                                                                <label for="sp_sin_terminar"
                                                                    class="custom-control-label">SIN TERMINAR</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_obra">
                                                                <label for="sp_obra"
                                                                    class="custom-control-label">OBRA</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_avance">
                                                                <label for="sp_avance"
                                                                    class="custom-control-label">AVANCE</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                id="sp_avance_porcentaje" placeholder="%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_terminado">
                                                                <label for="sp_terminado"
                                                                    class="custom-control-label">TERMINADO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="sp_remodelado">
                                                                <label for="sp_remodelado"
                                                                    class="custom-control-label">REMODELADO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">DEPENDENCIA</th>
                                                    <th scope="col">NUMERO</th>
                                                    <th scope="col">ÁREA</th>
                                                    <th scope="col">TIPO ACABADOS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>SALA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="sala_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="sala_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>COMEDOR</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="comedor_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="comedor_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESTUDIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="estudio_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="estudio_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BAÑO SOCIAL</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_social_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_social_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ESTAR DE HABITACION</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="habitacion_estar_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="habitacion_estar_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HABITACIONES</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="habitaciones_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="habitaciones_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BRAÑO PRIVADO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_privado_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_privado_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>COCINA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="cocina_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="cocina_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>CUARTO DE SERVICIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="cuarto_servicio_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="cuarto_servicio_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BAÑO SERVICIO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_servicio_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="bano_servicio_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>PATIO ROPAS</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="patio_ropas_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="patio_ropas_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TERRAZA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="terraza_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="terraza_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>JARDÍN</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="jardin_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="jardin_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BALCON</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="balcon_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="balcon_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ZONA VERDE PRIVADA</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="zona_verde_numero">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="zona_verde_area">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>OTRO</td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="acabados_otro">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="acabados_otro">
                                                    </td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Selecciona una opción</option>
                                                            <option>De Lujo</option>
                                                            <option>De Primera</option>
                                                            <option>Normal</option>
                                                            <option>Economico</option>
                                                            <option>Bajos</option>
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
                            <h5>Propiedad horizontal</h5>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="somPropHorizon">Som. a pror. horizontal</label>
                                        <input type="text" class="form-control" id="somPropHorizon"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="numEdificios">N Edificios</label>
                                        <input type="text" class="form-control" id="numEdificios"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="totalGjN">Total GJ N</label>
                                        <input type="text" class="form-control" id="totalGjN" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="totalDp">Total DP</label>
                                        <input type="text" class="form-control" id="totalDp" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="totalGjCom">Total GJ Com</label>
                                        <input type="text" class="form-control" id="totalGjCom" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="conjOAgrpCerra">Conj O AGRP. Cerrada</label>
                                        <input type="text" class="form-control" id="conjOAgrpCerra"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="unidPorPiso">Unid Por Piso</label>
                                        <input type="text" class="form-control" id="unidPorPiso"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="descubierto">Descubierto</label>
                                        <input type="text" class="form-control" id="descubierto"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cubierto">Cubierto</label>
                                        <input type="text" class="form-control" id="cubierto" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="sencillo">Sencillo</label>
                                        <input type="text" class="form-control" id="sencillo" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="doble">Doble</label>
                                        <input type="text" class="form-control" id="doble" placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ubiInmueble">Ubicación del Inmueble</label>
                                        <input type="text" class="form-control" id="ubiInmueble"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="totalUnidades">Total Unidades</label>
                                        <input type="text" class="form-control" id="totalUnidades"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="servidumbre">Servidumbre</label>
                                        <input type="text" class="form-control" id="servidumbre"
                                            placeholder="Numero">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="proporcionGjCom">Proporcion GJ Com</label>
                                        <input type="text" class="form-control" id="proporcionGjCom"
                                            placeholder="Numero">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin propiedad Horizontal-->

                    <!-- Inicio Final final-->
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="porteria">
                                            <label for="porteria" class="custom-control-label">PORTERIA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="piscina">
                                            <label for="piscina" class="custom-control-label">PISCINA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="gj_visitan">
                                            <label for="gj_visitan" class="custom-control-label">GJ VISITAN</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="bomba_eyec">
                                            <label for="bomba_eyec" class="custom-control-label">BOMBA EYECT</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="zona_verde">
                                            <label for="zona_verde" class="custom-control-label">ZONAS VERDES</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="salon_comunal">
                                            <label for="salon_comunal" class="custom-control-label">SALÓN
                                                COMUNAL</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="planta_electrica">
                                            <label for="planta_electrica" class="custom-control-label">PLANTA
                                                ELÉCTRICA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="citofono">
                                            <label for="citofono" class="custom-control-label">CITÓFONO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="tanque_agua">
                                            <label for="tanque_agua" class="custom-control-label">TANQUE AGUA</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="juegos_niños">
                                            <label for="juegos_niños" class="custom-control-label">JUEGOS NIÑOS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="aire_acondicionado">
                                            <label for="aire_acondicionado" class="custom-control-label">AIRE
                                                ACONDICIONADO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="gimnasio">
                                            <label for="gimnasio" class="custom-control-label">GIMNASIO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="shut_basuras">
                                            <label for="shut_basuras" class="custom-control-label">SHUT BASURAS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="ascensor">
                                            <label for="ascensor" class="custom-control-label">ASCENSOR</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="asensor_numero"
                                            placeholder="Numero ascensores">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="bicicletero">
                                            <label for="bicicletero" class="custom-control-label">BICICLETERO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="club_house">
                                            <label for="club_house" class="custom-control-label">CLUB HOUSE</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="cancha_multi">
                                            <label for="cancha_multi" class="custom-control-label">CANCHA MULTI</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="cuarto_basuras">
                                            <label for="cuarto_basuras" class="custom-control-label">CUARTO
                                                BASURAS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="cancha_squash">
                                            <label for="cancha_squash" class="custom-control-label">CANCHA
                                                SQUASH</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="golfito">
                                            <label for="golfito" class="custom-control-label">GOLFITO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="presion_constante">
                                            <label for="presion_constante" class="custom-control-label">PRESIÓN
                                                CONSTANTE</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">OTRO</span>
                                        </div>
                                        <input type="text" class="form-control" id="servicios_otro"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Final-->

                    <!-- Archivos multiples -->
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">CARGAR
                                                DOCUMENTOS</span>
                                        </div>
                                        <div class="custom-file">
                                            <input class="form-control" type="file" id="formFileMultiple" multiple />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Archivos multiples -->

                    <!-- Inicio Observaciones-->
                    <div class="card">
                        <div class="card-body">
                            <h5>Observaciones</h5>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Inicio propiedad horizontal-->
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
    <script src="{{ asset('js/js_blade/visitas_index.js') }}"></script>
@endsection
