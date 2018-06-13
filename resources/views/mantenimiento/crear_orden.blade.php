@extends('layouts.app')


@section('extra-css')
<style>

.flex-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.flex{
    display: flex;
    margin-bottom: 1px;
}
.wraper{
    flex-flow: row wrap;
}
.justify{
    justify-content: space-between;
}
.form-orden{
    margin: 30px 0;
}
.form-orden p{
    margin: 0;
}
.form-orden span{
    background : #333;
    -webkit-print-color-adjust: exact; 
    color: #f1f1f1;
    padding: 7px;
    font-weight: bold;
}
.form-orden input{
    padding: 5px;
}
.btn{
    font-weight: bold !important;
}
.first-line > span{
    width: 15%;
}
.first-line > input{
    width: 35%;
}

.description{
    width: 100%;
    overflow: hidden;
    padding: 10px;
}
.width-10{ width: 10%; }
.width-15{ width: 15%; }
.width-20{ width: 20%; }
.width-25{ width: 25%; }
.width-30{ width: 30%; }
.width-35{ width: 35%; }
.width-40{ width: 40% }
.width-45{ width: 45%; }
.width-49{ width: 49%; }
.width-50{ width: 50%; }
.width-55{ width: 55%; }
.width-60{ width: 60%; }
.width-65{ width: 65%; }
.width-70{ width: 70%; }
.width-75{ width: 75%; }
.width-90{ width: 90%; }
.width-100{ width: 100%;} 



