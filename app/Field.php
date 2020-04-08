<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function rents() {
        return $this->hasMany(Rent::class);
    }
    public function sections() {
        return $this->hasMany(Section::class);
    }
}
