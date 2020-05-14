@extends('layouts.master')
@section('content')
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
                          </div>
                      </div>
                  </div>
              </a>
          </div>
    @endforeach
    </div>
@endsection
