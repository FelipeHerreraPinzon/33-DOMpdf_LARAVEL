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
        /* color: #00B2B0;*/
        color: #222222;
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

        <div class="card" id="card_dato">
            <div class="card-body">
                <h5>Dato de Mercado</h5>
                <div class="form-group ">
                    <div class="form-row form-area ">
                        <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3 single-form">
                            <input type="text" class="campos" id="montaje" name="montaje" required>
                            <label for="montaje">Departamento</label>
                        </div>
                        <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3 single-form">
                            <input type="text" class="campos" id="barrio" name="barrio" required>
                            <label for="barrio">Municipio</label>
                        </div>
                        <div class="form-group col-6 col-md-6 col-lg-4 col-xl-3 single-form">
                            <input type="text" class="campos" id="direccion" name="direccion" required>
                            <label for="direccion">Barrio/Sector</label>
                        </div>
                        <div class="form-group col-6 col-md-2 col-lg-4 col-xl-3 single-form">
                            <input type="text" class="campos" id="informe_fecha_visita" name="fecha_visita" required>
                            <label for="fecha_visita">Edificio/Conjunto</label>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-4 single-form">
                            <input type="text" class="campos" name="direccion" id="direccion" required>
                            <label for="codigo">Dirección</label>
                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" id="visitador_nombre" name="visitador_nombre" required>
                            <label for="visitador_nombre">Bloque</label>
                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" id="banco" name="banco" required>
                            <label for="banco">Nivel</label>
                        </div>

                        <div class="form-group col-3 col-md-2 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" id="solicitante_nombre" name="solicitante_nombre" required>
                            <label for="solicitante_nombre">Apto</label>
                        </div>
                        <div class="form-group col-6 col-md-2 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" id="latitud" name="latitud" required>
                            <label for="latitud">Latitud</label>
                        </div>
                        <div class="form-group col-6 col-md-2 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" id="longitud" name="longitud" required>
                            <label for="longitud">Longitud</label>
                        </div>
                        <div class="form-group col-6 col-md-6 col-lg-3 col-xl-2 single-form">
                            <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                <option value="1">Venta</option>
                                <option value="1">Oferta</option>
                                <option value="2">Directa</option>
                                <option value="3">Avalúo de la empresa</option>
                            </select>
                            <label for=" selecTipo">Tipo Dato</label><br>
                        </div>
                        <div class="col-12">
                            <!-- div para el mapa -->
                            <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="mi_mapa" style=" width: 100%; height: 350px;"></div>
                            </div>
                            <!-- fin div del mapa -->
                        </div>

                    </div>


                    <div class="form-row form-area">
                        <!--- para las coordenadas-->
                        <div class="form-group col-7 col-md-3 col-lg-4 col-xl-3 single-form ">


                            <input type="text" class="campos" name="contacto" id="contacto" required>
                            <label for="contacto">Nombre Contacto</label>

                        </div>
                        <div class="form-group col-5 col-md-3 col-lg-2 col-xl-2 single-form">

                            <input type="text" class="campos" name="telefono" id="telefono" required>
                            <label for="telefono">Telefono</label>

                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-7 single-form">

                            <textarea class="campos" name="url" id="url" required></textarea>
                            <label for="url">URL - pagina WEB</label>
                        </div>
                    </div>



                    <div class="form-row form-area">
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">
                            <input type="text" class="campos" name="areaCons" id="areaCons" required>
                            <label for=" areaCons">A.Cons.</label>

                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                            <input type="text" class="campos" name="AreaPriv" id="areaPriv" required>
                            <label for=" areaPriv">A.Priv.</label>

                        </div>
                        <div class="form-group col-2 col-md-3 col-lg-2 col-xl-1 single-form">

                            <input type="text" class="campos" name="edad" id="edad" required>
                            <label for="edad">Edad</label>

                        </div>

                        <div class="form-group col-2 col-md-3 col-lg-2 col-xl-1 single-form">

                            <input type="text" class="campos" name="intExt" id="intExt" required>
                            <label for="intExt">I/E</label><br>
                        </div>
                        <div class="form-group col-2 col-md-3 col-lg-2 col-xl-1 single-form">

                            <input type="text" class="campos" name="terraza" id="terraza" required>
                            <label for=" terraza">T/za</label><br>
                        </div>

                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                            <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                <option value="sin">Sel-></option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                            <label for=" selecTipo">Estrato</label><br>
                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                            <select class="form-select" aria-label=".form-select-sm example" value="xxx">
                                <option value="sin">Sel-></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <label for=" selecTipo">Parquead.</label>
                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                            <select class="form-select" aria-label=".form-select-sm example" value="xxx">

                                <option value="1">Sel-></option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                            <label for=" selecTipo">Habitac.</label>
                        </div>
                        <div class="form-group col-3 col-md-3 col-lg-2 col-xl-1 single-form">

                            <select class="form-select" aria-label=".form-select-sm example" value="xxx">

                                <option value="1">Sel-></option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                            <label for=" selecTipo">Baños</label><br>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">

                        <div class="col-4 col-md-3 col-lg-2 col-xl-2 single-form">
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check1" id="flexCheckDefault">
                                <label class="form-check-label " for="flexCheckDefault">
                                    Porteria
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check2" id="Check2">
                                <label class="form-check-label " for="Check2">
                                    Juego de Niños
                                </label>
                            </div>
                            <div class="form-check form-control-sm ">
                                <input class="form-check-input " type="checkbox" value="" name="Check3" id="Check3">
                                <label class="form-check-label " for="Check3">
                                    Citofono
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check4" id="Check4">
                                <label class="form-check-label" for="Check4">
                                    Cancha Multif.
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
                                    Golfito
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check7" id="Check7">
                                <label class="form-check-label" for="Check7">
                                    Salon Comunal
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check9" id="Check9">
                                <label class="form-check-label " for="Check9">
                                    Bicicletero
                                </label>
                            </div>

                        </div>
                        <div class="col-4 col-md-3 col-lg-2 col-xl-2 single-form">

                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check10" id="Check10">
                                <label class="form-check-label " for="Check10">
                                    Bomba Eyectora
                                </label>
                            </div>
                            <div class="form-check form-control-sm ">
                                <input class="form-check-input " type="checkbox" value="" name="Check11" id="Check11">
                                <label class="form-check-label " for="Check11">
                                    Shut de Basuras
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check12" id="Check12">
                                <label class="form-check-label" for="Check12">
                                    Bomba Eyec.
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check13" id="Check13">
                                <label class="form-check-label " for="Check13">
                                    Piscina
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check14" id="Check14">
                                <label class="form-check-label " for="Check14">
                                    Tanque Agua
                                </label>
                            </div>
                            <div class="form-check form-control-sm ">
                                <input class="form-check-input " type="checkbox" value="" name="Check15" id="Check15">
                                <label class="form-check-label " for="Check15">
                                    C.de Squash
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check17" id="Check17">
                                <label class="form-check-label " for="Check17">
                                    Planta Eléctrica
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check16" id="Check16">
                                <label class="form-check-label" for="Check16">
                                    Club-House
                                </label>
                            </div>

                    </div>
                        <div class="col-4 col-md-3 col-lg-2 col-xl-21 single-form">

                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check18" id="Check18">
                                <label class="form-check-label " for="Check18">
                                    Hidroflow
                                </label>
                            </div>
                            <div class="form-check form-control-sm ">
                                <input class="form-check-input " type="checkbox" value="" name="Check19" id="Check19">
                                <label class="form-check-label " for="Check19">
                                    Aire Ac. Central
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check20" id="Check20">
                                <label class="form-check-label" for="Check20">
                                    Zonas Verdes
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check21" id="Check21">
                                <label class="form-check-label " for="Check21">
                                    Parq. Visitantes
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check24" id="Check24">
                                <label class="form-check-label" for="Check24">
                                    Gimnasio
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check24" id="Check24">
                                <label class="form-check-label" for="Check24">
                                    Ascensor
                                </label>
                            </div>
                            <div class="form-check form-control-sm">
                                <input class="form-check-input " type="checkbox" value="" name="Check24" id="Check24">
                                <label class="form-check-label" for="Check24">
                                    C.C.TV
                                </label>
                            </div>

                        </div>
                
                    <hr>
                    <div class="form-row form-area">

                        <div class="col-6 col-md-3 col-lg-2 col-xl-2 single-form">
                            <input type="text" name="vrOferta" id="vrOferta" required>
                            <label for="vrOferta">Valor Oferta Total</label>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 col-xl-2 single-form">
                            <input type="text" name="vrParqueo" id="vrParqueo" required>
                            <label for="vrParqueo">Valor Parqueadero</label>
                        </div>

                        <div class="col-6 col-md-3 col-lg-2 col-xl-2 single-form">
                            <input type="text" name="vrDeposito" id="vrDeposito" required>
                            <label for="vrDeposito">Valor Deposito</label>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 col-xl-2 single-form">
                            <input type="text" name="vrOtro" id="vrOtro" required>
                            <label for="vrOtro">Valor Terraza</label>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 col-xl-4 single-form">
                            <textarea name="url" id="url" required></textarea>
                            <label for="url">Observaciones:</label>
                        </div>
                    </div>

                </div>





            </div>
        </div>
    </div>   
  





<!-- container de fotos-->
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