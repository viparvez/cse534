<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textresponse extends Model
{
    protected $fillable = ['nodeid','message','mid','reply', 'createdby', 'updatedby'];

    public function Node(){
    	$this->belongsTo('App\Node', 'nodeid', 'nodeid');
    }
}
