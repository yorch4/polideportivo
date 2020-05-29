
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-3">
                    <div class="card-header">{{ __('Verifica tu correo') }}</div>

                    <div class="card-body text-dark">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado un link de confirmación a tu correo electrónico.') }}
                            </div>
                        @endif

                        {{ __('Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.') }}
                        {{ __('Si no has recibido el email,') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn-primary p-0 m-0 align-baseline">{{ __('haz click aquí para pedir otro') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
