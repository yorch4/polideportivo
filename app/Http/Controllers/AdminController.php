<?php

namespace App\Http\Controllers;

use App\Article;
use App\Facilitie;
use App\Field;
use App\Rate;
use App\Rent;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function users(Request $request) {
        $users = User::lastname($request->get('apellidos'))->email($request->get('email'))->paginate(4);

        return view('control.users.users', array('users' => $users));
    }
    public function addUser() {
        return view('control.users.addUser');
    }
    public function postAddUser(Request $request) {
        $error = DB::table('users')->where('email', '=', $request->input('email'))->get();
        if(count($error) > 0) {
            return redirect()->back()->withInput()->withErrors('El email ya existe.');
        }
        if($request->file('img') != null) {
            $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
            //para que no se repita el nombre del fichero se concatena el tiempo unix
            $img = "img/users/" . $fich_unic;
            move_uploaded_file($request->file('img'), $img);
        } else {
         $img = "img/users/user.png";
        }
        User::create(array('name' => $request->input('name'), 'last_name' => $request->input('last_name'), 'email' => $request->input('email'), 'password' => Hash::make($request->input('password')), 'role' => $request->input('role'), 'img' => base64_encode($img)));
        return redirect('/control/usuarios');
    }
    public function deleteUser(Request $request) {
        User::find($request->input('id'))->delete();
        return redirect('/control/usuarios');
    }
    public function updateUser($id) {
        return view('control.users.updateUser', array('user' => User::find($id)));
    }
    public function postUpdateUser($id , Request $request) {
        $user = User::find($id);
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
        $user->role = $request->input('role');
        if($request->input('email_verified_at') == 1) {
            $user->email_verified_at = time();
        } else {
            $user->email_verified_at = NULL;
        }
        $user->save();
        return redirect('/control/usuarios');
    }

    public function fields(Request $request) {
        $fields = Field::game($request->get('juego'))->paginate(4);
        return view('control.fields.fields', array('fields' => $fields, 'searchFields' => Field::select('game')->distinct()->get()));
    }
    public function addField() {
        return view('control.fields.addField');
    }
    public function postAddField(Request $request) {
        if(count(DB::table('fields')->where('game', '=', $request->input('game'))->where('field_number', '=', $request->input('field_number'))->get()) > 0) {
            return redirect()->back()->withInput()->withErrors('El número de campo de ese juego ya existe.');
        }
        $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
        //para que no se repita el nombre del fichero se concatena el tiempo unix
        $img = "img/fields/" . $fich_unic;
        move_uploaded_file($request->file('img'), $img);
        $sections = $request->input('section');
        $field = new Field();
        $field->game = $request->input('game');
        $field->field_number = $request->input('field_number');
        $field->price = $request->input('price');
        $field->img = base64_encode($img);
        $field->save();
        $field = Field::where('game', $request->input('game'))->where('field_number', $request->input('field_number'))->first();
        for($i = 0; $i < count($sections); $i++) {
            $section = new Section();
            $section->section = $sections[$i];
            $section->field_id = $field->id;
            $section->save();
        }
        return redirect('/control/campos');
    }
    public function deleteField(Request $request) {
        Field::find($request->input('id'))->delete();
        return redirect('/control/campos');
    }
    public function updateField($id) {
        return view('control.fields.updateField', array('field' => Field::find($id)));
    }
    public function postUpdateField($id , Request $request) {
        if(count(DB::table('fields')->where('game', '=', $request->input('game'))->where('field_number', '=', $request->input('field_number'))->where('id', '!=', $id)->get()) > 0) {
            return Redirect::back()->withErrors(['Ese juego con ese número de campo ya existe']);
        } else {
            $field = Field::find($id);
            if($request->file('img') != NULL) {
                $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
                //para que no se repita el nombre del fichero se concatena el tiempo unix
                $img = "img/users/" . $fich_unic;
                move_uploaded_file($request->file('img'), $img);
                $field->img = base64_encode($img);
            }
            $sections = $request->input('section');
            $field->game = $request->input('game');
            $field->field_number = $request->input('field_number');
            $field->price = $request->input('price');

            $field->save();
            $field->sections()->delete();
            for($i = 0; $i < count($sections); $i++) {
                $section = new Section();
                $section->section = $sections[$i];
                $section->field_id = $id;
                $section->save();
            }

            return redirect('/control/campos');
        }
    }

    public function facilities(Request $request) {
        $facilities = Facilitie::name($request->get('nombre'))->paginate(4);
        return view('control.facilities.facilities', array('facilities' => $facilities));
    }
    public function addFacility() {
        return view('control.facilities.addFacility');
    }
    public function postAddFacility(Request $request) {
        $error = DB::table('facilities')->where('name', '=', $request->input('name'))->get();
        if(count($error) > 0) {
            return redirect()->back()->withInput()->withErrors('El nombre de la instalación ya existe.');
        }
        $facility = new Facilitie();
        $facility->name = $request->input('name');
        $facility->description = $request->input('description');
        $facility->timetable = $request->input('timetable');
        $facility->normal_price = $request->input('normal_price');
        $facility->sub_price = $request->input('sub_price');
        $facility->save();
        return redirect('/control/instalaciones');
    }
    public function deleteFacility(Request $request) {
        Facilitie::find($request->input('id'))->delete();
        return redirect('/control/instalaciones');
    }
    public function updateFacility($id) {
        return view('control.facilities.updateFacility', array('facility' => Facilitie::find($id)));
    }
    public function postUpdateFacility($id, Request $request) {
        if(count(DB::table('facilities')->where('name', '=', $request->input('name'))->where('id', '!=', $id)->get()) > 0) {
            return Redirect::back()->withErrors(['Ese nombre de instalación ya existe']);
        } else {
            $facility = Facilitie::find($id);
            $facility->name = $request->input('name');
            $facility->description = $request->input('description');
            $facility->timetable = $request->input('timetable');
            $facility->normal_price = $request->input('normal_price');
            $facility->sub_price = $request->input('sub_price');
            $facility->save();
            return redirect('/control/instalaciones');
        }
    }

    public function rents(Request $request) {
        $rents = Rent::day($request->get('fecha1'), $request->get('fecha2'))->email($request->get('email'))->game($request->get('juego'))->orderBy('id', 'DESC')->paginate(4);
        return view('control.rents.rents', array('rents' => $rents, 'fecha1' => $request->get('fecha1'), 'fecha2' => $request->get('fecha2'), 'email' => $request->get('email'), 'juego' => $request->get('juego')));
    }

    public function pdf(Request $request) {
        $rents =  Rent::day($request->get('fecha1'), $request->get('fecha2'))->email($request->get('email'))->game($request->get('juego'))->orderBy('day', 'DESC')->get();
        $pdfData = array(
            'rents'=> $rents
        );
        $pdf = app('dompdf.wrapper');
        $pdf->loadview('pdf.pdfRents', $pdfData);
        return $pdf->download('alquileres.pdf');
    }

    public function addRent() {
        return view('control.rents.addRent', array('fields' => Field::all()));
    }
    public function postAddRent(Request $request) {
        if(count(DB::table('users')->where('email', '=', $request->input('email'))->get()) <= 0) {
            return redirect()->back()->withInput()->withErrors('Ese email no existe.');
        } else {
            $user = DB::table('users')->where('email', $request->input('email'))->first();
            $user_id = $user->id;
            if(Rent::where('field_id', $request->input('field_id'))->where('day', $request->input('day'))->count() <= 0) {
                return view('control.rents.sections', array('sections' => Section::where('field_id', $request->input('field_id'))->get(), 'day' => $request->input('day'), 'user_id' => $user_id));
            } else {
                if(Rent::where('field_id', $request->input('field_id'))->where('day', $request->input('day'))->count() >= Section::where('field_id', $request->input('field_id'))->count()) {
                    return Redirect::back()->withErrors(['Lo sentimos, ya no quedan pistas disponibles de ese campo para ese día']);
                } else {
                    return view('control.rents.sections', array('sections' => Section::where('field_id', $request->input('field_id'))->get(), 'rents' => Rent::where('field_id', $request->input('field_id'))
                        ->where('day', $request->input('day'))->get(), 'day' => $request->input('day'), 'user_id' => $user_id
                    ));
                }
            }
        }
    }
    public function deleteRent(Request $request) {
        Rent::find($request->input('id'))->delete();
        return redirect('/control/alquileres');
    }
    public function updateRent($id) {
        return view('control.rents.updateRent', array('rent' => Rent::find($id)));
    }
    public function confirmUpdateRent($id, Request $request) {
        if(count(DB::table('users')->where('email', '=', $request->input('email'))->get()) <= 0) {
            return Redirect::back()->withErrors(['Ese email no existe']);
        } else {
            $rent = Rent::find($id);
            $user = User::where('email', $request->input('email'))->first();
            $rent->user_id = $user->id;
            $rent->save();
            return redirect('/control/alquileres');
        }
    }
    public function nextUpdateRent(Request $request) {
        if(count(DB::table('users')->where('email', '=', $request->input('email'))->get()) <= 0) {
            return Redirect::back()->withErrors(['Ese email no existe']);
        } else {
            return view('control.rents.updateRent2', array('rent' => Rent::find($request->input('id')), 'email' => $request->input('email'), 'fields' => Field::all()));
        }
    }
    public function postNextUpdateRent(Request $request) {
        $user = DB::table('users')->where('email', $request->input('email'))->first();
        $user_id = $user->id;
        if(Rent::where('field_id', $request->input('field_id'))->where('day', $request->input('day'))->count() <= 0) {
            return view('control.rents.sections', array('sections' => Section::where('field_id', $request->input('field_id'))->get(), 'day' => $request->input('day'), 'user_id' => $user_id,'id' => $request->input('id')));
        } else {
            if(Rent::where('field_id', $request->input('field_id'))->where('day', $request->input('day'))->count() >= Section::where('field_id', $request->input('field_id'))->count()) {
                return Redirect::back()->withErrors(['Lo sentimos, ya no quedan pistas disponibles de ese campo para ese día']);
            } else {
                return view('control.rents.sections', array('sections' => Section::where('field_id', $request->input('field_id'))->get(), 'rents' => Rent::where('field_id', $request->input('field_id'))
                    ->where('day', $request->input('day'))->get(), 'day' => $request->input('day'), 'user_id' => $user_id, 'id' => $request->input('id')
                ));
            }
        }
    }

    public function articles(Request $request) {
        $articles = Article::headline($request->get('titular'))->paginate(5);
        return view('control.articles.articles', array('articles' => $articles));
    }
    public function addArticle() {
        return view('control.articles.addArticle');
    }
    public function postAddArticle(Request $request) {
        $error = DB::table('articles')->where('headline', '=', $request->input('headline'))->get();
        if(count($error) > 0) {
            return redirect()->back()->withInput()->withErrors('El titular de la noticia ya existe.');
        }
        $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
        //para que no se repita el nombre del fichero se concatena el tiempo unix
        $img = "img/news/" . $fich_unic;
        move_uploaded_file($request->file('img'), $img);
        $article = new Article();
        $article->headline = $request->input('headline');
        $article->body = $request->input('body');
        $article->img = base64_encode($img);
        $article->save();
        return redirect('/control/noticias');
    }
    public function deleteArticle(Request $request) {
        Article::find($request->input('id'))->delete();
        return redirect('/control/noticias');
    }
    public function updateArticle($id) {
        return view('control.articles.updateArticle', array('article' => Article::find($id)));
    }
    public function postUpdateArticle($id , Request $request) {
        $article = Article::find($id);
        if(count(DB::table('articles')->where('headline', '=', $request->input('headline'))->where('id', '!=', $id)->get()) > 0) {
            return Redirect::back()->withErrors(['Ese titular ya existe']);
        } else {
            if($request->file('img') != NULL) {
                $fich_unic = time() . "-" . $request->file('img')->getClientOriginalName();
                //para que no se repita el nombre del fichero se concatena el tiempo unix
                $img = "img/news/" . $fich_unic;
                move_uploaded_file($request->file('img'), $img);
                $article->img = base64_encode($img);
            }
            $article->headline = $request->input('headline');
            $article->body = $request->input('body');
            $article->created_at = $request->input('created_at');
            $article->save();
            return redirect('/control/noticias');
        }
    }

    public function rates(Request $request) {
        $rates = Rate::email($request->get('email'))->game($request->get('juego'))->orderBy('id', 'DESC')->paginate(4);
        return view('control.rates.rates', array('rates' => $rates));
    }
    public function addRate() {
        return view('control.rates.addRate', array('fields' => Field::all()));
    }
    public function postAddRate(Request $request) {
        if(count(DB::table('users')->where('email', '=', $request->input('email'))->get()) <= 0) {
            return Redirect::back()->withInput()->withErrors(['Ese email no existe']);
        } else {
            $user = User::where('email', $request->input('email'))->first();
            if(count(DB::table('rents')->where('user_id', '=', $user->id)->where('field_id', '=', $request->input('field_id'))->get()) <= 0) {
                return Redirect::back()->withInput()->withErrors(['El usuario aún no ha reservado ese campo, por lo que no puede valorarlo']);
            } else {
                $error = DB::table('rates')->where('user_id', '=', $user->id)->where('field_id', '=', $request->input('field_id'))->get();
                if(count($error) > 0) {
                    return redirect()->back()->withInput()->withErrors('Ese usuario ya ha valorado ese campo.');
                } else {
                    $rate = new Rate();
                    $rate->user_id = $user->id;
                    $rate->field_id = $request->input('field_id');
                    $rate->comment = $request->input('comment');
                    $rate->rate = $request->input('rate');
                    $rate->save();
                    return redirect('/control/valoraciones');
                }
            }
        }
    }
    public function deleteRate(Request $request) {
        Rate::find($request->input('id'))->delete();
        return redirect('/control/valoraciones');
    }
    public function updateRate($id) {
        return view('control.rates.updateRate', array('rate' => Rate::find($id), 'fields' => Field::all()));
    }
    public function postUpdateRate($id , Request $request)
    {
        if (count(DB::table('users')->where('email', '=', $request->input('email'))->get()) <= 0) {
            return Redirect::back()->withInput()->withErrors(['Ese email no existe']);
        } else {
            $user = User::where('email', $request->input('email'))->first();
            if (count(DB::table('rents')->where('user_id', '=', $user->id)->where('field_id', '=', $request->input('field_id'))->get()) <= 0) {
                return Redirect::back()->withInput()->withErrors(['El usuario aún no ha reservado ese campo, por lo que no puede valorarlo']);
            } else {
                $rate = Rate::find($id);
                $rate->user_id = $user->id;
                $rate->field_id = $request->input('field_id');
                $rate->comment = $request->input('comment');
                $rate->rate = $request->input('rate');
                $rate->save();
                return redirect('/control/valoraciones');
            }
        }
    }
}
