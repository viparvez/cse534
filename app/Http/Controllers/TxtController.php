<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Textresponse;
use App\Http\Controllers\NextactionController as Action;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
use App\Listener;
use App\Http\Controllers\ResponseController as Response;

class TxtController extends Controller
{
    public function create($request){

    	$result = Textresponse::where(['nodeid' => $request])->first();

    	$array = array(
			"text" => $result->message
    	);

    	return $array;

    }

    public function Listener($nodeid,$recipientid,$acc_token){
        Listener::where(['nodeid']);
    }

    public function createlistener(Request $request){

        $str_arr = explode (",", $request->listener);  
       
        try{

            DB::beginTransaction();

            $id = DB::table('nodes')->insertGetId(
                [
                    'nodename' => $request->nodename,
                    'chatbotid' => $request->botid,
                    'nodetypeid' => '5',
                    'nextaction' => $request->action,
                    'createdby' => Auth::user()->id,
                    'updatedby' => Auth::user()->id,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]
            );

            foreach ($str_arr as $key => $value) {
                Listener::create([
                    'nodeid' => $id,
                    'listener' => $value,
                    'createdby' => Auth::user()->id,
                    'updatedby' => Auth::user()->id,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]);
            }

            DB::commit();

            return back()->with('success','Successfully created node');

        } catch (\Exception $e) {

            DB::rollback();
            return $e->getMessage();
            //return back()->with('error',"$e->getMessage()");

        }

    }



    public function insert(Request $request){
    	
    	$validator = Validator::make($request->all(), [
            'nodename' => 'required',
            'text' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return back()->with('error',$validator->errors()->all());
        }

    	try{

    		DB::beginTransaction();

    		$id = DB::table('nodes')->insertGetId(
    			[
    				'nodename' => $request->nodename,
    				'chatbotid' => $request->botid,
    				'nodetypeid' => '1',
    				'nextaction' => $request->action,
    				'createdby' => Auth::user()->id,
    				'updatedby' => Auth::user()->id,
    				'created_at'=> date('Y-m-d H:i:s'),
    				'updated_at'=> date('Y-m-d H:i:s')
    			]
    		);

    		Textresponse::create([
    			'nodeid' => $id,
    			'message' => $request->text,
    			'mid' => '',
    			'reply' => '0',
    			'createdby' => Auth::user()->id,
    			'updatedby' => Auth::user()->id,
    			'created_at'=> date('Y-m-d H:i:s'),
    			'updated_at'=> date('Y-m-d H:i:s')
    		]);

    		DB::commit();

    		return back()->with('success','Successfully created node');

    	} catch (\Exception $e) {

            DB::rollback();
            return back()->with('error',$e->getMessage());

        }

    }
}
