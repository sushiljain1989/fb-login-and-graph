<?php
require_once('FBAppCredentials.php');
require_once('user.php');
$_SESSION['FBRLH_state']=$_GET['state']; #solution for cross site request error

#$loginHelper = $fb->getRedirectLoginHelper();

try {
	
  if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
	
	$accessToken = $redirectHelper->getAccessToken(); #Get access token
        
        #OAuthclient for fetching long term token
        $oAuthClient = $fb->getOAuth2Client();
        
        #Exchanging short lived token for a long lived token
        $longLivedAccessToken = $oAuthClient->getLongLivedAccessToken( (string) $accessToken);
	#store in session
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	
	#echo "Long lived Token: " . (string) $longLivedAccessToken;
	$response = $fb->get('/me?fields=id,name,picture', $_SESSION['facebook_access_token']);
	$user = $response->getGraphUser();
	$data['access_token'] = $_SESSION['facebook_access_token'];
	$data['name'] =  $user['name'].'<br/>';
	$data['id'] =  $user['id'].'<br/>';
	$data['pic_url'] = $user['picture']['url'];
	
	if(storeUser($data) == 1)
	    echo "Data stored";
	else
	    echo "error occurred";
    }


} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK error: ' . $e->getMessage();
  exit;
}

