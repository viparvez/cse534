<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    protected $fillable = ['nodeid', 'listener', 'createdby', 'updatedby'];

    public function Node(){
    	return $this->belongsTo('App\Node', 'nodeid', 'nodeid');
    }
}
