<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtemplate extends Model
{
    public function Template(){
    	return $this->belongsTo('App\Template', 'id', 'templateid');
    }

    public function Generictemplate(){
    	return $this->hasMany('App\Generictemplate', 'subtemplateid', 'id');
    }
}
