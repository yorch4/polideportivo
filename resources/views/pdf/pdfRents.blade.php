<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/1ebe3bc828.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href="//db.onlinewebfonts.com/c/23c0fcab84d99da0de762de7e220a6e1?family=Europa" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{public_path('css/index.css')}}"/>
<div class="container-fluid">
    <img class="img-fluid" src="{{public_path('img/Logo.PNG')}}">
    <h1>Reservas de Campos</h1>
    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th>Email</th>
            <th>Campo</th>
            <th>Día</th>
            <th>Hora</th>
        </tr>
        </thead>
        <tbody>
            @foreach($rents as $rent)
                <tr>
                    <td>{{$rent->user->email}}</td>
                    <td>{{$rent->field->game}} Campo {{$rent->field->field_number}}</td>
                    <td>{{$rent->day}}</td>
                    <td>{{$rent->section}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
