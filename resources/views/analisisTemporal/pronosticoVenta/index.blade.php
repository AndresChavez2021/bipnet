@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-4">Pronóstico de Venta</h1>
                    <a href="{{ route('pronostico-ventas.create') }}" class="btn btn-secondary">Crear Oportunidad</a>
                </div>

                <hr>
                <!-- Formulario de filtro por estado -->
                <form method="GET" action="{{ route('oportunidades.index') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="estado">Filtrar por Estado:</label>
                        <select name="estado">
                          {{--   <option value="" selected disabled>Seleccionar Estado</option>
                            @foreach ($estados as $id => $nombre)
                                <option value="{{ $id }}">{{ $nombre }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                </form>
                <hr>
              {{--   <div class="row">
                    @foreach ($oportunidades as $oportunidad)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $oportunidad->nombre }}</h5>
                                    <hr>
                                    <p class="card-text">
                                        <strong>Fecha Inicio:</strong> {{ $oportunidad->fecha_inicio }}<br>
                                        <strong>Monto Esperado:</strong> {{ $oportunidad->monto_esperado }}<br>
                                        <strong>Fecha Estimada de Cierre:</strong> {{ $oportunidad->fecha_estimada_cierre }}<br>
                                        <strong>Cliente:</strong> {{ optional($oportunidad->cliente)->nombre }}<br>
                                        <strong>Empleado:</strong> {{ optional($oportunidad->empleado)->name }}<br>
                                        <hr>
                                        <strong>Estado:</strong> {{ optional($oportunidad->estado)->nombre }}
                                        <hr>
                                    </p>
                                    <div class="btn-group">
                                        <button type="button" class=" btn btn-secondary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('oportunidades.show', $oportunidad->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> Informacion
                                            </a>
                                            <a class="dropdown-item" href="{{ route('oportunidades.edit', $oportunidad->id) }}">
                                                <i class="fa fa-fw fa-pencil-alt"></i> Editar
                                            </a>
                                            <!-- Agrega más acciones según sea necesario -->
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('actividades.index', ['idOportunidad' => $oportunidad->id]) }}">
                                                <i class="fa fa-fw fa-list"></i> Ver Actividades
                                            </a>
                                            <a class="dropdown-item" href="{{ route('actividades.create', ['idOportunidad' => $oportunidad->id]) }}">
                                                <i class="fa fa-fw fa-plus"></i> Crear Actividad
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('cotizaciones.index', ['idOportunidad' => $oportunidad->id]) }}">
                                                <i class="fa fa-fw fa-search"></i> Ver Cotizaciones
                                            </a>
                                            <a class="dropdown-item" href="{{ route('cotizaciones.create', ['idOportunidad' => $oportunidad->id, 'estadoId' => $oportunidad->estado->id]) }}">
                                                <i class="fa fa-fw fa-file-alt"></i> Crear Cotización
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
    </div>
@endsection
