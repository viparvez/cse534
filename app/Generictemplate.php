<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generictemplate extends Model
{
    protected $table = 'generictemplates';

    public function Subtemplate(){
    	return $this->belongsTo('App\Subtemplate', 'id', 'subtemplateid');
    }

}
