<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NextactionController as Action;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
use App\Button;
use Appe\Tmplate;
use App\Buttontemplate;
use App\Mediatemplate;
use App\Node;

class MediatemplateController extends Controller
{

	public function create($request){
		//echo "entered media creator</b>";
    	$node = Node::where(['nodeid' => $request])->first();

    	$array = array(
			"attachment" => array(
				"type" => "template",
				"payload" => array(
					"template_type" => "media",
					"elements" => array(
						array(
							"media_type" => "image",
							"attachment_id" => $node->Template[0]->Mediatemplate->media,
						)
					),
				)
			)
    	);

    	$array_buttons = array();

    	foreach ($node->Template[0]->Mediatemplate->Button as $key => $value) {
    		
    		if ($value->type == 'postback') {
    			array_push($array_buttons, array(

    				"type" => $value->type,
    				"title" => $value->title,
    				"payload" => $value->nodeid

    			));
    		} else {

    			array_push($array_buttons, array(

    				"type" => $value->type,
    				"title" => $value->title,
    				"url" => $value->resource

    			));
    		}		

    	}
    	
    	$array['attachment']['payload']['elements'][0]['buttons'] = $array_buttons;

    	return $array;

    }



    public function insert(Request $request){

    	$validator = Validator::make($request->all(), [
	        'nodename' => ['required'],
	        'image' => ['required','max:255']
	    ]);

	    if ($validator->fails()) {
	    	return $validator->errors()->all();
	        //return back()->with('error',"$validator->errors()->all()");
	    }

		try{

			DB::beginTransaction();

			$id = DB::table('nodes')->insertGetId(
				[
					'nodename' => $request->nodename,
					'chatbotid' => $request->botid,
					'nodetypeid' => '3',
					'nextaction' => null,
					'createdby' => Auth::user()->id,
					'updatedby' => Auth::user()->id,
					'created_at'=> date('Y-m-d H:i:s'),
					'updated_at'=> date('Y-m-d H:i:s')
				]
			);

			$tmplt_id = DB::table('templates')->insertGetId([
				'nodeid' => $id,
				'createdby' => Auth::user()->id,
				'updatedby' => Auth::user()->id,
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s')
			]);

			Mediatemplate::create([
				'templateid' => $tmplt_id,
				'message' => 'image',
				'media' => $request->image,
				'createdby' => Auth::user()->id,
				'updatedby' => Auth::user()->id,
				'created_at'=> date('Y-m-d H:i:s'),
				'updated_at'=> date('Y-m-d H:i:s')
			]);

			for ($i=0; $i<count($request->type); $i++) {
				if ($request->type[$i] == 'postback') {
					Button::create([
						'templateid' => $tmplt_id,
						'type' => $request->type[$i],
						'title' => $request->title[$i],
						'nodeid' => $request->action[$i],
						'createdby' => Auth::user()->id,
						'updatedby' => Auth::user()->id,
						'created_at'=> date('Y-m-d H:i:s'),
						'updated_at'=> date('Y-m-d H:i:s')
					]);
				} else {
					Button::create([
						'templateid' => $tmplt_id,
						'type' => $request->type[$i],
						'title' => $request->title[$i],
						'resource' => $request->url[$i],
						'createdby' => Auth::user()->id,
						'updatedby' => Auth::user()->id,
						'created_at'=> date('Y-m-d H:i:s'),
						'updated_at'=> date('Y-m-d H:i:s')
					]);
				}
			}

			DB::commit();

			return back()->with('success','Successfully created node');

		} catch (\Exception $e) {

	        DB::rollback();
	        return $e->getMessage();
	        //return back()->with('error',"$e->getMessage()");

	    }

    }
}
