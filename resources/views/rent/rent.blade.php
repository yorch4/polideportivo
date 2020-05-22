@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-light mt-3">
        <div class="w-100">
            <form class="form-inline float-right">
                <select name="juego" class="form-control mr-sm-2" aria-label="Search">
                    <option value="" selected>Todos</option>
                    @foreach($searchFields as $searchField)
                        <option value="{{$searchField->game}}">{{$searchField->game}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secundary my-2 my-sm-0" type="submit">Filtrar</button>
            </form>
        </div>
    </nav>
    <div class="row mb-4">
    @foreach($fields as $field)
          <div class="col-sm-6 col-article mx-auto">
              <a href="{{url('/reservas', ['id' => $field->id])}}">
                  <div class="row mt-3 border">
                      <div class="col-xl-3 mt-3">
                          <div class="text-center border">
                              <?php $img = base64_decode($field->img) ?>
                              <img class="img-fluid img-fields" src="{{$img}}">
                          </div><br>
                      </div>
                      <div class="col-xl-9 text-left mt-xl-3">
                          <div class="tab-content">
                              <h1 class="h3">{{$field->game}} Campo {{$field->field_number}}</h1>
                              <p class="m-0"><i class="fas fa-euro-sign mr-2"></i>{{$field->price}}</p>
                              <p class="m-0"><i class="fas fa-star mr-2"></i>
                              @if(\App\Rate::where('field_id', $field->id)->count() <= 0)
                                      Aún no se han hecho valoraciones de este campo
                              @else
                                  <?php
                                  $valoraciones = \App\Rate::where('field_id', $field->id)->count();
                                  $media =  (\App\Rate::where('field_id', $field->id)->sum('rate') / $valoraciones);
                                  ?>
                                  {{$media}}
                                  @endif
                              </p>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
    @endforeach
    </div>
@endsection
