<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $fillable = ['nextaction'];

    public function Nodetype(){
    	return $this->belongsTo('App\Nodetype','nodetypeid', 'nodetypeid');
    }

    public function Template(){
    	return $this->hasMany('App\Template','nodeid', 'nodeid');
    }

    public function Textresponse(){
    	$this->hasOne('App\Textresponse', 'nodeid', 'nodeid');
    }
}
