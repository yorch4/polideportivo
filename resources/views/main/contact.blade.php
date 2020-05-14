@extends('layouts.master')

@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Contacto</h5></div>

        <div class="card-body mt-3">
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
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary mb-2">
                        Enviar
                    </button><br>
                </div>
            </form>
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
