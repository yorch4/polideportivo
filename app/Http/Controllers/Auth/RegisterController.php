<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        if(User::where('email', $request['email'])->count() > 0) {
            return redirect()->back()->with(session()->flash('alert-danger', ' Ese email ya existe'));
        }
        if($request['password'] != $request['password_confirmation']) {
            return redirect()->back()->with(session()->flash('alert-danger', ' Las contraseñas no coinciden'));
        }
        if(isset($request['img'])) {
            $fich_unic = time() . "-" . $request['img']->getClientOriginalName();
            //para que no se repita el nombre del fichero se concatena el tiempo unix
            $imgFestival = "img/users/" . $fich_unic;
            move_uploaded_file($request['img'], $imgFestival);
        } else {
            $imgFestival = "img/users/user.png";
        }

        $user = new User();
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->role = "basic";
        $user->img = base64_encode($imgFestival);
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->verification_code = sha1(time());
        $user->save();

        $data = array(
            'email'=> $user->email,
            'verification_code' => $user->verification_code,
        );

        if($user != null) {
            Mail::send('mails.email-verification', $data, function($message) use($data) {
                $message->from('jorge.rgdaw@gmail.com', 'Polideportivo');
                $message->to($data['email']);
                $message->subject("Bienvenido a PDM");
            });
            return redirect()->back()->with(session()->flash('alert-success', 'Su cuenta se ha creado satisfactoriamente. Por favor, revise su email para verificarla.'));
        }

        return redirect()->back()->with(session()->flash('alert-danger', ' Algo inesperado ha ocurrido'));

    }

    public function verifyUser($code) {
        $user = User::where('verification_code', $code)->first();
        if($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Su cuenta ha sido verificado con éxito. Por favor, inicie sesión.'));
        } else {
            return redirect()->route('login')->with(session()->flash('alert-danger', 'Código de verificación erróneo'));
        }
    }
}
