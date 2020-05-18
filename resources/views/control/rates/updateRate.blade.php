@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar Valoración</h5></div>
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
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$rate->user->email}}" required autocomplete="email" autofocus>
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
                                    <option value="{{$field->id}}" @if($field->id == $rate->field_id) selected @endif>{{$field->game}} Campo {{$field->field_number}}</option>
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
                            <label for="comment">Comentario</label>
                            <textarea id="comment" style="height: 8rem;" class="form-control @error('comment') is-invalid @enderror" name="comment" required autocomplete="comment">{{ $rate->comment }}</textarea>
                            @error('comment')
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
                            <label for="rate">Estrellas</label>
                            <input id="rate" type="number" min="1" max="5" value="{{$rate->rate}}" class="form-control @error('rate') is-invalid @enderror" name="rate" required autocomplete="rate">
                            @error('rate')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <a class="btn btn-secundary" href="{{url('/control/valoraciones')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
