<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'role', 'img'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rents() {
        return $this->hasMany(Rent::class);
    }
    public function rates() {
        return $this->hasMany(Rate::class);
    }

    public function scopeLastname($query, $last_name) {
        if($last_name) {
            return $query->where('last_name', 'like', "%$last_name%");
        }
    }
    public function scopeEmail($query, $email) {
        if($email) {
            return $query->where('email', 'like', "%$email%");
        }
    }
}
