@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            @foreach($articles as $article)
                @if($article->id % 2 == 0)
                    <section>
                        <h1 class="text-center my-4">{{$article->headline}}</h1>
                        <div class="row">
                            <div class="col-xl-8">
                                <p>{{$article->body}}</p>
                            </div>
                            <div class="col-xl-4">
                                <img class="img-fluid rounded mx-auto d-block" src="{{base64_decode($article->img)}}"/>
                            </div>
                        </div>
                        <p class="text-xl-right text-muted">{{date('d-m-Y', strtotime($article->created_at))}}</p>
                    </section>
                    <hr>
                    @else
                    <section>
                        <h1 class="text-center my-4">{{$article->headline}}</h1>
                        <div class="row">
                            <div class="col-xl-4">
                                <img class="img-fluid rounded mx-auto d-block" src="{{base64_decode($article->img)}}"/>
                            </div>
                            <div class="col-xl-8">
                                <p>{{$article->body}}</p>
                            </div>
                        </div>
                        <p class="text-xl-right text-muted">{{date('d-m-Y', strtotime($article->created_at))}}</p>
                    </section>
                    <hr>
                @endif
            @endforeach
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
