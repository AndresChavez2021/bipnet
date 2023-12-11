@extends('layouts.app-master')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<div style="display: flex; justify-content: space-between; align-items: center;">
<span id="card_title">
Detalles de Oportunidad de Venta
</span>
<div class="float-right">
<a href="{{ route('oportunidades.index') }}" class="btn btn-secondary btn-sm float-right"
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
<th>Nombre</th>
<td>{{ $oportunidad->nombre }}</td>
</tr>
<tr>
<th>Fecha Inicio</th>
<td>{{ $oportunidad->fecha_inicio }}</td>
</tr>
<tr>
<th>Monto Esperado</th>
<td>{{ $oportunidad->monto_esperado }}</td>
</tr>
<tr>
<th>Fecha Estimada de Cierre</th>
<td>{{ $oportunidad->fecha_estimada_cierre }}</td>
</tr>
<tr>
<th>Cliente</th>
<td>{{ optional($oportunidad->cliente)->nombre }}</td>
</tr>
<tr>
<th>Empleado</th>
<td>{{ optional($oportunidad->empleado)->name }}</td>
</tr>
<tr>
<th>Estado</th>
<td>{{ optional($oportunidad->estado)->nombre }}</td>
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