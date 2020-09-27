<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    protected $fillable = ['name','pageid','accesstoken','createdby', 'updatedby','accesstoken'];

    public function Page(){
    	return $this->hasOne('App\Page', 'id', 'pageid');;
    }
}
