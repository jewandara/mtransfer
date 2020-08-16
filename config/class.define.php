<?php
GLOBAL $_CONSOLE; $_CONSOLE = []; //WEB PAGE PROCESS CONSOLE DATA ARRY
array_push($_CONSOLE, 'OPEN_CLASS_DIFINE_PHP:'.$_SERVER['PHP_SELF']);
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
		define('__ROOT__', dirname(dirname(__FILE__)));
		GLOBAL $_SQL; 		//SQL CONNECTION
		GLOBAL $_PREFIX;	//SQL TABLE PREFIX

		GLOBAL $_ERROR; $_ERROR = []; //ARRY MESSAGES 
		GLOBAL $_SUCES; $_SUCES = []; //ARRY MESSAGES  

		GLOBAL $_KEY; $_KEY = $_SERVER["HTTP_HOST"]."_UserSession_Key"; // THIS IS PAGE SESSION KEY
		GLOBAL $_NAME_SESSION;	//SUSER SESSION  

		GLOBAL $_SYS; //NOT ARRY
		GLOBAL $_SYS_ARRY; $_SYS_ARRY = []; //ARRY
		GLOBAL $_LOG; //ARRY
		GLOBAL $_WEB; //ARRY
		GLOBAL $_USR; //ARRY

		GLOBAL $_YEAR;
		GLOBAL $_MONTH;
		GLOBAL $_DATE;
		GLOBAL $_HOUR;
		GLOBAL $_MINIT;
		GLOBAL $_SECOND;
		GLOBAL $_T_STATE;
		GLOBAL $_DATE;
		
		GLOBAL $_CURL;
		$_CURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER["HTTP_HOST"]."/";
			
?>