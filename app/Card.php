<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }


}
