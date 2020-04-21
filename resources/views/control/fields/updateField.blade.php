@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header"><h5>Modificar {{$field->game}} Campo {{$field->field_number}}</h5></div>
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
                    <div class="col text-center mb-3">
                        <?php $img = base64_decode($field->img) ?>
                            <div class="form-group image-upload">
                                <label for="img" class="wrapper">
                                    <img class="img-circle img-thumbnail img-perfil image-upload-img" src="{{url($img)}}"/>
                                    <div class="overlay">
                                        <i class="icon fas fa-search-plus"></i>
                                    </div>
                                </label>
                                <p id="pOculto" class="mb-0 text-success" style="visibility: hidden; font-size: 1rem;"><i class="far fa-check-circle"> Archivo cargado con éxito</i></p>
                                <input id="img" type="file" accept="image/*" class="form-control @error('img') is-invalid @enderror" name="img">
                                <span id="error" class="invalid-feedback" role="alert" style="display: none">
                                <strong>Tipo de imagen inválido</strong>
                            </span>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="game">Juego</label>
                            <input id="game" type="text" class="form-control @error('game') is-invalid @enderror" name="game" value="{{$field->game}}" required autocomplete="game" autofocus>
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
                            <input id="field_number" type="text" class="form-control @error('field_number') is-invalid @enderror" name="field_number" value="{{$field->field_number}}" required autocomplete="field_number" autofocus>
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
                            <input id="price" type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$field->price}}" required autocomplete="price">
                            @error('price')
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
                                <?php $i = 0 ?>
                                @foreach($field->sections as $section)
                                    <?php $i++ ?>
                                    @if($i == 1)
                                    <div>
                                        <label for="section{{$i}}">Tramo {{$i}}</label>
                                        <input id="section{{$i}}" type="text" value="{{$section->section}}" class="form-control" name="section[]" required autocomplete="section" autofocus>
                                        <hr>
                                    </div>
                                    @else
                                        <div>
                                            <label for="section{{$i}}">Tramo {{$i}}</label>
                                            <input id="section{{$i}}" type="text" value="{{$section->section}}" class="form-control" name="section[]" required autocomplete="section" autofocus>
                                            <input type="button" class="btn btn-primary remove_button my-3" value="Eliminar Tramo">
                                            <hr>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <input type="button" class="btn btn-secundary add_button" value="Añadir Tramo">
                </div>
                <div class="form-group text-center mt-5 mb-3">
                    <a class="btn btn-secundary" href="{{url('/control/campos')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
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
    <script src="{{url('js/validate-modify-img.js')}}"></script>
@endsection
