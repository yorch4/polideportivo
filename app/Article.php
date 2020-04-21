<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function scopeHeadline($query, $headline) {
        if($headline) {
            return $query->where('headline', 'like', "%$headline%");
        }
    }
}
