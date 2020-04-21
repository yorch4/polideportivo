<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    public function scopeName($query, $name) {
        if($name) {
            return $query->where('name', 'like', "%$name%");
        }
    }
}
