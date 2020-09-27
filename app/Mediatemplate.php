<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediatemplate extends Model
{
    protected $fillable = ['templateid', 'type', 'media', 'createdby', 'updatedby'];

    public function Button(){
    	return $this->hasMany('App\Button','templateid','templateid');
    }
}
