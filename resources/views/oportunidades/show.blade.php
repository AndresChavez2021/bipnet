<!-- resources/views/oportunidades/show.blade.php -->
@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4">Detalles de la Oportunidad de Venta</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $oportunidad->nombre }}</h5>
                        <p class="card-text">
                            <strong>Fecha Inicio:</strong> {{ $oportunidad->fecha_inicio }}<br>
                            <strong>Monto Esperado:</strong> {{ $oportunidad->monto_esperado }}<br>
                            <strong>Fecha Estimada de Cierre:</strong> {{ $oportunidad->fecha_estimada_cierre }}<br>
                            <strong>Cliente:</strong> {{ optional($oportunidad->cliente)->nombre }}<br>
                            <strong>Empleado:</strong> {{ optional($oportunidad->empleado)->name }}<br>
                            <strong>Estado:</strong> {{ optional($oportunidad->estado)->nombre }}
                        </p>
                        <!-- Puedes agregar más detalles según sea necesario -->
                    </div>
                </div>
                <a href="{{ route('oportunidades.index') }}" class="btn btn-primary mt-3">Volver</a>
            </div>
        </div>
    </div>
@endsection
