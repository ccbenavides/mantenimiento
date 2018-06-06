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
                    <section>
                        <div class="flex-header">
                            <img src="{{ asset('friday.png') }}" alt="fridays" />
                            <h3>ORDEN DE SERVICIO - MANTENIMIENTO</h3>
                            <input type="text">
                        </div>
                        <form action="" class="form-orden">
                            <div class="flex first-line">
                                <span>TECNICO</span>
                                <input type="text" />
                                <span>TIENDA</span>
                                <input type="text" />
                            </div>
                            <div class="flex second-line">
                                <span class="width-15">FECHA</span>
                                <input class="width-15" type="text" />
                                <span  class="width-15" >HORA DE INICIO</span>
                                <input class="width-20" type="text" />
                                <span class="width-15" >HORA DE TERMINO</span>
                                <input class="width-20" type="text" />
                            </div>

                            <div class="flex second-line">
                                <span class="width-15">TIPO</span>
                                <select class="width-15" name="" id="">
                                    <option value="">MP</option>
                                    <option value="">MC</option>
                                    <option value="">MB</option>
                                </select>
                                <span class="width-15">HORA DE PARADA</span>
                                <input  class="width-20" type="text" />
                                <span class="width-15">HORA DE ARRANQUE</span>
                                <input  class="width-20" type="text" />
                            </div>
                            <div class="flex">
                                <span class="width-25">REQUERIMIENTO</span>
                                <input class="width-75" type="text">
                            </div>
                            <div class="flex">
                                <span class="width-25">EQUIPO/INSTALACIÓN</span>
                                <input class="width-75" type="text">
                            </div>
                            <div class="flex">
                                <span class="width-45">DESCRIPCIÓN DE TRABAJO Y OBSERVACIONES</span>
                                <input type="text" class="width-15">
                                <span class="width-15">CODIGO</span>
                                <input type="text" class="width-25">
                            </div>
                            <div>
                                <textarea name="" class="description" id="" 
                                            cols="30" rows="5"></textarea>
                            </div>
                            <div class="flex justify">
                                <div class="width-49">
                                    <div class="flex">
                                        <span class="width-100">CAUSA DE FALLA</span>                                    
                                    </div>
                                    <br />
                                    @foreach($causas as $causa)
                                        <div class="flex">
                                            <input type="checkbox" class="width-10" />
                                            <label class="width-90">{{ $causa->description }}</label>
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
                                            <input type="checkbox" class="width-10" />
                                            <label class="width-40">{{ $tipo->description }}</label>
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
                                <input class="width-70" type="text">
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
                                <input type="submit" class="btn btn-info btn-lg" value="Guardar Orden"> 
                                <input type="submit" class="btn btn-success btn-lg" value="Enviar Orden"> 
                            </div>
                        </form>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                        Saepe veritatis qui ipsam eum inventore at impedit, maxime, 
                        hic reprehenderit quisquam beatae quos ducimus. Minima ulla
                        m perspiciatis est voluptates, explicabo sunt?
                    </section>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
