<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buttontemplate extends Model
{
    protected $fillable = ['templateid','message','createdby', 'updatedby'];

    public function Button(){
    	return $this->hasMany('App\Button','templateid','templateid');
    }
}
