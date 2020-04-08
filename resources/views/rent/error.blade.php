@extends('layouts.master')
@section('content')
    <div class="text-center my-4">
        <h1 class="text-dark">Lamentamos las molestias</h1>
        <p class="text-danger">{{$error}}</p>
        <a href="{{url('/reservas')}}">Pulse aquí para volver</a>
    </div>
@endsection
