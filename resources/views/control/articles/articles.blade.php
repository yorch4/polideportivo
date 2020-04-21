@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <input name="titular" class="form-control mr-sm-2" type="search" placeholder="Filtrar por titular" aria-label="Search">
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col-sm-3">
                <a class="btn btn-primary" href="{{url('/control/noticias/anadir')}}">Añadir noticia</a>
            </div>
        </div>
        @foreach($articles as $article)
            <div class="row">
                <div class="col-md-3">
                    <div class="text-center">
                        <?php $img =  base64_decode($article->img) ?>
                        <img src="{{url($img)}}" class="img-circle img-thumbnail img-users" alt="imagen de noticia">
                    </div><br>
                </div>
                <div class="col-md-9 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1>{{$article->headline}}</h1>
                        <p class="m-0 mb-2"><i class="fas fa-file-alt mr-2"></i>{{$article->body}}</p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{date('d-m-Y', strtotime($article->created_at))}}</p>
                        <br>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/noticias/eliminar')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$article->id}}">
                                    <input class="btn btn-primary" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminarlo?')" type="submit">
                                </form>
                            </li>
                            <li class="list-inline-item">
                                <form class="form" action="{{url('/control/noticias/modificar', ['id' => $article->id])}}">
                                    <input class="btn btn-secundary" name="modificar" value="Modificar" type="submit">
                                </form>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{$articles->links()}}
            </div>
        </div>
    </div>
@endsection
