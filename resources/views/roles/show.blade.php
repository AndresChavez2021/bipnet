@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Ver Roles</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('roles.index') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('roles.partials.form')
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
