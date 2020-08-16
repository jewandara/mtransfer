<?php
array_push($_CONSOLE, 'OPEN_CLASS_SQL_PHP:'.$_SERVER['PHP_SELF']);
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

class SqlServer {
	//private $db_host = NULL;			//Host Address
	//private $db_name = NULL; 			//Name of Database
	//private $db_user = NULL;    		//Name of DB User
	//private $db_pass = NULL;			//Password for DB User
	//private $db_prefix = NULL;
	function __construct($_HOST, $_DB, $_USER, $_PASS, $_PX) { 
		GLOBAL $_SQL, $_CONSOLE, $_PREFIX;
		$_PREFIX = $_PX;
		$_SQL = new mysqli($_HOST, $_USER, $_PASS, $_DB);
		if(mysqli_connect_errno()) { 
			array_push($_CONSOLE, "SQL_CONNECTION_ERROR:".mysqli_connect_errno()); 
			exit(); 
		}
		else{
			array_push($_CONSOLE, "SQL_CONNECTION_SUCCESS");
		}
	}
}


?>