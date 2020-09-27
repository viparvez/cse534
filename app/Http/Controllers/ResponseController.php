<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use App\Listener;
use App\Page;

class ResponseController extends Controller
{
    /*Check Node*/

    public function checkNode($nodeid, $recipientid, $acc_token){
    	//echo "Entered router</br>";
    	$array = array(
    		"recipient" => array(
    			"id" => $recipientid,
    		)
    	);

    	$node = Node::where(['nodeid' => $nodeid])->first();

    	$array['message'] = $this->createResponse(
                                $node->Nodetype->nodetype,
                                $node->nodeid, 
                                $recipientid, 
                                $acc_token
                            );

    	apiCurl("https://graph.facebook.com/v2.6/me/messages?access_token=".$acc_token, $array);

    	return $this->nextaction($node->nextaction, $acc_token, $recipientid);

    }


    public function nextaction($nextaction, $accesstoken, $recipientid){

        $array = array(
            "recipient" => array(
                "id" => $recipientid,
            )
        );

        for ($i=0; $i < $i+1; $i++) { 

            if ($nextaction == null) {
                break; 
                
            } else {

                $nextNode = Node::where(['nodeid' => $nextaction])->first();
                
                unset($array['message']);
                
                $array['message'] = $this->createResponse(
                                        $nextNode->Nodetype->nodetype,
                                        $nextNode->nodeid, 
                                        $recipientid, 
                                        $accesstoken
                                    );
                apiCurl("https://graph.facebook.com/v2.6/me/messages?access_token=".$accesstoken, $array);    

                $nextaction = $nextNode->nextaction;  

            }

        }

    }


    /*Check Node*/

    public function findListener($message, $pageid, $userid, $recipientid){
        
        $match = Listener::where(['listener' => $message])->where(['createdby' => $userid])->first();

        if (is_null($match)) {
            return 'no match found';
        }

        $page = Page::where(['pageaccid' => $pageid])->first();

        return $this->nextaction($match->Node->nextaction,$page->Chatbot->accesstoken,$recipientid);

    }


    /*Create Response*/
    private function createResponse($nodetype, $payload, $recipientid, $acc_token){
        //echo "creating response </br>";
    	switch ($nodetype) {
    		case 'buttons':
    			return app('App\Http\Controllers\ButtonController')->create($payload);
    			break;

    		case 'text':
    			return app('App\Http\Controllers\TxtController')->create($payload);
    			break;
    		
            case 'listener':
                return $this->nextaction($payload,$acc_token,$recipientid);
                break;

            case 'media':
                //echo "Forwarded to Media Creator </br>";
                return app('App\Http\Controllers\MediatemplateController')->create($payload,$acc_token,$recipientid);
                break;

    		default:
    			# code...
    			break;
    	}

    }


}
