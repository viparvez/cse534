<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function Node(){
    	return $this->belongsTo('App\Node','nodeid', 'nodeid');
    }

    public function Subtemplate(){
    	return $this->hasMany('App\Subtemplate','templateid', 'id');
    }

    public function Buttontemplate(){
    	return $this->hasOne('App\Buttontemplate','templateid', 'id');
    }

    public function Mediatemplate(){
    	return $this->hasOne('App\Mediatemplate','templateid', 'id');
    }
}
