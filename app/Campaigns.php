<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    //Table Name
    protected $table = 'campaign';
    //Primary key
    public $primaryKey = 'campaignid';

    public function emails()
    {
        return $this->hasMany('Emails');
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization','organizationid','organizationid');
    }

}
