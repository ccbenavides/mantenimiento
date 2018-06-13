@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">Administrador</div> -->

                <div class="card-body">
                    <div>
                        <a href="{{ route('excelCantidadRequerimientos')}}" class="btn btn-info">Cantidad de requerimientos por tienda</a>
                        <a href="{{ route('excelCantidadCausas')}}" class="btn btn-info">Cantidad de causas de fallas</a>
                        <a href="{{ route('excelCantidadTipos')}}" class="btn btn-info">Cantidad de tipos de fallas</a>
                    </div>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Orden Número</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Termino</th>
                                <th>Fecha de Registro</th>
                                <th>Fecha de actualización</th>
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
                            <td>{{ $orden->created_at}}</td>
                            <td>{{ $orden->updated_at}}</td>
                            <td>
                                <a  href="{{ url('/orden/'. $orden->id ) }}">{{ $orden->estado == "completado" ? 'Ver' : 'Continuar' }} </a>
                                {{--
                                |
                                <a  href="#">pdf</a>
                                --}}
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
