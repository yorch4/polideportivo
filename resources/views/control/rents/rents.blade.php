@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <input name="email" class="form-control mr-sm-2" placeholder="Filtrar por email" type="search" aria-label="Search by Email">
                <input name="juego" class="form-control mr-sm-2" placeholder="Filtrar por juego" type="search" aria-label="Search by Game">
                <input name="fecha" class="form-control mr-sm-2" type="date" aria-label="Search by Date">
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mb-2">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{url('/control/alquileres/anadir')}}">Añadir alquiler</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
        @foreach($rents as $rent)
            <div class="col-xl-6">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1>Alquiler {{$rent->id}}</h1>
                        <p class="m-0"><i class="fas fa-user mr-2"></i>{{$rent->user->email}}</p>
                        <p class="m-0"><i class="fas fa-basketball-ball mr-2"></i>{{$rent->field->game}} Campo {{$rent->field->field_number}}</p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{$rent->day}}</p>
                        <p class="m-0"><i class="fas fa-clock mr-2"></i>{{$rent->section}}</p>
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/alquileres/eliminar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$rent->id}}">
                                    <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/alquileres/modificar', ['id' => $rent->id])}}">
                                    <input class="btn btn-secundary" name="modificar" value="Modificar" type="submit">
                                </form>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{$rents->links()}}
            </div>
        </div>
    </div>
@endsection
