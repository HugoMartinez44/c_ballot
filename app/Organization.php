<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';
    //Primary key
    public $primaryKey = 'organizationid';


    public function campaigns()
    {
        return $this->hasMany('App\Campaigns','organizationid','organizationid');
    }

    public function organizer()
    {
        return $this->belongsTo('App\Organizer','organizerid','organizerid');
    }
}
