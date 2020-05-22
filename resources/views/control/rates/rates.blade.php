@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <input name="email" class="form-control mr-sm-2" placeholder="Filtrar por email" type="search" aria-label="Search by Email">
                <input name="juego" class="form-control mr-sm-2" placeholder="Filtrar por juego" type="search" aria-label="Search by Game">
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{url('/control/valoraciones/anadir')}}">Añadir valoración</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
        @foreach($rates as $rate)
            <div class="col-xl-6">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1>Valoración {{$rate->id}}</h1>
                        <p class="m-0"><i class="fas fa-user mr-2"></i>{{$rate->user->email}}</p>
                        <p class="m-0"><i class="fas fa-basketball-ball mr-2"></i>{{$rate->field->game}} Campo {{$rate->field->field_number}}</p>
                        <p class="m-0"><i class="fas fa-comment mr-2"></i>{{$rate->comment}}</p>
                        <p class="m-0"><i class="fas fa-star mr-2"></i>{{$rate->rate}}</p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{$rate->created_at}}</p>
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/valoraciones/eliminar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$rate->id}}">
                                    <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/valoraciones/modificar', ['id' => $rate->id])}}">
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
                {{$rates->links()}}
            </div>
        </div>
    </div>
@endsection
