@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Añadir Noticia</h5></div>

        <div class="card-body mt-3">
            <form method="POST" enctype="multipart/form-data" action="">
                @csrf
                @if(isset($error))
                    <div class="row mb-4">
                        <div class="col">
                            <span class="text-danger">*{{$error}}</span>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="headline">Titular</label>
                            <input id="headline" type="text" class="form-control @error('headline') is-invalid @enderror" name="headline" value="{{ old('headline') }}" required autocomplete="headline" autofocus>
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
                            <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body">{{ old('body') }}</textarea>
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
                            <label for="img">Imagen</label>
                            <input id="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required>
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary">
                        Añadir
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
