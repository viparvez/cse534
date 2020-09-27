<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NodeController as Nodes;


class FormController extends Controller
{
    public function text(){

    	return view('elements.text');

    }

    public function button_template(){
    	return view('elements.button_template');
    }

    public function media_template(Request $request){
    	return view('elements.media_template');
    }

    public function generic_template(Request $request){
        $counter = $request->counter;
        $actcounter = $request->actcounter;
        $hidshow = $request->hidshow;
    	return view('elements.generic_template', compact('counter','actcounter','hidshow'));
    }

    public function btnElem(Request $request){
        $nodes = (new Nodes)->getNodes($request->botid);
        $counter = $request->counter;
        $actcounter = $request->actcounter;
        $hidshow = $request->hidshow;
        return view('elements.btn', compact('counter','actcounter','hidshow','nodes'));
    }
}
