@extends('layouts.admin')

@section('content')
<style>
    .leaflet-popup-content img {
        width: 100%;
    }

    .title_popup {
        font-size: 30px;
        color: darkblue;
    }
</style>
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

                        <button class="btn btn-primary" id="btn_poligonos" type="button"><i class="fas fa-draw-polygon"></i>Poligonos</button>
                        <button class="btn btn-primary clear" data-option="active" id="btn_filtros" type="button"><i class="fas fa-file-invoice-dollar "></i>Filtros</button>
                        <button class="btn btn-primary clear" id="btn_limpiar" type="button"><i class="fas fa-broom"></i>Limpiar</button>


                        <div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;
                                </span></button>
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div id="card_filtros" class="card shadow-lg col-lg-12 mt-1 p-1 bg-white" >
                                <div class="card-body">
                                    <form id="form_filtros">

                                        <input type="hidden" class="_token" value="{{ csrf_token() }}">
                                        <!--<input type="text hidden" class="campos" name="valor_oferta" id="valor_oferta" value="0">-->

                                        <div class="form-row  ">
                                            <div class="form-group col 12 col-md-12 col-lg-3 col-xl-3 ">
                                                <label for="id_departamento">Departamento</label><br>
                                                <input type="text" class="form-control typeahead_departamento campos" placeholder="Escribe y selecciona" autocomplete="off">
                                                <input type="number" name="id_departamento" id="id_departamento" class="campos" autocomplete="off" value="0" hidden>
                                            </div>
                                            <div class="form-group 12 col-md-12 col-lg-3 col-xl-3">
                                                <label for="id_municipio">Municipio</label><br>
                                                <input type="text" class="form-control typeahead_municipio campos" placeholder="Escribe y selecciona" autocomplete="off">
                                                <input type="number" name="id_municipio" id="id_municipio" class="campos" autocomplete="off" value="0" hidden>
                                            </div>
                                            <div class="form-group col-12 md-12 col-md-12 col-lg-3 col-xl-3">
                                                <label for="barrio">Barrio/Sector</label>
                                                <select class="custom-select form-control campos" name="barrio" id="barrio">
                                                    <option value="">Seleccione Barrio o Sector</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-12 md-12 col-md-12 col-lg-3 col-xl-3">

                                                <label for="tipo_inmueble">Tipo Inmueble</label>
                                                <select class="custom-select form-control campos" name="id_tipo_inmueble" id="id_tipo_inmueble">
                                                    <option value="">Seleccione tipo de inmueble</option>
                                                    @foreach ($detalle_tipo_inmuebles as $detalle_tipo_inmueble)
                                                    <option value="{{ $detalle_tipo_inmueble->id }}">{{ $detalle_tipo_inmueble->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>




                                            </div>
                                        </div>

                                        <div class="form-row form-area">

                                            <div class="form-group col-4 col-md-3 col-lg-2 col-xl-2 single-form">
                                                <input type="text" class="campos" name="valor_inicial" id="valor_inicial" required>
                                                <label for="valor_inicial">Valor desde ($)</label>
                                            </div>
                                            <div class="form-group col-4 col-md-3 col-lg-2 col-xl-2 single-form">
                                                <input type="text" class="campos" name="valor_final" id="valor_final" required>
                                                <label for="valor_final">Valor hasta($)</label>

                                            </div>
                                            <div class="form-group col-4 col-md-3 col-lg-1 col-xl-1 single-form">
                                                <input type="text" class="campos" name="area_desde" id="area_desde" required>
                                                <label for=" area_construida">Area desde(m²)</label>

                                            </div>
                                            <div class="form-group col-4 col-md-3 col-lg-1 col-xl-1 single-form">

                                                <input type="text" class="campos" name="area_hasta" id="area_hasta" required>
                                                <label for=" area_privada">Area hasta(m²)</label>

                                            </div>
                                            <div class="form-group col-2 col-md-3 col-lg-1 col-xl-1 single-form">
                                                <input type="text" class="campos" name="edad" id="edad" required>
                                                <label for="edad">Edad</label>
                                            </div>

                                            <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">
                                                <select class="form-select campos " aria-label=".form-select-sm example" name="estrato" id="estrato" title="Estrato">
                                                    <option value="" selected>Todos</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <label for=" selecTipo">Estrato</label><br>
                                            </div>
                                            <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                                                <select class="form-select campos " aria-label=".form-select-sm example" name="parqueaderos" id="parqueaderos">
                                                    <option value="" selected>Todos</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <label for=" selecTipo">Parquead.</label>
                                            </div>
                                            <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                                                <select class="form-select campos" aria-label=".form-select-sm example" name="habitaciones" id="habitaciones">

                                                    <option value="" selected>Todos</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <label for=" selecTipo">Habitac.</label>
                                            </div>
                                            <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">
                                                <select class="form-select campos" aria-label=".form-select-sm example" name="banos" id="banos">
                                                    <option value="">Todos</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <label for=" selecTipo">Baños</label><br>
                                            </div>
                                            <div class="form-group col-2 col-md-3 col-lg-2 col-xl-1">
                                                <button class="btn btn-primary" id="btn_consultas" type="button"><i class="fas fa-search  "></i> Consultar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <div class="container-fluid">
                                        <div id="mi_mapa" style="width: 100%; height:650px;"></div>
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
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
</div>


{{-- Fin Modal Editar --}}
@endsection
@section('scripts')

<!--script src="{{ asset('js/js_blade/geolocalizacion.js') }}"></script>-->

<script src="{{ asset('js/js_blade/muestra_datos.js') }}">

</script>

<script src="https://cdn.rawgit.com/hayeswise/Leaflet.PointInPolygon/v1.0.0/wise-leaflet-pip.js"></script>
<script src="https://rawgit.com/hayeswise/Leaflet.PointInPolygon/master/wise-leaflet-pip.js"></script>

@endsection