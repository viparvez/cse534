<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use Illuminate\Support\Facades\DB;
use Auth;

class NodeController extends Controller
{
    public function getNodes($botid){
    	return Node::where(['chatbotid' => $botid])->get();
    }
}
