@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de Radicados</h1>
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
                            <button data-option="create" data-tooltip="tooltip" title="Crear Radicado" data-toggle="modal"
                                data-target="#modalAdmin" class="btn btn-info clear">
                                <i class="fas fa-file-medical"></i>
                            </button>

                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Referente</th>
                                        <th>Dirección</th>
                                        <th>Zona</th>
                                        <th>Municipio</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($radicados as $radicado)
                                        <tr>
                                            <td>{{ $radicado->numero_radicado }}</td>
                                            <td>{{ $radicado->fecha }}</td>
                                            <td>{{ $radicado->hora }}</td>
                                            <td>{{ $radicado->persona->nombres }}</td>
                                            <td>{{ $radicado->direccion }}</td>
                                            <td>{{ $radicado->municipio }}</td>
                                            <td>{{ $radicado->municipio }}</td>
                                            <td>{{ $radicado->persona->nombres }}</td>
                                            <td>

                                                <button data-id="{!! $radicado->id !!}" data-option="update"
                                                    data-tooltip="tooltip" title="Editar registro" data-toggle="modal"
                                                    data-target="#modalAdmin" class="btn btn-primary clear">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button data-id="{!! $radicado->id !!}" class="btn btn-danger btn_delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <!--<a href="{{ route('admin.radicados.show', $radicado->id) }}"
                                                            class="btn btn-secondary"> <i class="fas fa-folder-open"></i></a>
                                                        <a href="{{ route('admin.radicados.show', $radicado->id) }}"
                                                            class="btn btn-secondary"> Documentos</i></a>
                                                        <a href="{{ route('admin.radicados.edit', $radicado->id) }}"
                                                            class="btn btn-success">Editar</a>
                                                        <form action="{{ route('admin.radicados.destroy', $radicado->id) }}"
                                                            id="delete_form" method="POST"
                                                            onsubmit="return confirm('Esta seguro que desea eliminar el registro?')"
                                                            style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                                        </form>-->

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
                    <h5 class="campos" id="numradicado"></h5>
                    <input type="hidden" class="campos" id="option_select">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" class="campos" id="option_select">
                    <input type="hidden" class="campos" id="id">
                    <input type="hidden" class="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body">
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control campos" id="fecha" placeholder="Fecha">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="hora">Hora</label>
                            <input type="time" class="form-control campos" id="hora" placeholder="Hora">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="referente">Referente</label>
                            <input type="text" id="referente" class="form-control typeahead_referente campos"
                                placeholder="Escribe y selecciona" autocomplete="off">
                            <input type="text" id="id_referente" class="campos" autocomplete="off" hidden>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="id_tipoinmueble">Tipo inmueble</label>
                            <select class="form-control campos" name="id_tipoinmueble" id="id_tipoinmueble">
                                <option value="">Seleccione un tipo de inmueble</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control campos" id="direccion" placeholder="Direccion">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="barrio">Barrio</label>
                            <input type="text" class="form-control campos" id="barrio" placeholder="Barrio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="zona">Zona</label>
                            <input type="text" class="form-control campos" id="zona" placeholder="Zona">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control typeahead_departamento campos"
                                placeholder="Escribe y selecciona" autocomplete="off">
                            <input type="text" id="id_departamento" class="campos" autocomplete="off" hidden>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="municipio">Municipio</label>
                            <input type="text" class="form-control typeahead_municipio campos"
                                placeholder="Escribe y selecciona" autocomplete="off">
                            <input type="text" id="id_municipio" class="campos" autocomplete="off" hidden>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cliente">Cliente</label>
                            <input type="text" id="cliente" class="form-control typeahead_cliente campos"
                                placeholder="Escribe y selecciona" autocomplete="off">
                            <input type="text" id="id_cliente" class="campos" autocomplete="off" hidden>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="solicitante_id">Solicitante</label>
                            <input type="text" id="solicitante" class="form-control typeahead_solicitante campos"
                                placeholder="Escribe y selecciona" autocomplete="off">
                            <input type="text" id="id_solicitante" class="campos" autocomplete="off" hidden>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="contacto_id">Contacto</label>
                            <select class="form-control campos" name="contacto_id" id="contacto_id">
                                <option value="">Seleccione un contacto</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="vrreferente">Valor referente</label>
                            <input type="text" class="form-control campos" id="vrreferente"
                                placeholder="Valor referente">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="honorarios">Honorarios</label>
                            <input type="text" class="form-control campos" id="honorarios" placeholder="Honorarios">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="observaciones">Observaciones</label>
                            <input type="text" class="form-control campos" id="observaciones"
                                placeholder="Observaciones">
                        </div>
                    </div>

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
    <script src="{{ asset('js/js_blade/radicado_index.js') }}"></script>
@endsection
