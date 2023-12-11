@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <h1>Actividades</h1>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('actividades.create') }}" class="btn btn-secondary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="actividades" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Referencia</th>

                                        <th>Fecha</th>
                                        <th>oportunidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                     $valor = 1;
                                    ?>

                                    @foreach ($actividades as $actividad)
                                        <tr>
                                            <th scope="row">{{ $valor++ }}</th>
                                            <td>{{ $actividad->nombre }}</td>
                                            <td>{{ $actividad->fecha }}</td>
                                            <td>{{ $actividad->oportunidadDeVenta->nombre }}</td>
                                            <td>
                                                <form action="{{ route('actividades.destroy', $actividad->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-dark "
                                                    href="{{ route('actividades.show', $actividad->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('actividades.edit', $actividad->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#actividades').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
