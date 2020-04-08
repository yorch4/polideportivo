@extends('layouts.master')
@section('content')
    <div class="row text-center mt-4">
        @if(isset($rents))
            @foreach($sections as $section)
                @foreach($rents as $rent)
                        @if($section->section == $rent->section)
                            <?php $pintar = 1 ?>
                        @endif
                    @endforeach
                    @if(isset($pintar) && $pintar == 1)
                        <div class="col-xl-2 col-lg-3 border border-dark mb-4">
                            <div class="row">
                                <div class="col" style="width: 65px">
                                    <h1 class="text-secundary">{{$section->section}}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border-top border-dark d-flex align-items-center justify-content-center" style="background-color: red; width: 100%; height: 10rem">
                                    <h1 class="text-dark">OCUPADO</h1>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-xl-2 col-lg-3 col-section border border-dark mb-4" >
                            <form action="{{url('confirmar-reserva')}}" method="post">
                                @csrf
                                @if(isset($id))
                                    <input type="hidden" name="id" value="{{$id}}">
                                @endif
                                <input type="hidden" name="section" value="{{$section->section}}">
                                <input type="hidden" name="day" value="{{$day}}">
                                <input type="hidden" name="field_id" value="{{$section->field_id}}">
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <div onclick="javascript:this.parentNode.submit()">
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="text-secundary">{{$section->section}}</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border-top border-dark d-flex align-items-center justify-content-center" style="background-color: green; width: 100%; height: 10rem">
                                            <h1 class="text-dark">RESERVAR</h1>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    <?php $pintar = 0 ?>
            @endforeach
        @else
            @foreach($sections as $section)
                    <div class="col-xl-2 col-lg-3 col-section border border-dark mb-4" >
                        <form action="{{url('confirmar-reserva')}}" method="POST">
                            @csrf
                            @if(isset($id))
                                <input type="hidden" name="id" value="{{$id}}">
                            @endif
                            <input type="hidden" name="section" value="{{$section->section}}">
                            <input type="hidden" name="day" value="{{$day}}">
                            <input type="hidden" name="field_id" value="{{$section->field_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <div onclick="javascript:this.parentNode.submit()">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="text-secundary">{{$section->section}}</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border-top border-dark d-flex align-items-center justify-content-center" style="background-color: green; width: 100%; height: 10rem">
                                        <h1 class="text-dark">RESERVAR</h1>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            @endforeach
        @endif
    </div>
@endsection
