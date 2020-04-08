<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public function field() {
        return $this->belongsTo(Field::class);
    }
    public function user() {
    return $this->belongsTo(User::class);
}
}
