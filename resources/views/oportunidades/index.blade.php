@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-4">Oportunidades de Venta</h1>
                    <a href="{{ route('oportunidades.create') }}" class="btn btn-secondary">Crear Oportunidad</a>
                </div>
                
                <hr>
                <!-- Formulario de filtro por estado -->
                <form method="GET" action="{{ route('oportunidades.index') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="estado">Filtrar por Estado:</label>
                        <select name="estado">
                            <option value="" selected disabled>Seleccionar Estado</option>
                            @foreach ($estados as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                </form>
                <hr>
                <div class="row">
                    @foreach ($oportunidades as $oportunidad)
                        <div class="col-lg-4 col-md-6 mb-4">
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
                                    <div class="btn-group">
                                        <a href="{{ route('oportunidades.show', $oportunidad->id) }}" class="btn btn-info" ><i
                                            class="fa fa-fw fa-eye"></i>Show</a>
                                        
                                        <a href="{{ route('oportunidades.edit', $oportunidad->id) }}" class="btn btn-warning">Edit</a>
                                        <!-- <form action="{{ route('oportunidades.destroy', $oportunidad->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>  -->
                                        <a href="{{ route('actividades.index', ['idOportunidad' => $oportunidad->id]) }}" class="btn btn-primary">Ver Actividades</a>
                                        <a href="{{ route('actividades.create', ['idOportunidad' => $oportunidad->id]) }}" class="btn btn-secondary">crear Actividad</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
