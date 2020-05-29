@extends('layouts.master')

@section('content')
    <div class="row h-100">
        <div class="col-xl-4 h-100">
            <div class="card mx-auto h-100 mt-5">
                <div class="card-header"><h5>Envíanos un mensaje</h5></div>
                <div class="card-body mt-3">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Asunto</label>
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Cuerpo</label>
                                <textarea id="body" type="password" class="form-control" name="body" required autocomplete="body" style="height: 100px"></textarea>
                            </div>
                            <input type="hidden" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email">
                            <div class="form-group text-center mt-5 mb-3">
                                <button type="submit" class="btn btn-primary mb-2">
                                    Enviar
                                </button><br>
                            </div>
                        </form>
                        @else
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="100" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Asunto</label>
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" maxlength="100" autofocus>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Cuerpo</label>
                                <textarea id="body" type="password" class="form-control" name="body" required autocomplete="body" maxlength="300" style="height: 100px"></textarea>
                            </div>
                            <div class="form-group text-center mt-5 mb-3">
                                <button type="submit" class="btn btn-primary mb-2">
                                    Enviar
                                </button><br>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-8 my-4">
            <div class=" ml-2 mt-3 h-100 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5329.698823538623!2d-4.471829640816548!3d37.41210678642089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x49ab0b2753dd9f38!2sPatronato%20Municipal%20de%20Deportes!5e0!3m2!1ses!2ses!4v1590662890150!5m2!1ses!2ses" class="w-100 h-100" frameborder="0" style="border:0; min-height: 400px" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row mt-5 pl-5 pb-5 w-100">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <div class="row mb-4">
                <div class="col-xl-2">
                    <h1 class="h4">Contacto</h1>
                </div>
                <div class="col-xl-10 text-left mt-2">
                    <div class="row">
                        <div class="col-xl-3">
                            <span><i class="far fa-envelope mr-2"></i>jorge.rgdaw@gmail.com</span>
                        </div>
                        <div class="col-xl-3">
                            <span><i class="fas fa-mobile-alt mr-2"></i>(+34) 645 189 321</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2">
                    <h1 class="h4">Horario</h1>
                </div>
                <div class="col-xl-10 text-left mt-2">
                    <span><i class="fas fa-clock mr-2"></i>De Lunes a Domingo de 09:00h a 18:30h</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
@endsection
