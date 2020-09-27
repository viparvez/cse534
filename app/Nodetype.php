<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodetype extends Model
{
    public function Node(){
    	return $this->hasMany('App\Node','nodetypeid', 'nodetypeid');
    }
}
