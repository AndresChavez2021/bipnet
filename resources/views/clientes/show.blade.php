@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Ver Clientes</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('clientes.partials.form')
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
