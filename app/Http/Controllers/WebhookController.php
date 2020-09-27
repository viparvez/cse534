<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenerictemplateController;
use App\Page;

class WebhookController extends Controller
{

    public function handle(){

    	$input = file_get_contents('php://input');

    	//file_put_contents("/var/www/sirajummonir.xyz/storage/logs/input.txt",$input);

    	$input = json_decode($input, true);

    	$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];

        $pageId = $input['entry'][0]['messaging'][0]['recipient']['id'];

        //return (new GenerictemplateController)->handle(null,'generic_1');

    	if (isset($input['entry'][0]['messaging'][0]['message']['text'])) {

    		$messageText = $input['entry'][0]['messaging'][0]['message']['text'];

            //echo "I am leaving handler</br>";

            return app('App\Http\Controllers\ResponseController')->findListener(
                            $messageText, 
                            $this->getPageinfo($pageId)->pageaccid, 
                            $this->getPageinfo($pageId)->createdby,
                            $senderId
                        );

    	} elseif (isset($input['entry'][0]['messaging'][0]['postback']['payload'])) {

            $nodeid = $input['entry'][0]['messaging'][0]['postback']['payload'];
    		//echo "moving towards ROUTER</br>";
            return app('App\Http\Controllers\ResponseController')->checkNode(
                            $nodeid, 
                            $senderId, 
                            $this->getPageinfo($pageId)->Chatbot->accesstoken,
                        );

    	}

        //return app('App\Http\Controllers\ButtonController')->create('Welcome_20190280');

        //return app('App\Http\Controllers\ResponseController')->checkNode('Welcome_20190280');

        $response = [

            'recipient' => [ 'id' => $senderId ],

            'message' => [ 'text' => $messageText]

        ];

        if(apiCurl($this->getUrl('messaging'), $response)){
        	return "message sent";
        }

    }

    /*Setting webhook*/

    public function setWebhook(){

        $hubVerifyToken="ultrasbot";

        if ($_GET['hub_verify_token'] === $hubVerifyToken) {

            return $_GET['hub_challenge'];

        }

        return $_GET['hub_verify_token'];
    }

    /*Retrieve the messenger access token*/

    private function getToken(){

        $accessToken ="EAAILHSBzbqsBANTca9qjsfk212oFrRTxRwMfSpsVuE2r22Qy3bqwxeWcMPXWZCBUZAwmv8CfPOMJch7pswPmxFfnLNbG3k1zEvbvakAEyxZBr7HjFRoiobZB0D1sMNbsqq3iQq5QAWxkzXqSOmqOnTkro7I8x7Hob0ciUEVSRylPzZAgBnt7J";

        return $accessToken;
    }


    /*Generate URL*/

    private function getUrl($query){

        switch ($query) {
            case 'messaging':
                return "https://graph.facebook.com/v2.6/me/messages?access_token=".$this->getToken();
                break;
            
            case 'mediaupload':
                return "https://graph.facebook.com/v8.0/me/message_attachments?access_token=".$this->getToken();
                break;

            default:
                return "https://graph.facebook.com/v2.6/me/messages?access_token=".$this->getToken();
                break;
        }

    }



    public function getPageinfo($pageId){
        $page = Page::where(['pageaccid' => $pageId])->first();
        return $page;
    }


}
