@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Alquilar pista {{$field->game}} Campo {{$field->field_number}}</h5></div>

        <div class="card-body mt-3">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="date">Elija una fecha</label>
                    <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>
                </div>
                @if(isset($error))
                    <p class="text-danger">{{$error}}</p>
                @endif
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //Enero es 0
        var yyyy = today.getFullYear();
        var max = today.getFullYear()+1;
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        max = max+'-'+mm+'-'+dd;
        document.getElementById("date").setAttribute("min", today);
        document.getElementById("date").setAttribute("max", max);
    </script>
@endsection


