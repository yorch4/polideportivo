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
                                        @if(\App\Rate::where('field_id', $field->id)->count() <= 0)
                                            <span>Aún no se han hecho valoraciones de este campo</span>
                                            @else
                                        <?php
                                            $valoraciones = \App\Rate::where('field_id', $field->id)->count();
                                            $media =  (\App\Rate::where('field_id', $field->id)->sum('rate') / $valoraciones);
                                            $s5 = \App\Rate::where('field_id', $field->id)->where('rate', 5)->count();
                                            $s4 = \App\Rate::where('field_id', $field->id)->where('rate', 4)->count();
                                            $s3 = \App\Rate::where('field_id', $field->id)->where('rate', 3)->count();
                                            $s2 = \App\Rate::where('field_id', $field->id)->where('rate', 2)->count();
                                            $s1 = \App\Rate::where('field_id', $field->id)->where('rate', 1)->count();
                                        ?>
                                    <span>Valoración</span>
                                    <span class="fas fa-star checked"></span>
                                    <span class="fas fa-star @if($media >= 1.5) checked @endif"></span>
                                    <span class="fas fa-star @if($media >= 2.5) checked @endif"></span>
                                    <span class="fas fa-star @if($media >= 3.5) checked @endif"></span>
                                    <span class="fas fa-star @if($media >= 4.5) checked @endif"></span>
                                    <p>{{bcdiv($media, '1', 2)}} de media basada en {{$valoraciones}} opiniones.</p>
                                    <hr style="border:3px solid #f1f1f1">

                                    <div class="row mb-5">
                                        <div class="side">
                                            <div>5 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width: {{($s5 * 100 / $valoraciones)}}%"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$s5}}</div>
                                        </div>
                                        <div class="side">
                                            <div>4 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-4" style="width: {{($s4 * 100 / $valoraciones)}}%"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$s4}}</div>
                                        </div>
                                        <div class="side">
                                            <div>3 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-3" style="width: {{($s3 * 100 / $valoraciones)}}%"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$s3}}</div>
                                        </div>
                                        <div class="side">
                                            <div>2 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-2" style="width: {{($s2 * 100 / $valoraciones)}}%"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$s2}}</div>
                                        </div>
                                        <div class="side">
                                            <div>1 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-1" style="width: {{($s1 * 100 / $valoraciones)}}%"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$s1}}</div>
                                        </div>
                                    </div>
                                        @endif
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
                            <h1 class="h4">{{\App\Rate::where('field_id', $field->id)->count()}} Valoraciones</h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                           <div class="col">
                               @if(\Illuminate\Support\Facades\Auth::check())
                                   @if(\App\Rent::where('field_id', $field->id)->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                                       @if(\App\Rate::where('field_id', $field->id)->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->count() > 0)
                                           <?php $rate = \App\Rate::where('field_id', $field->id)->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first(); ?>
                                               <div class="row mt-5" id="editar-comentario" style="display: none">
                                                   <div class="col">
                                                       <form action="{{url('/editar-valoracion')}}" method="post">
                                                           @csrf
                                                           <div class="form__group field">
                                                               <img class="rounded-circle pt-4" style="width: 50px" src="{{url(base64_decode($rate->user->img))}}">
                                                               <input type="input" class="form__field" placeholder="Edita tu comentario" name="comment" id='comment-edit' value="{{$rate->comment}}" required />
                                                               <label for="comment-edit" class="form__label mb-0">Edita tu comentario</label>
                                                               <div class="rating">
                                                                   <input type="radio" name="rate" id="rate1-edit" value="5" @if($rate->rate == 5) checked @endif><label for="rate1-edit"></label>
                                                                   <input type="radio" name="rate" id="rate2-edit" value="4" @if($rate->rate == 4) checked @endif><label for="rate2-edit"></label>
                                                                   <input type="radio" name="rate" id="rate3-edit" value="3" @if($rate->rate == 3) checked @endif><label for="rate3-edit"></label>
                                                                   <input type="radio" name="rate" id="rate4-edit" value="2" @if($rate->rate == 2) checked @endif><label for="rate4-edit"></label>
                                                                   <input type="radio" name="rate" id="rate5-edit" value="1" @if($rate->rate == 1) checked @endif><label for="rate5-edit"></label>
                                                               </div>
                                                               <input type="hidden" name="id" value="{{$rate->id}}">
                                                               <div class="text-right mt-2 mb-5">
                                                                   <input type="button" class="btn btn-sm btn-outline-dark" onclick="ocultar()" value="CANCELAR">
                                                                   <input type="submit" class="btn btn-secundary" value="Editar" style="position: absolute; left: 55%">
                                                               </div>
                                                           </div>
                                                       </form>
                                                   </div>
                                               </div>
                                               <div class="row mt-5" id="tu-comentario">
                                                   <div class="col">
                                                       <div class="row">
                                                           <div class="col">
                                                               <div class="form__group field">
                                                                   <img class="rounded-circle" style="width: 50px" src="{{url(base64_decode($rate->user->img))}}">
                                                                   <span class="font-weight-bold pt-5">{{$rate->user->name}} {{$rate->user->last_name}}</span> @if($rate->created_at != $rate->updated_at) <span>(editado)</span> @endif
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="col">
                                                               <span class="fas fa-star checked"></span>
                                                               <span class="fas fa-star @if($rate->rate >= 2) checked @endif"></span>
                                                               <span class="fas fa-star @if($rate->rate >= 3) checked @endif"></span>
                                                               <span class="fas fa-star @if($rate->rate >= 4) checked @endif"></span>
                                                               <span class="fas fa-star @if($rate->rate >= 5) checked @endif"></span>
                                                               <span class="ml-3">{{date('d-m-Y', strtotime($rate->created_at))}}</span>
                                                               <p>{{$rate->comment}}</p>
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="col">
                                                               <ul class="list-inline">
                                                                   <li class="list-inline-item">
                                                                       <button class="btn btn-sm btn-outline-dark" onclick="mostrar()">EDITAR</button>
                                                                   </li>
                                                                   <li class="list-inline-item">
                                                                       <form class="form-inline pull-right" method="post" action="{{url('/eliminar-valoracion')}}">
                                                                           @csrf
                                                                           <input type="hidden" name="id" value="{{$rate->id}}">
                                                                           <input type="submit" class="btn btn-sm btn-outline-dark" value="ELIMINAR" onclick="return confirm('¿Estás seguro de eliminarlo?')">
                                                                       </form>
                                                                   </li>
                                                               </ul>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           @else
                                           <form action="" method="post">
                                               @csrf
                                               <div class="form__group field">
                                                   <img class="rounded-circle pt-4" style="width: 50px" src="{{url('/img/users/user.png')}}">
                                                   <input type="input" class="form__field" placeholder="Añade un comentario público" name="comment" id='comment' required />
                                                   <label for="comment" class="form__label mb-0">Añade una valoración</label>
                                                   <div class="rating">
                                                       <input type="radio" name="rate" id="rate1" value="5"><label for="rate1"></label>
                                                       <input type="radio" name="rate" id="rate2" value="4" checked><label for="rate2"></label>
                                                       <input type="radio" name="rate" id="rate3" value="3"><label for="rate3"></label>
                                                       <input type="radio" name="rate" id="rate4" value="2"><label for="rate4"></label>
                                                       <input type="radio" name="rate" id="rate5" value="1"><label for="rate5"></label>
                                                   </div>
                                                   <input type="hidden" name="id" value="{{$field->id}}">
                                                   <div class="text-right mt-2 mb-5">
                                                       <input type="submit" class="btn btn-secundary" style="position: absolute; left: 55%">
                                                   </div>
                                               </div>
                                           </form>
                                        @endif
                                       @else
                                       Tiene que <a href="{{url('/reservas')}}">reservar</a> este campo al menos una vez para hacer una valoración.
                                       @endif
                               @else
                                    <a href="{{url('/login')}}">Inicie sesión</a> para hacer una valoración.
                                @endif
                           </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @foreach(\App\Rate::where('field_id', $field->id)->where('user_id', '!=', \Illuminate\Support\Facades\Auth::user()->id)->get() as $rate)
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form__group field">
                                                <img class="rounded-circle" style="width: 50px" src="{{url(base64_decode($rate->user->img))}}">
                                                <span class="font-weight-bold pt-5">{{$rate->user->name}} {{$rate->user->last_name}}</span> @if($rate->created_at != $rate->updated_at) <span>(editado)</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="fas fa-star checked"></span>
                                            <span class="fas fa-star @if($rate->rate >= 2) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 3) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 4) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 5) checked @endif"></span>
                                            <span class="ml-3">{{date('d-m-Y', strtotime($rate->created_at))}}</span>
                                            <p>{{$rate->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        @foreach(\App\Rate::where('field_id', $field->id)->get() as $rate)
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form__group field">
                                                <img class="rounded-circle" style="width: 50px" src="{{url(base64_decode($rate->user->img))}}">
                                                <span class="font-weight-bold pt-5">{{$rate->user->name}} {{$rate->user->last_name}}</span> @if($rate->created_at != $rate->updated_at) <span>(editado)</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="fas fa-star checked"></span>
                                            <span class="fas fa-star @if($rate->rate >= 2) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 3) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 4) checked @endif"></span>
                                            <span class="fas fa-star @if($rate->rate >= 5) checked @endif"></span>
                                            <span class="ml-3">{{date('d-m-Y', strtotime($rate->created_at))}}</span>
                                            <p>{{$rate->comment}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </section>
            @endforeach
        </div>
        <div class="col-xl-2"></div>
    </div>
    <script>
        function mostrar() {
            document.getElementById('editar-comentario').style.display = 'block';
            document.getElementById('tu-comentario').style.display = 'none';
        }
        function ocultar() {
            document.getElementById('editar-comentario').style.display = 'none';
            document.getElementById('tu-comentario').style.display = 'block';
        }
    </script>
@endsection
