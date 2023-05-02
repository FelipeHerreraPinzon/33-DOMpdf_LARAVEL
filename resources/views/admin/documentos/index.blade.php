@extends('layouts.admin')
<style>
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
                <div class=" card-header p-3 mb-2 bg-primary bg-gradient fw-bold text-white">Administrador de Documentos</div>
                <div class="card-body">

                    <!--<form id="form1" action="{{route('admin.tipodocumentos.index')}}" method="POST">-->
                    <form action="{{route('admin.documentos.store')}}" method="POST"  enctype='multipart/form-data'>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="name" class="required">Nuevo documento</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="file" name="files[]" id="" multiple>
                                    <br>
                                    @error('files')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-primary ">Subir</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>
</div>
</div>

@endsection