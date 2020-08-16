<?php
array_push($_CONSOLE, 'OPEN_CLASS_URL_PHP:'.$_SERVER['PHP_SELF']);
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

			$CURRENT_URL_ARRY = $_SERVER['REQUEST_URI'];
			$CURRENT_URL_ARRY_DATA = explode("/", $CURRENT_URL_ARRY );
			if(isset($_POST) && !empty($_POST)){ $POST_DATA = $_POST; } else { $POST_DATA = array("0"=>"0"); }
			if(isset($_GET) && !empty($_GET)){ $GET_DATA = $_GET; } else { $GET_DATA = array("0"=>"0"); }
			$_WEB = array("URL"=>$CURRENT_URL_ARRY_DATA, "POST"=>$POST_DATA, "GET"=>$GET_DATA);

?>