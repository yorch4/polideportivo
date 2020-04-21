@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar a {{$user->email}}</h5></div>
        <div class="card-body mt-3">
            <form method="POST" enctype="multipart/form-data" action="">
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
                                <span id="error" class="invalid-feedback" role="alert" style="display: none">
                                <strong>Tipo de imagen inválido</strong>
                            </span>
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
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="role" id="role">
                                    <option value="basic" @if($user->role == 'basic') selected @endif>Basic</option>
                                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="email_verified_at" value="1" type="checkbox" @if($user->email_verified_at != NULL) checked @endif id="emailVerificado">
                    <label class="form-check-label" for="emailVerificado">
                        Email verificado
                    </label>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <a class="btn btn-secundary" href="{{url('/control/usuarios')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{url('js/validate-modify-img.js')}}"></script>
@endsection
