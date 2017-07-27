<?php
function connect_database()
    {
        $con = mysqli_connect("db_host","db_user","db_passwrod","db_name");

        if(mysqli_connect_errno($con))
            {
		echo "Connection to database failed ".mysqli_connect_error();
		die;
            }
	else
            return $con;
     }	
