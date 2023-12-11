<!-- resources/views/oportunidades/edit.blade.php -->
@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4">Editar Oportunidad de Venta</h1>
                <form action="{{ route('actividades.update', $actividad->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('actividades.partials.form', ['oportunidad' => $oportunidad])
                </form>
            </div>
        </div>
    </div>
@endsection
