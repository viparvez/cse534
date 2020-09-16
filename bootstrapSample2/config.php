<?php
session_start();
require_once('vendor/autoload.php');

#Dear Parvez bhai, please put your OWN app_id and app_secret
#The app_id and app_secret are from my end

$FBObject = new \Facebook\Facebook([
	'app_id' => '373261863849789',
	'app_secret' => '38697dad1aa122414237d149cc545caf',
	'default_graph_version' => 'v2.10'
]);

$handler = $FBObject -> getRedirectLoginHelper();
?>