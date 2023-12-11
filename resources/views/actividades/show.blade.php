@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Detalles de Actividad
                            </span>
                            <div class="float-right">
                                <a href="{{ route('actividades.index') }}" class="btn btn-secondary btn-sm float-right"
                                    data-placement="left">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Referencia</th>
                                        <td>{{ $actividad->nombre }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{ $actividad->fecha }}</td>
                                    </tr>
                                    <tr>
                                        <th>Detalles</th>
                                        <td>{{ $actividad->detalles }}</td>
                                    </tr>
                                    <tr>
                                        <th>Oportunidad</th>
                                        <td>{{ optional($actividad->oportunidadDeVenta)->nombre }}</td>
                                    </tr>
                                    <!-- Puedes agregar más campos según tu modelo -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
