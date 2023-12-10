@extends('layouts.app-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de Etiquetas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn btn-success btn-sm float-right"
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
                            <table id="estados" class="table table-striped dt-responsive nowrap">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>

                                        <th>tipo Oportunidad</th>
                                        
                                        <th>tipo Cotizacion</th>
                                        
                                        <th>tipo Venta       </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                     $valor = 1;
                                    ?>

                                    @foreach ($estados as $estado)
                                        <tr>
                                            <th scope="row">{{ $valor++ }}</th>
                                            <td>{{ $estado->nombre }}</td>

                                            <td>{{ $estado->tipo_O }}</td>

                                            <td>{{ $estado->tipo_C }}</td>

                                            <td>{{ $estado->tipo_V }}</td>

                                            <td>
                                                <form action="{{ route('estados.destroy', $estado->id) }}"
                                                    method="POST">
                                                    
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('estados.edit', $estado->id) }}"><i
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
        $('#estados').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
