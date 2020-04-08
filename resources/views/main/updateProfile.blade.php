@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar a {{$user->email}}</h5></div>
        <div class="card-body mt-3">
            <form method="POST" enctype="multipart/form-data" action="{{url('/perfil/confirmarModificar')}}">
                @csrf
                <div class="row">
                    <div class="col text-center mb-3">
                        <?php $img = base64_decode($user->img) ?>
                        <div class="form-group image-upload">
                            <label for="img" class="wrapper">
                                <img class="img-circle img-thumbnail img-perfil image-upload-img" src="{{url($img)}}"/>
                                <div class="overlay">
                                    <i class="icon fas fa-search-plus"></i>
                                </div>
                            </label>
                            <p id="pOculto" class="mb-0 text-success" style="visibility: hidden; font-size: 1rem;"><i class="far fa-check-circle"> Archivo cargado con éxito</i></p>
                            <input id="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" name="img">
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Contraseña (dejar en blanco para dejarla por defecto)</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <a class="btn btn-secundary" href="{{url('/perfil')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                $('#pOculto').css('visibility', 'visible');
            });
        });
    </script>
@endsection
