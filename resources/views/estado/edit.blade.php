@extends('layouts.app-master')
@section('content')
    <br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estados.update', $estado->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estado.partials.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection