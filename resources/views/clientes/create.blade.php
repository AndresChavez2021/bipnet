@extends('layouts.app-master')
@section('content')
    <br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"></span>
                        <h1>REGISTRAR NUEVO CLIENTE</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('clientes.partials.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
