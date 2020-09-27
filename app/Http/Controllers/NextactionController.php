<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;

class NextactionController extends Controller
{
    public function getNext($id){
    	return Node::where(['nodeid' => $id])->get();
    }
}
