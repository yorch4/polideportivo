<?php

namespace App\Http\Controllers;

use App\Article;
use App\Facilitie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.index');
    }
    public function facilities($name) {
        $facilitie = Facilitie::where('name', '=', $name)->first();
        return view('main.facilities', array('facilitie' => $facilitie));
    }

    public function articles() {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('main.articles', array('articles' => $articles));
    }

    public function subscribe() {
        return view('main.subscribe');
    }

    public function profile() {
        $user = Auth::user();
        return view('main.profile', array('user' => $user));
    }

    public function updateProfile(Request $request) {
        return view('main.updateProfile', array('user' => User::find($request->input('id'))));
    }

    public function postUpdateProfile(Request $request) {
        $user = User::find($request->input('id'));
        if($request->file('img') != NULL) {
            $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
            //para que no se repita el nombre del fichero se concatena el tiempo unix
            $img = "img/users/" . $fich_unic;
            move_uploaded_file($request->file('img'), $img);
            $user->img = base64_encode($img);
        }
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        if($request->input('password') != "") {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect('/perfil');
    }
}
