@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{url('/control/instalaciones/anadir')}}">Añadir instalación</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        @foreach($facilities as $facility)
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1>{{$facility->name}}</h1>
                        <p class="m-0"><i class="fas fa-file-alt mr-2"></i>{{$facility->description}}</p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{$facility->timetable}}</p>
                        <p class="m-0"><i class="fas fa-user mr-2"></i>{{$facility->normal_price}}€</p>
                        <p class="m-0"><i class="fas fa-user-plus mr-2"></i>{{$facility->sub_price}}€</p>
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/instalaciones/eliminar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$facility->id}}">
                                    <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/instalaciones/modificar', ['id' => $facility->id])}}">
                                    <input class="btn btn-secundary" name="modificar" value="Modificar" type="submit">
                                </form>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        @endforeach
    </div>
@endsection
