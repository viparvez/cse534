<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['pageaccid','category','pagename','createdby', 'updatedby'];

    public function Chatbot(){
    	return $this->belongsTo('App\Chatbot', 'id', 'pageid');
    }
}
