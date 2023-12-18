@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1> Editar Usuario</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('users.index') }}" class="btn btn-secondary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data" id="update">
                @method('PUT')
                @include('users.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-secondary" form="update">
                <i class="fas fa-pencil-alt"></i> Editar
            </Button>
        </div>
    </div>
@endsection
