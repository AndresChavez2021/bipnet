@extends('layouts.app-master')
@section('content')
    <br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h1>Editar Categoria</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categorias.partials.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection