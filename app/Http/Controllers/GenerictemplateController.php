<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Generictemplate;
use App\Node;

class GenerictemplateController extends Controller
{
    public function handle($nextaction){

    	$node = Node::where(['nodename' => 'generic_1'])->first();

    	$array = array(
    		"recipient" => array(
    			"id" => "4491612904214066"
    		),
    		"message" => array(

    			"attachment" => array(

    				"type" => "template",

    				"payload" => array(

    					"template_type" => "generic",

    					"elements" => array(

    						/*array(

	    						"title" => "Welcome!",
	    						"image_url" => "https://petersfancybrownhats.com/company_image.png",
	    						"subtitle" => "We have the right hat for everyone.",
	    						"default_action" => array (
					              "type" => "web_url",
					              "url" => "https://petersfancybrownhats.com/view?item=103",
					              "webview_height_ratio" => "tall"
					              
					            ),

					            "buttons" => array (
					            	array(
					            		"type" => "web_url",
					            		"url" => "https://petersfancybrownhats.com",
					            		"title" => "View Website"
					            	),

					            	array(
					            		"type" => "postback",
			                            "title" => "Start Chatting",
			                            "payload" => "DEVELOPER_DEFINED_PAYLOAD"
					            	)
					            )
	    					)*/
    					)
    				)
    			)
    		)
    	);


    	$elements = array();

    	foreach ($node->Template->Subtemplate as $key => $value) {

	    	$array['message']['attachment']['payload']['elements'][$key] = array(

				"title" => $node->Template->Subtemplate[0]->Generictemplate[$key]->title,
				"image_url" => $node->Template->Subtemplate[0]->Generictemplate[$key]->image_url,
				"subtitle" => $node->Template->Subtemplate[0]->Generictemplate[$key]->subtitle,
				"default_action" => array (
	              "type" => "web_url",
	              "url" => $node->Template->Subtemplate[0]->Generictemplate[$key]->default_url,
	              "webview_height_ratio" => "tall"
	              
	            ),

	            "buttons" => array (
	            	array(
	            		"type" => "web_url",
	            		"url" => "https://petersfancybrownhats.com",
	            		"title" => "View Website"
	            	),

	            	array(
	            		"type" => "postback",
                        "title" => "Start Chatting",
                        "payload" => "DEVELOPER_DEFINED_PAYLOAD"
	            	)
	            )
			);

    	}

    	//return $array;

    	apiCurl("https://graph.facebook.com/v2.6/me/messages?access_token=EAAILHSBzbqsBAKqrYQTUOgeMd39IDAJmomwhSP6YuYj1toamwUWZBoAJM2t6uZCyfIUFklG7YosYXJ0ZA18HoGwQK457axEZA9PWPI7VCmk6NRoSgeYZAw0NPJBNFFjQtSU6JFCDcdRcUgR4OZBMQBMQBY8LhitnY6asovt5TeJIajvWKSZBWCV", $array);
    }
}
