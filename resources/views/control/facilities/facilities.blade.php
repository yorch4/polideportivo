@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <input name="nombre" class="form-control mr-sm-2" type="search" placeholder="Filtrar por nombre" aria-label="Search">
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mb-2">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{url('/control/instalaciones/anadir')}}">Añadir instalación</a>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
        @foreach($facilities as $facility)
            <div class="col-xl-6">
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
        </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{$facilities->links()}}
            </div>
        </div>
    </div>
@endsection
