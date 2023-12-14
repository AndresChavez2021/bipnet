@extends('layouts.app-master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                             
                                <h1>Clientes</h1>
                            </span>

                            @can('users.create')
                                <div class="float-right">
                                    <a href="{{ route('clientes.create') }}" class="btn btn-success btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            @endcan

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usuarios" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>nombre</th>
                                        <th>Informacion</th>
                                        <th>Email</th>
                                        <th>phone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 0;
                                   ?>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->info_contacto }}</td>
                                            <td>{{ $cliente->correo }}</td>
                                            <td>{{ $cliente->phone }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                    @can('users.show')
                                                        <a class="btn btn-sm btn-dark "
                                                            href="{{ route('clientes.show', $cliente->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                    @endcan
                                                    @can('users.edit')
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('clientes.edit', $cliente->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('users.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!} --}}
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
        $('#usuarios').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
