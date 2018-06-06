@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mantenimiento</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <h3>Historial de ordenes</h3>
                        <a href="{{ url('/crear-orden') }}" class="btn btn-info">
                            Crear Orden
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Descripción
                                </th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>orden registrada número 1 </td>
                                <td> 2018/05/03 20:30 </td>
                                <td>
                                    <span>en tramite</span>
                                </td>
                                <td>
                                    <a href="{{ url('/crear-orden') }}">Continuar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>orden registrada número 1 </td>
                                <td> 2018/05/03 20:30 </td>
                                <td>
                                    <span>Finalizado</span>
                                </td>
                                <td>
                                    <a href="{{ url('/crear-orden') }}">ver</a>
                                </td>
                            </tr>
                            <tr>
                                <td>orden registrada número 1 </td>
                                <td> 2018/05/03 20:30 </td>
                                <td>
                                    <span>Finalizado</span>
                                </td>
                                <td>
                                    <a href="{{ url('/crear-orden') }}">ver</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
