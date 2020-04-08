<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['section'];

    public function field() {
        return $this->belongsTo(Field::class);
    }
}
