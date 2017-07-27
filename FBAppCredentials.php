<?php
if(!session_id()){
    session_start();
}

# Including PHP SDK
require_once './vendor/autoload.php';
#importing FB libs
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$appID         = 'app_id'; #FB App-ID
$appsecret     = 'app_secret'; //FB App-secret
$redirectCallbackURL   = 'http://www.stupidsushil.me/login-attempt.php'; //Call back url after login
$permissionsNeeded = array('email');  //Permissions needed, In this case, Full name, ID and Picture

$fb = new Facebook(array(
    'app_id' => $appID,
    'app_secret' => $appsecret,
    'default_graph_version' => 'v2.10',
    'persistent_data_handler' => 'session',
));

$redirectHelper = $fb->getRedirectLoginHelper();

