@extends('layouts.master')

@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>{{ __('Login') }}</h5></div>

        <div class="card-body mt-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Recuérdame
                        </label>
                    </div>
                </div>

                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        Login
                    </button><br>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            ¿Olvidaste la contraseña?
                        </a>
                    @endif
                </div>
                <div class="text-center">
                    <span class="small">¿Aún no tienes cuenta? <a href="{{url('/register')}}">Sign in</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection
