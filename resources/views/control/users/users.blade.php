@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <input name="apellidos" class="form-control mr-sm-2" type="search" placeholder="Filtrar por apellidos" aria-label="Search">
                <input name="email" class="form-control mr-sm-2" type="search" placeholder="Filtrar por email" aria-label="Search">
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row mb-2">
            <div class="col-sm-3">
                <a class="btn btn-primary" href="{{url('/control/usuarios/anadir')}}">Añadir usuario</a>
            </div>
        </div>
        <div class="row">
        @foreach($users as $user)
            <div class="col-xl-6">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <?php $img =  base64_decode($user->img) ?>
                    <img src="{{url($img)}}" class="img-circle img-thumbnail img-users" alt="imagen de {{$user->name}}">
                </div><br>
            </div>
            <div class="col-md-9 text-left">
                <div class="tab-content">
                    <hr>
                    <h1>{{$user->email}}</h1>
                    <p class="m-0"><i class="fas fa-user mr-2"></i>{{$user->name}}</p>
                    <p class="m-0"><i class="fas fa-user mr-2"></i>{{$user->last_name}}</p>
                    <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{$user->created_at}}</p>
                    <p class="m-0"><i class="fas fa-user-check mr-2"></i>
                    @if($user->is_verified == 0)
                            <i class="fas fa-times"></i>
                    @else
                            <i class="fas fa-check"></i>
                    @endif
                    </p>
                    <p class="m-0"><i class="fas fa-user-tag mr-2"></i>{{$user->role}}</p>
                    <br>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <form class="form" action="{{url('/control/usuarios/eliminar')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                                <input class="btn btn-primary" name="eliminar" value="Eliminar" disabled  type="submit">
                                @else
                                <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                @endif
                            </form>
                        </li>
                        <li class="list-inline-item">
                            <form class="form" action="{{url('/control/usuarios/modificar', ['id' => $user->id])}}">
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
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
