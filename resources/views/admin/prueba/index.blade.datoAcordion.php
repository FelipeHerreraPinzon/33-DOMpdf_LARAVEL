@extends('layouts.admin')

@section('content')

<style>
    .form-area {
        margin: 5px auto;
        /* max-width: 450px;*/
        /*padding: 10px 30px;*/
        background: #fafafa;
    }

    .form-area .single-form {
        position: relative;
        margin-bottom: 15px;
        font-family: Merienda;
    }

    .form-area .single-form input,
    .form-area .single-form select,
    .form-area .single-form textarea {
        width: 100%;
        padding: 10px;
    }

    .form-area .single-form input:focus+label,
    .form-area .single-form input:valid+label,
    .form-area .single-form select:focus+label,
    .form-area .single-form select:valid+label,
    .form-area .single-form textarea:focus+label,
    .form-area .single-form textarea:valid+label {
        color: #00B2B0;
        font-size: .9rem;
        font-weight: bold;
        top: -10px;
    }

    .form-area .single-form input:focus+label:after,
    .form-area .single-form input:valid+label:after,
    .form-area .single-form select:focus+label:after,
    .form-area .single-form select:valid+label:after,
    .form-area .single-form textarea:focus+label:after,
    .form-area .single-form textarea:valid+label:after {
        content: ':';
    }

    .form-area label {
        position: absolute;
        top: 12px;
        left: 20px;
        color: #777;
        font-size: .9rem;
        background: #fff;
        transition: .5s;
    }
</style>

