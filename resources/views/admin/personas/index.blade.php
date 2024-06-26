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
                        <h2>Clientes <button data-option="create" data-tooltip="tooltip" title="Crear Persona" data-toggle="modal" data-target="#modalPersona" class="btn btn-primary clear">
                                <i class="fas fa-plus-circle"></i> Nuevo
                            </button> </h2>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">


                            <table class="table table-sm table-hover mb-0 data-table" id="table">
                                <thead>
                                    <tr>
                                        <!--<th>Id</th>-->
                                        <th>Identificación</th>
                                        <th>Numero</th>
                                        <th>Nombres</th>
                                        <th>apellidos</th>
                                        <th>Celular</th>
                                        <th>Tel Fijo</th>
                                        <th>correo</th>
                                        <th>direccion</th>
                                        <th>Municipio</th>
                                        <th>Departamento</th>
                                        <!--<th>Contacto</th>-->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                    <tr>

                                        <td>{{$persona->documento_nombre}}</td>
                                        <td>{{$persona->persona_numero_documento}}</td>
                                        <td>{{$persona->persona_nombres}}</td>
                                        <td>{{$persona->persona_apellidos}}</td>
                                        <td>{{$persona->persona_celular}}</td>
                                        <td>{{$persona->persona_telefono_fijo}}</td>
                                        <td>{{$persona->persona_correo}}</td>

                                        <td>{{$persona->persona_direccion}}</td>
                                        <td>{{$persona->municipio_nombre}}</td>
                                        <td>{{$persona->departamento_nombre}}</td>
                                        <!--<td>{{$persona->contacto_nombres}}</td>-->

                                        <td>
                                            <button data-id="{!! $persona->persona_id !!}" data-option="update" data-tooltip="tooltip" title="Editar Persona" data-toggle="modal" data-target="#modalPersona" class="btn btn-primary clear">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button data-persona_id="{!! $persona->persona_id !!}" class="btn btn-danger btn_delete">
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




<div class="modal bd-example-modal-lg" id="modalPersona" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h4 id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form id="formPersona" name="formPersona" method="POST" enctype="multipart/form-data">-->
                <div id="error"></div>
                <input class="campos" id="option_select" hidden>
                <input type="hidden" name="persona_id" id="persona_id">
                <input type="hidden" name="persona_tipo" id="persona_tipo" value="1">
                <input type="hidden" name="codigo_postal" id="codigo_postal" value="1sss">
                <input type="hidden" name="contacto_id" id="contacto_id" value="1">

                <input type="hidden" class="_token" value="{{ csrf_token() }}">
                <div class="form-row">


                    <div class="form-group col-md-6">
                        <label for="detalle_id">Tipo documento</label><br>
                        <select class="custom-select form-control " name="detalle_id" id="id_tipo_documento" onchange="ocultaApellidos()" style="width: 100%">
                            <option value="" selected disabled>Seleccione un tipo de documento</option>
                            @foreach ($detalle_tipo_documentos as $detalle_tipo_documento)
                            <option value="{{ $detalle_tipo_documento->id }}">{{ $detalle_tipo_documento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="numero_documento">Numero</label>
                        <input type="text" class="form-control campos" name="numero_documento" id="numero_documento" placeholder="Ingrese numero de documento">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombres" id="label_nombres">Nombres</label>
                        <input type="text" class="form-control campos" name="nombres" id="nombres" placeholder="Ingrese Nombre del cliente">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellidos" id="label_apellidos">Apellidos</label>
                        <input type="text" class="form-control campos" name="apellidos" id="apellidos" placeholder="Ingrese apellidos del cliente">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control campos" name="celular" id="celular" placeholder="Ingrese numero del movil">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono_fijo">Tel-Fijo</label>
                        <input type="text" class="form-control campos" id="telefono_fijo" name="telefono_fijo" placeholder="Ingrese No. telefono fijo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="correo">Email</label>
                        <input type="email" class="form-control campos" id="correo" name="correo" placeholder="Ingrese el email del cliente">
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="codPostal">Codigo Postal</label>
                        <input type="text" class="form-control campos" id="codigo_postal" name="codigo_postal" placeholder="Ingrese el email del contacto">
                    </div>-->

                    <div class="form-group col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control campos" id="direccion" name="direccion" placeholder="Ingrese dirección del cliente">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="departamento">Departamento</label><br>
                        <input type="text" class="form-control typeahead_departamento campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_departamento" name="id_departamento" class="campos" autocomplete="off" hidden>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="municipio">Municipio</label><br>
                        <input type="text" class="form-control typeahead_municipio campos" placeholder="Escribe y selecciona" autocomplete="off">
                        <input type="number" id="id_municipio" name="id_municipio" class="campos" autocomplete="off" hidden>
                       
                    </div>
                    <div class="form-group col-md-2">
                        <label for="id_contacto">Contacto</label><br>
                        <button class="btn btn-primary" id="btn_contacto" type="button" onClick="FbotonDecide()"><i class="fas fa-address-card "></i>Abrir</button>
                    </div>
                    <div id="card_contacto" class="card shadow-lg col-lg-12 mt-4 p-3 bg-white">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="contacto_nombre">Contacto</label>
                                <input type="text" class="form-control campos" name="contacto_nombre" id="contacto_nombre" placeholder="Nombres y apellidos del contacto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="contacto_telefono">Telefono</label>
                                <input type="text" class="form-control campos" name="contacto_telefono" id="contacto_telefono" placeholder="telefono del contacto">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contacto_cargo">Cargo</label>
                                <input type="text" class="form-control campos" name="contacto_cargo" id="contacto_cargo" placeholder="Cargo o ubicación">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="form-row">

                </div>

                <!--</form>-->
            </div>
            <div class="card-footer text-right mt-1">
                <button class="btn btn-primary" id="btn_send" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                <button class="btn btn-info" data-dismiss="modal" type="button"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Cancel</button>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')


<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/persona_index.js') }}"></script>
@endsection