<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'email';
    //Primary key
    public $primaryKey = 'emailid';

    public function campaign()
    {
        return $this->belongsTo('App\Campaigns');
    }
}