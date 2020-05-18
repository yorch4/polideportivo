<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function field() {
        return $this->belongsTo(Field::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeEmail($query, $email) {
        if($email) {
            return $query->whereHas('user', function ($query) use ($email) {
                $query->where('users.email', 'like',  "%$email%");
            });
        }
    }
    public function scopeGame($query, $game) {
        if($game) {
            return $query->whereHas('field', function ($query) use ($game) {
                $query->where('fields.game', 'like',  "%$game%");
            });
        }
    }
}
