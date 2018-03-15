<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    use Notifiable;

    protected $table = 'organizer';
    //Primary key
    public $primaryKey = 'organizerid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organizername', 'email', 'password',
    ];

    public function organizations()
    {
            return $this->hasMany('App\Organization','organizerid','organizerid');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