<div id="container ">
    <div class="row ml-2">
        <div class="col-2">
            <label for=" idDato" class="form-label">Dato</label>
            <input type="text" name="idDato" id="idDato" class="form-control" value="{{old('idDato')}}" required>
        </div>

        <div class="col-4">
            <label for=" numAvaluo" class="form-label">Avaluo</label>
            <input type="text" name="numAvaluo" id="numAvaluo" class="form-control" value="{{old('numAvaluo')}}">
        </div>

        <div class="col-6">
            <label for=" selectAvaluo" class="form-label">Tipo Inmueble</label><br>
            <select class="form-select " aria-label=".form-select-sm example" value="xxx">
                <option value="1">Apartamento </option>
                <option value="1">Casa</option>
                <option value="2">Finca</option>
                <option value="3">Lote</option>

            </select>
        </div>
    </div>
    <div class="pt-3 mt-1 text-muted border-top"></div>
    <!--- inicio con el acordion e  boostrap 4 -->
    <div class="row">
        <div class="form-group col-6">

            <div class="accordion" id="acordionDato">
                <div class="card ml-2">
                    <div class=" acordion-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Ubicación del Dato
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#acordionDato">
                        <div class="card-body form-area">
                            <div class="row ">
                                <div class="col-6 single-form">
                                    <input type="text" name="direccion" id="direccion" required>
                                    <label for="direccion">Dirección</label>
                                </div>
                                <div class="col-2 single-form">
                                    <input type="text" name="apto" id="sector" required>
                                    <label for="apto">Apto</label>
                                </div>
                                <div class="col-2 single-form">
                                    <input type="text" name="nivel" id="nivel" required>
                                    <label for="nivel">Nivel</label>
                                </div>
                                <div class="col-2 single-form">
                                    <input type="text" name="bloque" id="bloque" required>
                                    <label for="bloque">Bloque</label>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-6 single-form">
                                    <input type="text" name="conjunto" id="conjunto" required>
                                    <label for="conjunto">Edificio/conjunto</label>
                                </div>
                                <div class="col-6 single-form">
                                    <input type="text" name="barSec" id="barSec" required>
                                    <label for="barSec">Barrio/Sector</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 single-form">

                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="1">Bogotá</option>
                                        <option value="1">Medellin</option>
                                        <option value="2">Cali</option>
                                        <option value="3">Bucaramanga</option>
                                    </select>
                                    <label for="selecAvaluo">Municipio</label>
                                </div>
                                <div class="col-6 single-form">

                                    <select class="form-select " aria-label=".form-select-sm example" value="xxx" required>
                                        <option value="1">Cundinamarca</option>
                                        <option value="1">Antioquia</option>
                                        <option value="2">Valle del Cauca</option>
                                        <option value="3">Santander</option>
                                    </select>
                                    <label for="selecAvaluo">Departamento</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 single-form">
                                    <input type="text" name="latGeo" id="latitud" required>
                                    <label for="latGeo">Lat. Grados dec.</label>
                                </div>
                                <div class="col-3 single-form">
                                    <input type="text" name="lonGeo" id="longitud" required>
                                    <label for="lonGeo">Long. Grados dec.</label>
                                </div>
                                <div class="col-3 single-form">
                                    <input type="text" name="latUtm" id="latUtm" required>
                                    <label for="latUtm">Latitud UTM</label>
                                </div>
                                <div class="col-3 single-form">
                                    <input type="text" name="lonUtm" id="lonUtm" required>
                                    <label for="lonUtm">Longitud UTM</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ml-2">
                    <div class="acordion-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Origen de la información
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#acordionDato">
                        <div class="card-body form-area">
                            <div class="row">
                                <div class="col-6 single-form">
                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="1">Venta</option>
                                        <option value="1">Oferta</option>
                                        <option value="2">Directa</option>
                                        <option value="3">Avalúo</option>
                                    </select>
                                    <label for=" selecTipo">Tipo información</label>
                                </div>
                                <div class="col-6 single-form">
                                    <input type="text" name="contacto" id="contacto" required>
                                    <label for="contacto">Nombre Contacto</label>
                                </div>
                                <div class="col-6 single-form">
                                    <input type="text" name="telefono" id="telefono" required>
                                    <label for="telefono">Telefono</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 single-form">
                                    <textarea name="url" id="url" required></textarea>

                                    <label for="url">URL - pagina WEB</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ml-2">
                    <div class="acordion-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Areas y Distribución
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#acordionDato">
                        <div class="card-body form-area">
                            <div class="row">
                                <div class="col-3 single-form">
                                    <input type="text" name="areaCons" id="areaCons" required>
                                    <label for="areaCons">Area Construida</label>
                                </div>
                                <div class="col-3 single-form">
                                    <input type="text" name="AreaPriv" id="areaPriv" required>
                                    <label for="areaPriv">Area Privada</label>
                                </div>
                                <div class="col-2 single-form">
                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="sin">Sel-></option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                    <label for=" selecTipo">Estrato</label>
                                </div>
                                <div class="col-2 single-form">
                                    <input type="text" name="intExt" id="intExt" required>
                                    <label for="intExt">Int/Ext</label>
                                </div>
                                <div class="col-2 single-form">
                                    <input type="text" name="terraza" id="terraza" required>
                                    <label for="terraza">Terraza</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 single-form">
                                    <input type="text" name="edad" id="edad" required>
                                    <label for="edad">Edad</label>
                                </div>
                                <div class="col-2 single-form">
                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="sin">Sel-></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <label for=" selecTipo">Parquead.</label>
                                </div>
                                <div class="col-2 single-form">
                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="1">Sel-></option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                    <label for=" selecTipo">Habitac.</label>
                                </div>
                                <div class="col-2 single-form">
                                    <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                        <option value="1">Sel-></option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                    <label for=" selecTipo">Baños</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ml-2">
                    <div class="acordion-header" id="headingFor">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFor" aria-expanded="false" aria-controls="collapseThree">
                                Dotación Comunal
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFor" class="collapse" aria-labelledby="headingFor" data-parent="#acordionDato">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 single-form">
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check1" id="flexCheckDefault">
                                        <label class="form-check-label " for="flexCheckDefault">
                                            Porteria
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check2" id="Check2">
                                        <label class="form-check-label " for="Check2">
                                            Citofono
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm ">
                                        <input class="form-check-input " type="checkbox" value="" name="Check3" id="Check3">
                                        <label class="form-check-label " for="Check3">
                                            Bicicletero
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check4" id="Check4">
                                        <label class="form-check-label" for="Check4">
                                            Juego Niños
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check5" id="Check5">
                                        <label class="form-check-label" for="Check5">
                                            Cancha Mult.
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check6" id="Check6">
                                        <label class="form-check-label" for="Check6">
                                            Club House
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check7" id="Check7">
                                        <label class="form-check-label" for="Check7">
                                            Piscina
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check8" id="Check8">
                                        <label class="form-check-label" for="Check8">
                                            Piscina
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check9" id="Check9">
                                        <label class="form-check-label " for="Check9">
                                            Gj.Visitantes
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check10" id="Check10">
                                        <label class="form-check-label " for="Check10">
                                            Salón Comunal
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm ">
                                        <input class="form-check-input " type="checkbox" value="" name="Check11" id="Check11">
                                        <label class="form-check-label " for="Check11">
                                            Tanque de Agua
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check12" id="Check12">
                                        <label class="form-check-label" for="Check12">
                                            Bomba Eyectora
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check13" id="Check13">
                                        <label class="form-check-label " for="Check13">
                                            Cancha Squash
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check14" id="Check14">
                                        <label class="form-check-label " for="Check14">
                                            Zonas Verdes
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm ">
                                        <input class="form-check-input " type="checkbox" value="" name="Check15" id="Check15">
                                        <label class="form-check-label " for="Check15">
                                            Planta Electrica
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check16" id="Check16">
                                        <label class="form-check-label" for="Check16">
                                            Gimnasio
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check17" id="Check17">
                                        <label class="form-check-label " for="Check17">
                                            Shut Basuras
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check18" id="Check18">
                                        <label class="form-check-label " for="Check18">
                                            Golfito
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm ">
                                        <input class="form-check-input " type="checkbox" value="" name="Check19" id="Check19">
                                        <label class="form-check-label " for="Check19">
                                            Aire Condicionado
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check20" id="Check20">
                                        <label class="form-check-label" for="Check20">
                                            Eq. presion const.
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check21" id="Check21">
                                        <label class="form-check-label " for="Check21">
                                            Ascensor
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check22" id="Check22">
                                        <label class="form-check-label " for="Check22">
                                            Otros
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm ">
                                        <input class="form-check-input " type="checkbox" value="" name="Check23" id="Check23">
                                        <label class="form-check-label " for="Check23">
                                            Otros
                                        </label>
                                    </div>
                                    <div class="form-check form-control-sm">
                                        <input class="form-check-input " type="checkbox" value="" name="Check24" id="Check24">
                                        <label class="form-check-label" for="Check24">
                                            Otros
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ml-2">
                    <div class="acordion-header" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Valores de Mercado
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#acordionDato">
                        <div class="card-body form-area">
                            <div class="row">
                                <div class="col-6 single-form">
                                    <input type="text" name="vrOferta" id="vrOferta" required>
                                    <label for="vrOferta">Valor Oferta Total</label>
                                </div>
                                <div class="col-6 single-form">
                                    <input type="text" name="vrParqueo" id="vrParqueo" required>
                                    <label for="vrParqueo">Valor Parqueadero</label>
                                </div>

                                <div class="col-6 single-form">
                                    <input type="text" name="vrDeposito" id="vrDeposito" required>
                                    <label for="vrDeposito">Valor Deposito</label>
                                </div>
                                <div class="col-6 single-form">
                                    <input type="text" name="vrOtro" id="vrOtro" required>
                                    <label for="vrOtro">Valor Terraza</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 single-form">
                                    <textarea name="url" id="url" required></textarea>
                                    <label for="url">Observaciones:</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group col-6">

            <div class="card py-2 col-12 ml-2">
                <div class="form-group col-md-12">
                    <div id="mi_mapa" style=" width: 100%; height: 400px;"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card p-2">
                <div>
                    <h5>Anexo Fotografico</h5>
                </div>
                <form action="" method="POST" class="dropzone" id="my-awesome-dropzone">
                </form>
            </div>
        </div>


    </div>


</div>


@endsection
@section('scripts')

<script src="{{ asset('js/js_blade/geolocalizacion.js') }}"></script>
@endsection