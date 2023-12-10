@extends('layouts.app-master')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Informacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre: </strong>
                            {{ $servicio->nombre }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Descripcion:<br> <br> </strong>
                            {{ $servicio->descripcion }}
            
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Costo: </strong>
                            {{ $servicio->precio }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Categoria: </strong>
                            {{ $servicio->categoria->nombre }}
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
