@extends('layouts.master')
@section('content')
    <!--SLIDESHOW-->
    <section class="row ">
        <div class="col p-0">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner p-0 h-100">
                    <div class="carousel-item active  p-0 h-100">
                        <img class="w-100" src="img/coronavirus.png" alt="First slide">
                    </div>
                    <div class="carousel-item p-0">
                        <a href="w-100"><img class="d-block w-100" src="img/coronavirus.png" alt="Second slide"></a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </section>
    <hr>
    <section class="row">
        <div class="col text-center">
            <h3 class="font-weight-bold text-dark">ACTIVIDADES</h3>
            <h1>EMPIEZA A CONSEGUIR TUS OBJETIVOS</h1>
            <div class="row text-center">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-lg-4 mt-3">
                            <a href="{{url('/instalaciones/gimnasio')}}">
                            <div class="flip-card mx-auto" tabIndex="0">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front flip-card-front1 py-5 px-2">
                                        <h2>GIMNASIO</h2>
                                        <i class="fas fa-dumbbell fa-4x"></i>
                                    </div>
                                    <div class="flip-card-back flip-card-back py-5 px-2">
                                        <h2>GIMNASIO</h2>
                                        <p>Ver las características de nuestro gran gimnasio</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <a href="{{url('/instalaciones/piscinas')}}">
                            <div class="flip-card mx-auto" tabIndex="0">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front flip-card-front2 py-5 px-2">
                                        <h2>PISCINA</h2>
                                        <i class="fas fa-swimming-pool fa-4x"></i>
                                    </div>
                                    <div class="flip-card-back flip-card-back py-5 px-2">
                                        <h2>PISCINA</h2>
                                        <p>Entra para ver lo que te esperará en las piscinas PDM</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <a href="{{url('/reservas')}}">
                            <div class="flip-card mx-auto" tabIndex="0">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front flip-card-front3 py-5 px-2">
                                        <h2>RESERVA</h2>
                                        <i class="fa fa-ticket fa-4x"></i>
                                    </div>
                                    <div class="flip-card-back flip-card-back py-5 px-2">
                                        <h2>RESERVA</h2>
                                        <p>Reserva AHORA las mejores pistas de tu deporte favorito</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </section>
    <hr>
    <section class="row">
        <div class="col-sm-7 text-justify  text-secondary border-right">
            <h3 aria-hidden="true" class="font-weight-bold text-dark">SÍGUENOS EN NUESTRAS</h3>
            <h1>REDES SOCIALES</h1>
            <p class="text-dark">¿Quieres ser el primero en conocer todas las novedades, participar en nuestras actividades y disfrutar de las mejores ofertas?  ¡Pues dale a seguir y forma parte de la comunidad del PDM!</p>
        </div>
        <div class="col-sm-5 mt-5 text-center">
            <div class="row">
                <div class="col-lg-4 border-right">
                    <h2>Facebook</h2>
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-square fa-4x"></i></a><br>
                </div>
                <div class="col-lg-4 border-right">
                    <h2>Instagram</h2>
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram fa-4x"></i></a><br>
                </div>
                <div class="col-lg-4">
                    <h2>Twitter</h2>
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter-square fa-4x"></i></a><br>
                </div>
            </div>
        </div>
    </section>
    <hr>
@endsection
