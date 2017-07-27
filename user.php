<?php
require_once('database.php');
 function storeUser($data)
    {
       $dbCon = connect_database(); 
       $stmt   = $dbCon->prepare("INSERT INTO users (fb_id, full_name, access_token,picture_url) VALUES ( ?, ?, ?, ?)");
       $data['pic_url'] = urlencode($data['pic_url']);
	 $stmt->bind_param("ssss", $data['id'], $data['name'], $data['access_token'], $data['pic_url']);
        
        if (!$stmt->execute()) {
            return 0;
        } else {
            return 1;
        }
        $stmt->close();
        $dbCon->close();
    }

  function deauthUser($user_id)
    {
        $dbCon = connect_database();
        $stmt   = $dbCon->prepare("UPDATE users SET `is_active`=?  WHERE `fb_id`=?");
        $status = 0;
        /* bind parameters for markers */
        $stmt->bind_param("is", $status, $user_id);
        
        if (!$stmt->execute()) {
            return 0;
        } else {
            return 1;
        }
        $stmt->close();
        $dbCon->close();

  }

