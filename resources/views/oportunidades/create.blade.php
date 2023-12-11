<!-- resources/views/oportunidades/create.blade.php -->
@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4">Registrar Oportunidad de Venta</h1>
                <form action="{{ route('oportunidades.store') }}" method="POST">
                    @csrf
                    @include('oportunidades.partials.form')
                    
                </form>
            </div>
        </div>
    </div>
@endsection