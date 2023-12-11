<!-- resources/views/oportunidades/edit.blade.php -->
@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4">Editar Oportunidad de Venta</h1>
                <form action="{{ route('oportunidades.update', $oportunidad->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('oportunidades.partials.form', ['oportunidad' => $oportunidad])
                </form>
            </div>
        </div>
    </div>
@endsection
