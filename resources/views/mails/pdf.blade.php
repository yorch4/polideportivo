<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/1ebe3bc828.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href="//db.onlinewebfonts.com/c/23c0fcab84d99da0de762de7e220a6e1?family=Europa" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{public_path('css/index.css')}}"/>
<div class="container-fluid">
    <img class="img-fluid" src="{{public_path('img/Logo.PNG')}}">
    <section class="table-responsive">
        <h1>Datos de la reserva realizada por {{$user}}</h1>
            <table class="table table-hover mt-5">
                <thead>
                <tr>
                    <th>Precio</th>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Campo</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$price}}€</td>
                        <td>{{$day}}</td>
                        <td>{{$section}}</td>
                        <td>{{$field}}</td>
                    </tr>
                </tbody>
            </table>
    </section>
</div>
