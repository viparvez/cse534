<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = ['templateid','type','createdby', 'updatedby','title','nodeid','resource'];
}
