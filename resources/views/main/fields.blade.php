@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            @foreach($fields as $field)
                    <section>
                        <div class="row">
                            <div class="col-xl-8 mt-3 text-center">
                                <?php $img = base64_decode($field->img) ?>
                                <img class="img-fluid rounded img-fields-details" src="{{url($img)}}">
                            </div>
                            <div class="col-xl-4">
                                <h1 class="text-center my-4">{{$field->game}} Campo {{$field->field_number}}</h1>
                                <div class="row">
                                    <div class="col text-center">
                                    <span>Valoración</span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star"></span>
                                    <p>4.1 de media basada en 254 opiniones.</p>
                                    <hr style="border:3px solid #f1f1f1">

                                    <div class="row mb-5">
                                        <div class="side">
                                            <div>5 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>150</div>
                                        </div>
                                        <div class="side">
                                            <div>4 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-4"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>63</div>
                                        </div>
                                        <div class="side">
                                            <div>3 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-3"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>15</div>
                                        </div>
                                        <div class="side">
                                            <div>2 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-2"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>6</div>
                                        </div>
                                        <div class="side">
                                            <div>1 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-1"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>20</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row mt-5">
                                    <div class="col d-flex justify-content-center">
                                        {{$fields->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                <section>
                    <div class="row">
                        <div class="col">
                            <h1 class="h4">100 Valoraciones</h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                           <div class="col">
                               <form>
                                   <div class="form__group field">
                                       <img class="rounded-circle pt-4" style="width: 50px" src="{{url('/img/users/user.png')}}">
                                       <input type="input" class="form__field" placeholder="Añade un comentario público" name="comment" id='comment' required />
                                       <label for="comment" class="form__label mb-0">Añade una valoración</label>
                                       <div class="rating">
                                           <input type="radio" name="radio" id="radio1"><label for="radio1"></label>
                                           <input type="radio" name="radio" id="radio2" checked><label for="radio2"></label>
                                           <input type="radio" name="radio" id="radio3"><label for="radio3"></label>
                                           <input type="radio" name="radio" id="radio4"><label for="radio4"></label>
                                           <input type="radio" name="radio" id="radio5"><label for="radio5"></label>
                                       </div>
                                       <div class="text-right mt-2 mb-5">
                                           <input type="submit" class="btn btn-secundary" style="position: absolute; left: 55%">
                                       </div>
                                   </div>
                               </form>
                           </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form__group field">
                                        <img class="rounded-circle" style="width: 50px" src="{{url('/img/users/user.png')}}">
                                        <span class="font-weight-bold pt-5">Carolina soy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="ml-3">14/03/20</span>
                                    <p>Pues la verdad es que la hostia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        <div class="col-xl-2"></div>
    </div>
@endsection
