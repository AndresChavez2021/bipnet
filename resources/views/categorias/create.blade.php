@extends('layouts.app-master')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                       <h1>Registrar nueva Categoria</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('categorias.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection