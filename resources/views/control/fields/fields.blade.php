@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <select name="juego" class="form-control mr-sm-2" aria-label="Search">
                    <option value="" selected>Todos</option>
                    @foreach($searchFields as $searchField)
                        <option value="{{$searchField->game}}">{{$searchField->game}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Filtrar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mb-2">
            <div class="col-sm-3">
                <a class="btn btn-primary" href="{{url('/control/campos/anadir')}}">Añadir campo</a>
            </div>
        </div>
        <div class="row">
        @foreach($fields as $field)
            <div class="col-xl-6">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <?php $img =  base64_decode($field->img) ?>
                    <img src="{{url($img)}}" class="img-circle img-thumbnail img-users" alt="imagen de {{$field->game}}">
                </div><br>
            </div>
            <div class="col-md-9 text-left">
                <div class="tab-content">
                    <hr>
                    <h1>{{$field->game}} Campo {{$field->field_number}}</h1>
                    <p class="m-0"><i class="fas fa-euro-sign mr-2"></i>{{$field->price}}</p>
                    <?php $i = 1 ?>
                    @foreach($field->sections as $section)
                        <p class="m-0"><i class="mr-2">{{$i}}</i>{{$section->section}}</p>
                        <?php $i = $i + 1 ?>
                    @endforeach
                    <br>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <form class="form" action="{{url('/control/campos/eliminar')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$field->id}}">
                                <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                            </form>
                        </li>
                        <li class="list-inline-item">
                            <form class="form" action="{{url('/control/campos/modificar', ['id' => $field->id])}}">
                                <input class="btn btn-secundary" name="modificar" value="Modificar" type="submit">
                            </form>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
        </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{$fields->links()}}
            </div>
        </div>
    </div>
@endsection
