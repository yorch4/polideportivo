<div class="cookie-alert">
    <span class="message">Esta página usa cookies para ofrecerte una mejor experiencia. Al usarla estarás aceptando los <a href="http://www.interior.gob.es/politica-de-cookies" target="_blank">términos</a></span>
    <span class="mobile">Esta página usa cookies, <a href="http://www.interior.gob.es/politica-de-cookies" target="_blank">aprende más</a></span>
    <label for="checkbox-cb" class="close-cb accept-cookies">x</label>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{url('img/Logo.PNG')}}" alt="Logo" style="width:90px;">
    </a>
    <div class="collapse navbar-collapse align-content-center" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <ul class="nav navbar-nav navbar-letra">
                <li class="nav-item">
                    <a class="nav-link ml-lg-3" href="{{url('/')}}">INICIO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                       data-toggle="dropdown">
                        INSTALACIONES
                    </a>
                    <ul class="dropdown-menu"  id="dropdownMenuButton">
                        @foreach(\App\Facilitie::all() as $facilitie)
                        <li><a class="dropdown-item" href="{{url("/instalaciones/$facilitie->name")}}">{{$facilitie->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                       data-toggle="dropdown">
                        CAMPOS
                    </a>
                    <ul class="dropdown-menu"  id="dropdownMenuButton">
                        @foreach(\Illuminate\Support\Facades\DB::table('fields')->select('game')->groupBy('game')->get() as $field)
                            <li><a class="dropdown-item" href="{{url("/campos/$field->game")}}">{{$field->game}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/noticias')}}">NOTICIAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/abonate')}}">ABÓNATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/reservas')}}">RESERVAS</a>
                </li>
                @if(Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="collapsingNavbar"
                           data-toggle="dropdown">
                            CONTROL
                        </a>
                        <ul class="dropdown-menu"  id="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{url('/control/usuarios')}}">Usuarios</a></li>
                            <li><a class="dropdown-item" href="{{url('/control/campos')}}">Campos</a></li>
                            <li><a class="dropdown-item" href="{{url('/control/alquileres')}}">Alquileres</a></li>
                            <li><a class="dropdown-item" href="{{url('/control/valoraciones')}}">Valoraciones</a></li>
                            <li><a class="dropdown-item" href="{{url('/control/instalaciones')}}">Instalaciones</a></li>
                            <li><a class="dropdown-item" href="{{url('/control/noticias')}}">Noticias</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </ul>
        <span class="navbar-text">
            @if(!Auth::check())
                <a href="{{url('/login')}}">Log In</a>
                &nbsp;/&nbsp;
                <a href="{{url('/register')}}">Register</a>
            @else
                <div class="dropdown" id="dropdownLogoutLI" class="dropdown order-1">
                    <button class="btn btn-navbar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p id="dropdownLogoutMenu1"></p>
                        <?php $img =  base64_decode(\Illuminate\Support\Facades\Auth::user()->img) ?>
                        <img class="imgUsu" alt="imagen del usuario" src="{{url($img)}}"/>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('/perfil')}}">Perfil</a>
                       <form action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btnLink">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @endif
      </span>
    </div>
</nav>
<script src="{{url('js/cookie-alert.js')}}"></script>

