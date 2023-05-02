@extends('layouts.admin')
<style>
    body {

        /*background: url("https://cdn.pixabay.com/photo/2021/02/27/21/16/plain-background-6055825_1280.jpg");*/
        /*background-image: url('images/LogoPantallaVLR.jpg');*/
        background-color: #3AC4E9;
        background-repeat: no-repeat;
        background-size: 100vw 100vh;
        z-index: -3;
        background-attachment: fixed;
    }

    header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }

    .card-header {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
    }
</style>
@section('content')

<header style="height:70 px">
</header>
<div style="height: 30px;"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white">
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">
                    Estado y seguimiento de avaluo {{$response[0]->codigo}}</div>

                <form method="POST" action="{{route('admin.avaluos.store')}}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="hidden" name="avaluo_id" value="{{$response[0]->id}}">
                                <input type="hidden" name="estadovisitador" value="Asignado">
                                <input type="hidden" name="asignavaluador" value="{{date('Y-m-d h:i')}}">
                                <input type="hidden" name="estadovaluador" value="Asignado">
                                <input type="hidden" name="asignaverificador" value="{{date('Y-m-d h:i')}}">
                                <input type="hidden" name="estadoverificador" value="Asignado">



                                <label for="numradicado" class="required">Solicitud</label>

                                <input class="form-control" name="numero_radicado" type="text" value="{{$response[0]->numero_radicado}}" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="name" class="required">Radicado </label>
                                <input class="form-control" name="fecha" type="text" value="{{$response[0]->fecha.' '.$response[0]->hora}}" disabled>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="form-label" for="nombre_sol" class="required">Solicitante</label>
                                <input class="form-control" name="nombre_sol" type="text" value="{{$response[0]->solicitante_nombre.' '.$response[0]->solicitante_apellidos}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label class="form-label" for="direccion" class="required">Dirección</label>
                                <input class="form-control" name="direccion" type="text" value="{{$response[0]->direccion}}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="municipio" class="required">Municipio</label>
                                <input class="form-control" name="municipio" type="text" value="{{$response[0]->id}}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="estado">Estado</label>
                                <select class="form-control campos" name="estado" id="estado">
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


                        <div class="card shadow-lg p-3 mb-5 bg-white">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label class="form-label " for="avaluo_codigo" class="required">Numero de Avaluo</label>
                                    <input class="form-control bg-info" name="avaluo_codigo" type="text" value="{{$response[0]->id}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="asignavisitador" class="required">Fecha y hora de Asignación</label>
                                    <input class="form-control bg-info" name="asignavisitador" class="form-control" type="datetime-local" value="{{$response[0]->asigna_visitador}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label" for="asignavisitador" class="required">Tiempo transcurrido</label>
                                    <input class="form-control {{$tiempo[1]}}" id="clock" name="asignavisitador" class="form-control" type="text" value="{{ $tiempo[0] }}">
                                </div>


                            </div>

                            <div class="pt-3 mt-1 text-muted border-top"></div>
                            <div class="row">
                                <div class="form-group col-md-5 ">
                                    <label for="visitador_id" class="required">Visitador</label>
                                    <input name="visitador_id" type="text" value="{{$response[0]->solicitante_nombre.' '.$response[0]->solicitante_apellidos}}" disabled>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">Visita</label>
                                    <input class="form-control" name="visitador_id" type="text" value="{{$response[0]->asigna_visitador}}" disabled>
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


                            <div class="pt-3 mt-1 text-muted border-top"></div>
                            <div class="row">
                                <div class="form-group col-md-5 ">
                                    <label for="visitador_id" class="required">Avaluador</label>
                                    <input name="visitador_id" type="text" value="{{$response[0]->solicitante_nombre.' '.$response[0]->solicitante_apellidos}}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">En Proceso</label>
                                    <input class="form-control" name="visitador_id" type="text" value="{{$response[0]->asigna_visitador}}" disabled>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="visitador_id" class="required">Novedades</label>
                                    <input class="form-control" name="visitador_id" type="text" value="" disabled>
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
                                    <label for="verificador_id" class="required">Verificador</label>

                                    <select class="form-control select2" name="verificador_id" style="width: 100%;">
                                        <option value="">Seleccione </option>
                                        @foreach ($verificadores as $verificador)
                                        <option value="{{ $verificador->id }}" {{old('verificador_id')
                                        == $verificador->id ? 'selected' : ''}}>
                                            {{ $verificador->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('verificador_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('verificador_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-5 ">
                                    <label for="lider_id" class="required">Lider/Coordinador</label>

                                    <select class="form-control select2" name="lider_id" style="width: 100%;">
                                        <option value="">Seleccione </option>
                                        @foreach ($lideres as $lider)
                                        <option value="{{ $lider->id }}" {{old('lider_id')
                                        == $lider->id ? 'selected' : ''}}>
                                            {{ $lider->name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('lider_id'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('lider_id') }}</strong>
                                    </span>
                                    @endif
                                </div>



                            </div>

                            <div class="row">

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
                                <a class="btn btn-info" href="{{route('admin.avaluos.index')}}">
                                    <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                    Regresar
                                </a>
                                <button class="btn btn-primary " id="btn_send" type="button">Asignar</button>



                            </div>

                </form>
            </div>
        </div>

    </div>
</div>
</div>



@endsection