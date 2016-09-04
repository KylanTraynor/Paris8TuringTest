<?php

/**
 * Class User
 * Handles the user's data
 */
class User
{
	/**
	 * @var String The username of this user
	 */
	private $username;
	/**
	 * @var String The age of the user
	 */
	private $age;
	/**
	 * @var String The knowledge of the user about AI
	 */
	private $ia;
	/**
	 * @var String The email of the user
	 */
	private $mail;
	/**
	 * @var String The gender of the user
	 */
	private $gender;
	
	function User($username, $age, $gender, $ia, $mail)
	{
		if (isset($username))
		{
			$this->username = $username;
			$this->age = $age;
			$this->gender = $gender;
			$this->ia = $ia;
			if (isset($mail))
				$this->mail = $mail;
			else
				$this->mail = "";
			
		} else {
			
		}
	}
	
	public function save()
	{
		$myfile = fopen("users/" . $this->username . ".txt", "w") or die("Unable to open file!");
		$username = $this->username;
		$age = $this->age;
		$gender = $this->gender;
		$ia = $this->ia;
		$mail = $this->mail;
		$txt = <<<EOD
		Username: $username\n
		Age: $age\n
		Gender: $gender\n
		IA: $ia\n
		E-Mail: $mail\n
EOD;
		fwrite($myfile, $txt);
		fclose($myfile);
	}
}
?>