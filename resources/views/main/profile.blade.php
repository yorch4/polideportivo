@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row mt-4 mx-auto">
                <div class="col-xl-3">
                    <div class="text-center">
                        <?php $img = base64_decode($user->img) ?>
                        <img src="{{url($img)}}" class="img-circle img-thumbnail img-perfil" alt="imagen de perfil del usuario">
                    </div><br>
                </div>
                <div class="col-xl-9 text-left">
                    <div class="tab-content">
                        <hr>
                        <h1 class="h3">{{$user->name}} {{$user->last_name}}</h1>
                        <p class="m-0"><i class="fas fa-mail-bulk mr-2"></i>{{$user->email}}</p>
                        <p class="m-0"><i class="fas fa-calendar-alt mr-2"></i>{{$user->created_at}}</p>
                        <form action="{{url('/perfil/modificar')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <button class="btn btn-primary mt-3" type="submit">Modificar Perfil</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row my-5">
        <div class="col text-center">
            <section class="table-responsive">
                <h1>HISTORIAL DE RESERVAS</h1>
                @if(count($user->rents) > 0)
                <table class="table table-hover mt-5">
                    <thead>
                    <tr>
                        <th>Día</th>
                        <th>Hora</th>
                        <th>Campo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->rents as $rent)
                    <tr>
                        <td>{{$rent->day}}</td>
                        <td>{{$rent->section}}</td>
                        <td>{{$rent->field->game}} Campo {{$rent->field->field_number}}</td>
                        @if($rent->day >= date('Y-m-d') && strtotime(substr($rent->section, 0, -6)) - 7000 > time())
                        <td>
                            <form action="{{url('/anular-reserva')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$rent->id}}" name="id">
                                <input type="submit" value="Anular Reserva" class="btn btn-primary mt-3" onclick="return confirm('¿Estás seguro de anularla?')">
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
               @else
                    <h2>Aún no has hecho ninguna reserva</h2>
                @endif
            </section>
        </div>
    </div>
@endsection
