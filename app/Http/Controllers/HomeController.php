<?php

namespace App\Http\Controllers;

use App\Article;
use App\Facilitie;
use App\Field;
use App\Rate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function fields($game) {
        $fields = Field::where('game', '=', $game)->paginate(1);
        return view('main.fields', array('fields' => $fields));
    }

    public function addRate(Request $request) {
        $comment = $request->input('comment');
        $id = $request->input('id');
        $rate = new Rate();
        $rate->rate = $request['rate'];;
        $rate->comment = $comment;
        $rate->field_id = $id;
        $rate->user_id = Auth::user()->id;
        $rate->save();
        return redirect()->back();
    }

    public function deleteRate(Request $request) {
        Rate::find($request->input('id'))->delete();
        return redirect()->back();
    }

    public function updateRate(Request $request) {
        $rate = Rate::find($request->input('id'));
        $rate->comment = $request->input('comment');
        $rate->rate = $request['rate'];
        $rate->save();
        return redirect()->back();
    }

    public function articles(Request $request) {
        $articles = Article::headline($request->get('titular'))->orderBy('created_at', 'desc')->paginate(5);
        return view('main.articles', array('articles' => $articles));
    }

    public function subscribe() {
        return view('main.subscribe');
    }

    public function privacypolicy() {
        return view('main.privacypolicy');
    }

    public function cookiespolicy() {
        return view('main.cookiespolicy');
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

    public function contact() {
        return view('main.contact');
    }
    public function postContact(Request $request) {
        $data = array(
            'email_address'=> Auth::user()->email,
            'cc'=>null,
            'subject'=>$request->input('subject'),
            'body'=>$request->input('body'),
        );
        Mail::send([], $data, function($message) use($data) {
            $message->from($data['email_address']);
            $message->to('jorge.rgdaw@gmail.com');
            if($data['cc'] != null){
                $message->cc($data['cc']);
            }
            $message->setBody($data['body']);
            $message->subject($data['subject']);
        });
        return redirect()->back() ->with('alert', 'El mensaje se ha enviado correctamente. Contactaremos contigo en breve.');
    }
}
