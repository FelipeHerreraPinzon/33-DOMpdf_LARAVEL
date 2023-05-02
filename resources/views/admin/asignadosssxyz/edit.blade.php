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

  .headerRegister,
  .header-primary {
    background: #009688;
    color: #FFF;
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
          Asignación de solicitud recibida</div>

        <form method="POST" action="{{route('admin.asignados.store')}}">
          @csrf

          <div class="card-body">


            <div class="row">
              <div class="form-group col-lg-12">
                <input type="hidden" name="radicado_id" value="{{$radicados[0]->id}}">
                <input type="hidden" name="estado_visitador" value="Asignado">
                <input type="hidden" name="asigna_valuador" value="{{date('Y-m-d h:i')}}">
                <input type="hidden" name="estado_valuador" value="Asignado">
                <input type="hidden" name="asigna_verificador" value="{{date('Y-m-d h:i')}}">
                <input type="hidden" name="estado_verificador" value="Asignado">

                <div>
                  <table class="table table-secondary table-sm">
                    <tbody>
                      <tr>
                        <td>
                          <h5><strong>Solicitud</strong></h5>
                          <p>{{$radicados[0]->numero_radicado}}</p>
                        </td>

                        <td>
                          <h5><strong>Radicado</strong></h5>
                          <p>{{$radicados[0]->fecha}}</p>
                        </td>
                        <td>
                          <h5><strong>Solicitante</strong></h5>
                          <p>{{$radicados[0]->nombres.' '.$radicados[0]->apellidos}}</p>
                        </td>
                        <td>
                          <h5><strong>Dirección</strong></h5>
                          <p>{{$radicados[0]->direccion}}</p>
                        </td>
                        <td>
                          <h5><strong>Municipio</strong></h5>
                          {{$radicados[0]->nombre}}
                        </td>

                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>




            <!-- asi es como estaba comn label e input 
                    <label for="numero_radicado" class="required">Solicitud</label>

                    <input class="form-control" name="numero_radicado" type="text" value="{{$radicados[0]->numero_radicado}}" disabled>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="name" class="required">Radicado </label>
                    <input class="form-control" name="fecha" type="text" value="{{$radicados[0]->fecha.' '.$radicados[0]->hora}}" disabled>
                  </div>
                  <div class="form-group col-md-5">
                    <label class="form-label" for="nombre_sol" class="required">Solicitante</label>
                    <input class="form-control" name="nombre_sol" type="text" value="{{$radicados[0]->nombres.' '.$radicados[0]->apellidos}}" disabled>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-5">
                    <label class="form-label" for="direccion" class="required">Dirección</label>
                    <input class="form-control" name="direccion" type="text" value="{{$radicados[0]->direccion}}" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="municipio" class="required">Municipio</label>
                    <input class="form-control" name="municipio" type="text" value="{{$radicados[0]->nombre}}" disabled>
                  </div>
                </div>
            </div>-->

            <!-- inicio de la segunda car con la informacion a grabar o asignar-->
            <div class="pt-3 mt-1 text-muted border-top"></div>
            <div class="row">
              <div class="form-group col-md-5">
                <label class="form-label " for="avaluo_codigo" class="required">Numero de Avaluo</label>
                <input class="form-control bg-info" name="codigo" type="text" value="se debe generar">
              </div>
              <div class="form-group col-md-3">
                <label class="form-label" for="asigna_visitador" class="required">Fecha y hora de Asignación</label>
                <input class="form-control bg-info" name="asigna_visitador" class="form-control" type="datetime-local" value="{{date('Y-m-d h:i')}}">
              </div>

            </div>

            <div class="pt-3 mt-1 text-muted border-top"></div>
            <div class="row">
              <div class="form-group col-md-5 ">

                <!------ aqui se coloco lo de la modal ---->


                <!------ aqui termino lo de la modal ---->

                <!--<label for="visitador_id">Visitador</label>-->
                <label for="tipoDoc">Tipo Documento</label>
                <button type="button" class="btn-btn-success" title="Ver Visitador" data-toggle="modal" data-target="#modalVerVisitador">
                  <i class="far fa-eye"></i>
                </button>
                
                <input type="text" class="form-control typeahead_tipo_documento  campos" placeholder="Escribe y selecciona" autocomplete="off">
                <input type="number" id="id_tipo_documento" name="id_tipo_documento" class="campos" autocomplete="off" hidden>



              </div>
              <div class="form-group col-md-5 ">
                <label for="valuador_id" class="required">Avaluador</label>
                <button type="button" class="btn-btn-success" title="Ver Valuador" data-toggle="modal" data-target="#modalVerValuador">
                  <i class="far fa-eye"></i>
                </button>

                <select class="form-control select2" name="valuador_id" style="width: 100%;">
                  <option value="">Seleccione </option>
                  @foreach ($valuadores as $valuador)
                  <option value="{{ $valuador->id }}" {{old('valuador_id')
                                        == $valuador->id ? 'selected' : ''}}>
                    {{ $valuador->name }}
                  </option>
                  @endforeach
                </select>

                @if ($errors->has('valuador_id'))
                <span class="text-danger">
                  <strong>{{ $errors->first('valuador_id') }}</strong>
                </span>
                @endif
              </div>

            </div>

            <div class="row">



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
                <label for="avaluo_novedades" class="required">Observaciones </label>
                <textarea class="form-control" name="avaluo_novedades" type="textarea" value=""></textarea>
              </div>
              <div class="form-group col-md-3">
                <label for="fecha_solnovedad" class="required">Solicitadas </label>
                <input class="form-control" name="fecha-solnovedad" type="datetime-local" value="">
              </div>

            </div>

            <div class="card-footer text-right mt-4">
              <a class="btn btn-info" href="{{route('admin.asignados.index')}}">
                <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                Regresar
              </a>
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
</div>
</div>

{{-- Inicio Modal Ver visitador --}}
<div class="modal fade" id="modalVerVisitador" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 id="modal-title headerRegister">Listado de Visitadores </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered" id="consultaVisitador_table">
          <thead>
            <tr>
              <!--<th>Radicado por</th>-->
              <th># avaluo</th>

              <th>Nombre Visitador</th>
              <th>Fecha Asignado</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($avaluosVisitador as $visitador)
            <tr>

              <td>{{$visitador->avaluo_codigo}}</td>
              <td>{{$visitador->name}}</td>
              <td>{{$visitador->asignavisitador}}</td>
              <td>{{$visitador->estadovisitador}}</td>
              <td>{{$visitador->id}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Guardar</button>
        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- Fin Modal Ver visitador --}}


{{-- Inicio Modal Ver visitador --}}
<div class="modal fade" id="modalVerValuador" data-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 id="modal-title headerRegister">Listado de Valuadoress </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered" id="consultaValuador_table">
          <thead>
            <tr>
              <!--<th>Radicado por</th>-->
              <th># avaluo</th>

              <th>Nombre de avaluador</th>
              <th>Fecha Asignado</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($avaluosValuador as $valuador)
            <tr>

              <td>{{$valuador->avaluo_codigo}}</td>
              <td>{{$valuador->name}}</td>
              <td>{{$valuador->asignavaluador}}</td>
              <td>{{$valuador->estadovaluador}}</td>
              <td>{{$valuador->id}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Guardar</button>
        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
{{-- Fin Modal Ver valuador --}}
@endsection



@section('scripts')
<script>
  $(document).ready(function() {
    $('#consultaVisitador_table').DataTable();
  });

  $(document).ready(function() {
    $('#consultaValuador_table').DataTable();
  });
</script>
<script src="{{ asset('js/js_blade/tables.js') }}"></script>
<script src="{{ asset('js/js_blade/asignado_index.js') }}"></script>
@endsection