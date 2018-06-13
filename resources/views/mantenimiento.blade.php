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
                                <th>Orden Número</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Termino</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ordenes as $orden)
                            <tr>
                                <td>#{{ $orden->numero_orden }} </td>
                                <td>{{ $orden->fecha  }}</td>
                                <td>{{ $orden->hora_inicio }}</td>
                                <td>{{ $orden->hora_termino }}</td>
                                <td>
                                    <span>{{ $orden->estado }}</span>
                                </td>
                                <td>
                                    <a href="{{ url('/orden/'. $orden->id ) }}">{{ $orden->estado == "completado" ? 'Ver' : 'Continuar' }} </a>
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
@endsection
