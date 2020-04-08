<?php

namespace App\Http\Controllers;

use App\Field;
use App\Rent;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index() {
        return view('rent.rent', array('fields' => Field::orderBy('game', 'asc')->get()));
    }
    public function calendar($id) {
        return view('rent.calendar', array('field' => Field::find($id)));
    }
    public function sections($id, Request $request) {
        if(Rent::where('field_id', $id)->where('day', $request->input('date'))->count() <= 0) {
            return view('rent.sections', array('sections' => Section::where('field_id', $id)->get(), 'day' => $request->input('date')));
        } else {
            if(Rent::where('field_id', $id)->where('day', $request->input('date'))->count() >= Section::where('field_id', $id)->count()) {
                return view('rent.calendar', array('field' => Field::find($id), 'error' => 'Lo sentimos, no quedan tramos horarios disponibles de la pista ese día'));
            } else {
                return view('rent.sections', array('sections' => Section::where('field_id', $id)->get(), 'rents' => Rent::where('field_id', $id)
                    ->where('day', $request->input('date'))->get(), 'day' => $request->input('date')
                ));
            }
        }
    }
    public function confirm(Request $request) {
        $field_id = $request->input('field_id');
        $day = $request->input('day');
        $section = $request->input('section');
        $user_id = $request->input('user_id');

        if($request->input('id') != null) {
            if(Rent::where('field_id', $field_id)->where('day', $day)->where('section', $section)->count() <= 0) {
                $rent = Rent::find($request->input('id'));
                $rent->field_id = $field_id;
                $rent->day = $day;
                $rent->section = $section;
                $rent->user_id = $user_id;
                $rent->save();
                return view('rent.thanks');
            } else {
                return view('rent.error', array('error' => 'La pista acaba de ser reservada en esa hora'));
            }
        } else {
            if(Rent::where('field_id', $field_id)->where('day', $day)->where('section', $section)->count() <= 0) {
                $rent = new Rent();
                $rent->field_id = $field_id;
                $rent->day = $day;
                $rent->section = $section;
                $rent->user_id = $user_id;
                $rent->save();
                return view('rent.thanks');
            } else {
                return view('rent.error', array('error' => 'La pista acaba de ser reservada en esa hora'));
            }
        }
    }
}