</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header no-print">Mantenimiento</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ request('id')  ?   url('/update-orden/'. $orden->id ) : route('guardar-orden') }}" id="formulario" method="POST">
                        @csrf
                        @if(request('id'))
                        <input type="hidden" name="_method" value="put" />
                        @endif 
                        <div class="flex-header">
                            <img src="{{ asset('friday.png') }}" alt="fridays" />
                            <h3>ORDEN DE SERVICIO - MANTENIMIENTO</h3>
                            <input type="text" name="numero_orden" value="{{ $orden->numero_orden }}">
                        </div>
                        <div class="form-orden">
                                
                                <input type="hidden" name="user_id" value="{{ $user->id ? $user->id : Auth::user()->id }}" />
                            <div class="flex">
                                <span class="width-15">TECNICO</span>
                                <input class="width-35" type="text" name="tecnico" disabled value="{{ $user->nombres_completos ?  $user->nombres_completos : Auth::user()->nombres_completos }}"/>
                                <span class="width-15" >TIENDA</span>
                                <select name="tienda_id" class="width-35" id="">
                                    @foreach($tiendas as $tienda)
                                    <option value="{{$tienda->id}}" {{ $orden->tienda_id == $tienda->id ? "selected" : ""}} >{{ $tienda->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="flex second-line">
                                <span class="width-15">FECHA</span>
                                <input class="width-15" name="fecha" type="date"  value="{{ $orden->fecha ? $orden->fecha : date('Y\-m\-d') }}"/>
                                <span  class="width-20" >HORA DE INICIO</span>
                                <input class="width-15" type="text"  value="{{ $orden->hora_inicio }}" name="hora_inicio" />
                                <span class="width-20" >HORA DE TERMINO</span>
                                <input class="width-15" type="text"  value="{{ $orden->hora_termino }}" name="hora_termino" />
                            </div>

                            <div class="flex second-line">
                                <span class="width-15">TIPO</span>
                                <select class="width-15" name="tipo" id="">
                                    <option value="MP" {{ $orden->tipo == "MP" ? "selected" : ""}}>MP</option>
                                    <option value="MC" {{ $orden->tipo == "MC" ? "selected" : ""}}>MC</option>
                                    <option value="MB" {{ $orden->tipo == "MB" ? "selected" : ""}}>MB</option>
                                </select>
                                <span class="width-20">HORA DE PARADA</span>
                                <input  class="width-15" name="hora_parada" value="{{ $orden->hora_parada }}" type="text" />
                                <span class="width-20">HORA DE ARRANQUE</span>
                                <input  class="width-15" name="hora_arranque" value="{{ $orden->hora_arranque }}" type="text" />
                            </div>
                            <div class="flex">
                                <span class="width-25">REQUERIMIENTO</span>
                                <input class="width-75"  name="requerimiento" value="{{ $orden->requerimiento }}" type="text">
                            </div>
                            <div class="flex">
                                <span class="width-25">EQUIPO/INSTALACIÓN</span>
                                <input class="width-75" name="equipo" value="{{ $orden->equipo }}" type="text">
                            </div>
                            <div class="flex">
                                <span class="width-45">DESCRIPCIÓN DE TRABAJO Y OBSERVACIONES</span>
                                <input type="text" disabled class="width-15">
                                <span class="width-15">CODIGO</span>
                                <input type="text" class="width-25" name="codigo"  value="{{ $orden->codigo }}">
                            </div>
                            <div>
                                <textarea name="descripcion" class="description" id="" 
                                            cols="30" rows="5">{{ $orden->descripcion }}</textarea>
                            </div>
                            <div class="flex justify">
                                <div class="width-49">
                                    <div class="flex">
                                        <span class="width-100">CAUSA DE FALLA</span>                                    
                                    </div>
                                    <br />
                                    
                                    @foreach($causas as $causa)
                                        <div class="flex">
                                            <input type="checkbox" value="{{ $causa->id }}" 
                                            {{ in_array($causa->id, $orden->causas)? 'checked' : ''}}
                                            name="causas[]" 
                                            id="causas_{{ $causa->id}}"  class="width-10" />
                                            <label class="width-90" for="causas_{{ $causa->id}}">{{ $causa->description }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="width-49">
                                    <div class="flex">
                                        <span class="width-100">TIPO DE FALLA</span>
                                    </div>
                                    <br />
                                    <div class="flex wraper">
                                    @foreach($tipos as $tipo)
                                            <input type="checkbox" value="{{ $tipo->id }}" 
                                            {{ in_array($tipo->id, $orden->tipos)? 'checked' : ''}}
                                            name="tipos[]" id="tipos_{{ $tipo->id}}" class="width-10" />
                                            <label class="width-40" for="tipos_{{ $tipo->id}}">{{ $tipo->description }}</label>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <br /> 
                            <h3>Consumos</h3>
                            <br />
                            <div class="flex">
                                <span class="width-70">REPUESTOS</span>
                                <span class="width-15">CANTIDAD</span>
                                <span class="width-15">COSTO</span>
                            </div>
                            <div class="flex">
                                <input class="width-70" name="" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>
                            <div class="flex">
                                <input class="width-70" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>
                            <div class="flex">
                                <input class="width-70" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>
                            <br />
                            <div class="flex">
                                <span class="width-70">MOVILIDAD</span>
                                <span class="width-15">TIEMPO</span>
                                <span class="width-15">COSTO</span>
                            </div>
                            <div class="flex">
                                <input class="width-35" placeholder="DE" type="text">
                                <input class="width-35" placeholder="A" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>

                            <div class="flex">
                                <input class="width-35" placeholder="DE" type="text">
                                <input class="width-35" placeholder="A" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>

                            <div class="flex">
                                <input class="width-35" placeholder="DE" type="text">
                                <input class="width-35" placeholder="A" type="text">
                                <input class="width-15" type="text">
                                <input class="width-15" type="text">
                            </div>
                            <br>
                            <div class="text-right no-print">
                                <input type="hidden" value="" name="estado" id="estado">
                                @if($orden->estado !== 'completado')
                                    <a href="#" class="btn btn-info btn-lg" id="guardar_orden">Guardar Orden</a> 
                                    <a href="#" class="btn btn-success btn-lg" id="enviar_orden">Enviar Orden</a> 
                                @endif

                                @if(Auth::user()->role == 'admin')
                                    <a class="btn btn-info btn-lg"  onclick="window.print();">Imprimir Orden</a> 
                                @endif
                            </div>
                        </div>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>

$("#guardar_orden").click( e => {
    e.preventDefault();
    $("#estado").val("revision");
    $("#formulario").submit();
}); 
$("#enviar_orden").click( e => {
    e.preventDefault();
    $("#estado").val("completado");
    $("#formulario").submit();
});
</script>
@endsection