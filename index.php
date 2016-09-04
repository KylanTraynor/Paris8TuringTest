<?php 
    session_start();

    if (!isset($_SESSION['userid'])): 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Paris8 Online Study</title>
    
    <link rel="stylesheet" type="text/css" href="main.css" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2" type="text/javascript"></script>
    <script type="text/javascript" src="check.js"></script>
</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
        	<h1><a href="http://www.univ-paris8.fr/en/" target="_blank">Paris8</a></h1>
        </div>
        
    	<div id="section">
        	<form method="post" action="jumpin.php">
				<p>(!)Please use a computer. Phones have a tendency to not update the chat. Use something like Chrome, Firefox or Edge (All 3 were tested.)</p>
				<p>This username will be displayed during the conversation. Please do not use informations you are not willing to share. (Avoid using your actual name.)</p>
            	<label>Username:</label><br>
                <input type="text" id="userid" name="userid" /><br><br>
				<p>Entering an e-mail address will give us the possibility to contact you later to give you access to the results of this study. It is not required in order to participate, will only be kept for the duration of this study and will not be given to any third-party.</p>
				<label>E-mail:</label><br>
				<input type="text" id="usermail" name="usermail" /><br><br>
				<div class="field form-inline radio" id="usergender">
					<label class="radio" for="txtGender">Gender: <label/><br>
					<input class="radio" type="radio" name="usergender" value="female" checked="true"/><span>Female</span>
					<input class="radio" type="radio" name="usergender" value="male"/><span>Male</span>
				</div>
				<label>Age:</label><br>
				<input type="text" id="userage" name="userage" /><br><br>
				<p>Please type below a number between 1 and 9 rating your knowledge of Artificial Intelligence. 1 meaning no knowledge, 9 meaning expert.</p>
				<label>Artificial Intelligence Knowledge:</label><br>
				<input type="text" id="useria" name="useria" /><br><br>
				<p>Please type below a number between 1 and 9 rating your knowledge of Computer Science. 1 meaning no knowledge, 9 meaning expert.</p>
				<label>Computer Science Knowledge:</label><br>
				<input type="text" id="usercs" name="usercs" /><br><br>
				<p>By clicking on the button below, you certify having been informed that the textual conversation you're about to have is going to be recorded for the purpose of research in Artificial Intelligence and Human Cognition. You also certify having been informed that your e-mail address will only be used to contact you directly, and will not be shared or used beyond the scope of this study.</p>
                <input type="submit" value="I agree and I am ready to start" id="jumpin" />
            </form>
        </div>
		
		<div id="footer">
			<p>Chat developped by Baptiste Jacquet from a model by Chris Coyier available on <a href="https://css-tricks.com/chat2/" target="_blank">CSS-TRICKS</a>.</p>
		</div>
        
        <div id="status">
        	<?php if (isset($_GET['error'])): ?>
        		<!-- Display error when returning with error URL param? -->
        	<?php endif;?>
        </div>
        
    </div>
    
</body>

</html>

<?php 
    else:
        require_once("chatrooms.php");
    endif; 
?>