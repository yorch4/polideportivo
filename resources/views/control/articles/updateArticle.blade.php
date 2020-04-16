@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar Noticia</h5></div>
        <div class="card-body mt-3">
            <form method="POST" enctype="multipart/form-data" action="">
                @csrf
                @if($errors->any())
                    <div class="row mb-4">
                        <div class="col">
                            <span class="text-danger">*{{$errors->first()}}</span>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col text-center mb-3">
                        <?php $img = base64_decode($article->img) ?>
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
                            <label for="headline">Titular</label>
                            <input id="headline" type="text" class="form-control @error('headline') is-invalid @enderror" name="headline" value="{{$article->headline}}" required autocomplete="headline" autofocus>
                            @error('headline')
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
                            <label for="body">Cuerpo</label>
                            <textarea id="body" style="height: 8rem;" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body">{{ $article->body }}</textarea>
                            @error('body')
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
                            <label for="created_at">Fecha</label>
                            <input id="created_at" type="date" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="<?php echo date('Y-m-d', strtotime($article->created_at)) ?>" required autocomplete="created_at" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <a class="btn btn-secundary" href="{{url('/control/noticias')}}">Cancelar</a>
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
