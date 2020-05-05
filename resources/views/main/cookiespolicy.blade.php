@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center my-5 text-uppercase">Política de cookies</h1>
            <p>Una cookie es un fichero que se descarga en el ordenador/smartphone/tablet del usuario al acceder a determinadas páginas web para almacenar y recuperar información sobre la navegación que se efectúa desde dicho equipo.</p>
            <section>
                <h2 class="text-secundary my-3">Relación de cookies usadas por nuestro dominio</h2>
                <p>En este site usamos estas cookies:</p>
                <p><b>acceptCookies:</b> esta cookie sirve para guardar la aceptación por parte del usuario del uso de las cookies en esta web, la cual se realiza clicando en el botón habilitado a tal efecto en la alerta de aceptación de cookies que aparece al llegar a este site por primera vez. Caduca a los 30 días.</p>
                <p><b>laravel_session:</b> esta es una cookie encriptada que se usa para guardar la sesión del usuario actual. Es importante para poder gestionar login del usuario registrado.</p>
                <p><b>XSRF-TOKEN:</b> esta es una cookie encriptada que sirve para controlar que todos los envíos de formularios son realizados por el usuario actualmente en sesión, evitando ataques CSRF (Cross-Site Request Forgery). </p>
            </section>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
