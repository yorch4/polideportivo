@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar alquiler {{$rent->id}}</h5></div>
            <div class="card-body mt-3">
                <form method="POST" enctype="multipart/form-data" action="{{url('/control/alquileres/modificar-siguiente')}}">
                    @csrf
                    @if($errors->any())
                        <div class="row mb-4">
                            <div class="col">
                                <span class="text-danger">*{{$errors->first()}}</span>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$rent->user->email}}" required autocomplete="email" autofocus onblur="document.form1.email.value = this.value;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$rent->id}}">
                    <div class="form-group text-center mt-5 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Siguiente
                        </button>
                    </div>
                </form>
                <form name="form1" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="form-group text-center mt-5 mb-3">
                        <a class="btn btn-secundary" href="{{url('/control/alquileres')}}">Cancelar</a>
                        <input type="hidden" name="email">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
    </div>
@endsection
