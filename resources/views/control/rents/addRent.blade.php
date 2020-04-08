@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Añadir Alquiler</h5></div>

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
                            <label for="email">Email Usuario</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
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
                            <label for="field_id">Campo</label>
                            <select id="field_id" name="field_id" class="form-control">
                                @foreach($fields as $field)
                                    <option value="{{$field->id}}">{{$field->game}} Campo {{$field->field_number}}</option>
                                @endforeach
                            </select>
                            @error('field_id')
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
                            <label for="day">Fecha</label>
                            <input id="day" type="date" class="form-control" name="day" value="{{ old('day') }}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary">
                        Siguiente
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
