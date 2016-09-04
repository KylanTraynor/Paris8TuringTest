<?php
    session_start();
    require_once("../www/dbcon.php");
    if (isAjax()) {
    	$data = array();
    	$username = cleanInput($_POST['userid']);
		
    	if (checkVar($username)) {
    	
    		$getUsers = "SELECT *
    					 FROM chat_users
    					 WHERE username = '$username'";
    					 
    		if (!hasData($getUsers)) {
    		  $data['result'] = "<div class='message success'>Great! You found a username not in use</div>";
    		  $data['inuse'] = "notinuse";
    		} else {
    		  $data['result'] = "<div class='message warning'>That username is already in use. (Usernames take 2 minutes without use to expire)</div>";
    		  $data['inuse'] = "inuse";
    		}
    		
    		echo json_encode($data);
    			
    	}
    	
    } else {
        $username = cleanInput($_POST['userid']);
		
    	if (checkVar($username)) {
    	
    		$getUsers = "SELECT *
    					 FROM chat_users
    					 WHERE username = '$username'";
    		
    		if (!hasData($getUsers)) {
    		
    			$now = time();
    		
    		    $postUsers = "INSERT INTO `chat_users` (
    					`id` ,
    					`username` ,
    					`status` ,
    					`time_mod`
    					)
    					VALUES (
    					NULL , '$username', '1', '$now'
    					)";
    					
    		    mysql_query($postUsers);
    		    $roomname = $username;
				$filename = $roomname . ".txt";
				$createRoom = "INSERT INTO `chat_rooms` (
    					`id` ,
    					`name` ,
    					`numofuser` ,
    					`file`
    					)
    					VALUES (
    					NULL , '$roomname', '1', '$filename'
    					)";
    					
    		    mysql_query($createRoom);
				
    			$_SESSION['userid'] = $username;
				$myfile = fopen("users/" . $username . ".txt", "w") or die("Unable to open file!");
				$age = $_POST['userage'];
				$gender = $_POST['usergender'];
				$ia = $_POST['useria'];
				$cs = $_POST['usercs'];
				$mail = $_POST['usermail'];
				$txt = <<<EOD
Username: $username
Age: $age
Gender: $gender
IA: $ia
CS: $cs
E-Mail: $mail
EOD;
				fwrite($myfile, $txt);
				fclose($myfile);
				header('Location: ./room/?name=' . $roomname);	
			} else {
				header('Location: ./?error=1');
    		}
    
    	}
    
    }

?>