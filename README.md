# fb-login-and-graph
Using Facebook for login and getting user details

*File : user-login.php*
  User logs-in from this page and facebook redirects it to login-attempt.php
  
*File: login-attempt.php*
  This file gets the long-lived token, user details and persists them to database
  
*File: user.php*
   This file has database related functions i.e. storing and updating user's info
   
*File: deauthuser.php*
   This file is pinged by facebook when any user uninstalls/remove the app
   
*File: FBAppCredentials.php*
   This file is used for storing the facebook app credentials i.e. App ID and App secret
   
*File: Database.php*
    This file contains database credentials
    
   
