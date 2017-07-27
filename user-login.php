<?php
require_once 'FBAppCredentials.php';
 if(!isset($_SESSION['facebook_access_token']))
    {
	$loginURL = $redirectHelper->getLoginUrl($redirectCallbackURL, $permissionsNeeded);
 	echo '<a href="'.htmlspecialchars($loginURL).'">Fb Login</a>';
    }
 else
    {
	echo 'You\'re already logged in';
	
    }
