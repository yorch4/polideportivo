@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar {{$facility->name}}</h5></div>
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
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$facility->name}}" required autocomplete="name" autofocus>
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
                            <label for="description">Descripción</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ $facility->description }}</textarea>
                            @error('description')
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
                            <label for="timetable">Horario</label>
                            <input id="timetable" type="text" class="form-control @error('timetable') is-invalid @enderror" name="timetable" value="{{ $facility->timetable }}" required autocomplete="timetable">
                            @error('timetable')
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
                            <label for="normal_price">Precio normal</label>
                            <input id="normal_price" type="number" step="0.01" min="0" value="{{$facility->normal_price}}" class="form-control @error('normal_price') is-invalid @enderror" name="normal_price" required autocomplete="normal_price">
                            @error('normal_price')
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
                            <label for="sub_price">Precio de abonado</label>
                            <input id="sub_price" type="number" step="0.01" min="0" value="{{$facility->sub_price}}" class="form-control @error('sub_price') is-invalid @enderror" name="sub_price" required autocomplete="sub_price">
                            @error('sub_price')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <a class="btn btn-secundary" href="{{url('/control/instalaciones')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
