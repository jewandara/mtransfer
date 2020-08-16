<?php
array_push($_CONSOLE, 'OPEN_CLASS_USER_PHP:'.$_SERVER['PHP_SELF']);
/*
	|--------------------------------|
	|          +`--                  |
	|                                |
	|       ``                       |
	|      /:.                       |
	|                                |
	|       ./     -`                |
	|        /h/   .`        +       |
	|        .-.    -s:      `+      |
	|               ./-      /o      |
	|                        `       |
	|             ..      `/o        |
	|           ++-`                 |
	|                                |
	|                                |
	|       .:-     `//              |
	|       .y/     `o+              |
	|--------------------------------|
	* Created By J.R.M. Jeewandara
	* +94 77 363 2682
	* jewandara@gmail.com
	* ---------------------------------------------
	* Dialog Axiata PLC, Enterprise Solution Delivery
	* +94 77 733 2829
	* rachitha.jeewandara@dialog.lk
*/

class User {
	private function access_server($system, $domain) {
		$mysqli = new mysqli("localhost", "user_user", "ZU6AvgMq#3jy0v1pb", "user_db");
		$stmt = $mysqli->prepare("CALL login('".$system."', '".$domain."', @access)");
		$stmt->execute();
		$stmt = $mysqli->prepare("SELECT @access AS access");
		$stmt->execute();
		$stmt->bind_result($access);
		$stmt->fetch();
		$stmt->close();
		return $access;
		//echo $access;
	}

	public function login(){
		GLOBAL $_SYS, $_USR, $_USR, $_NAME_SESSION, $_CONSOLE;
		array_push($_CONSOLE, 'LOGIN:'.$_NAME_SESSION."@".$_SYS);
		$DATA = $this->access_server($_SYS, $_NAME_SESSION);
		if(!empty($DATA)) { $_USR = json_decode($DATA, TRUE); return true; } 
		else { $_USR = NULL; return false; }
	}
}

?>