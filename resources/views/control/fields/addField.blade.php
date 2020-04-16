@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Añadir Campo</h5></div>

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
                            <label for="game">Juego</label>
                            <input id="game" type="text" class="form-control @error('game') is-invalid @enderror" name="game" value="{{ old('game') }}" required autocomplete="game" autofocus>
                            @error('game')
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
                            <label for="field_number">Número de campo</label>
                            <input id="field_number" type="number" class="form-control @error('field_number') is-invalid @enderror" name="field_number" value="{{ old('field_number') }}" required autocomplete="field_number" autofocus>
                            @error('field_number')
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
                            <label for="price">Precio</label>
                            <input id="price" type="number" step="0.01" min="0" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">
                            @error('price')
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
                            <label for="img">Imagen</label>
                            <input id="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" required>
                            @error('img')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h5>Tramos horarios</h5>
                <div class="row">
                    <div class="col">
                        <div id="input1" class="form-group">
                            <div class="field_wrapper">
                                <div>
                                    <label for="section1">Tramo 1</label>
                                    <input id="section1" type="text" class="form-control" name="section[]" required autocomplete="game" autofocus>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <input type="button" class="btn btn-secundary add_button" value="Añadir Tramo">
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <button type="submit" class="btn btn-primary">
                        Añadir
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 8; // Numero maximo de campos
            var addButton = $('.add_button'); // Selector del boton de Insertar
            var wrapper = $('.field_wrapper'); // Contenedor de campos
            var x = 1; // Iniciamos el contador a 1
            var fieldHTML = "";
            $(addButton).click(function(){ // Una vez que se haga clic en el boton
                if(x < maxField){ //Comprobamos el maximo
                    x++; //Increment field counter
                    fieldHTML = '<div><label for="section' + x + '">Nuevo Tramo</label><input id="section'+ x +'" type="text" class="form-control" name="section[]" required autocomplete="section" autofocus><input type="button" class="btn btn-primary remove_button my-3" value="Eliminar Tramo"><hr></div>';
                    $(wrapper).append(fieldHTML); // Añadimos el HTML
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ // Una vez se ha hecho clic en el boton de eliminar
                e.preventDefault();
                $(this).parent('div').remove(); //Eliminamos el div
                x--; // Reducimos el contador a 1
            });
        });
    </script>
@endsection
