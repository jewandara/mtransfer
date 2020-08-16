<?php
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
/******************************************************************/
/******************  |  --  IMPORTANT ! -- |  *********************/
/**************  CONFIGURATION PHP FILE STRUCTURE  ****************/
/******************************************************************/
	require_once("class.define.php");
	require_once("class.time.php");
	require_once("class.url.php");
	require_once("class.aes.php");
	require_once("class.session.php");
	require_once("class.sql.php");
	require_once("class.user.php");
	require_once("class.fun.php");
	require_once("class.mail.php");
	array_push($_CONSOLE, 'OPEN_CONFIG_PHP:'.$_SERVER['PHP_SELF']);

/******************************************************************/
/******************  |  --  IMPORTANT ! -- |  *********************/
/***  CREATE A SQL TABLE FOR USER LOG IN EVERY DATABASE BELLOW  ***/
/******************************************************************/
	$_MTRANSFER = new SqlServer("localhost", "mtransfer_db", "user_mtransfer", "UserMtransfer#365", "mt_");
	$_PREFIX = "mt_";
	$STMT = $_SQL->prepare("SELECT id, name, value FROM ".$_PREFIX."configuration");	
	$STMT->execute();
	$STMT->bind_result($id, $name, $value);
	while ($STMT->fetch()){ $settings[$name] = array('id' => $id, 'name' => $name, 'value' => $value); }
	$STMT->close();
	$_SYS = array(
		'DOMAIN' => $settings['DOMAIN']['value'], 
		'TITLE' => $settings['TITLE']['value'], 
		'URL' => $settings['URL']['value'], 
		'DESCRIPTION' => $settings['DESCRIPTION']['value'], 
		'EMAIL_HOST' => $settings['EMAIL_HOST']['value'],
		'EMAIL_USER' => $settings['EMAIL_USER']['value'],
		'EMAIL_PASS' => $settings['EMAIL_PASS']['value'],
		'EMAIL_SMTP' => $settings['EMAIL_SMTP']['value'],
		'EMAIL_PORT' => $settings['EMAIL_PORT']['value'],
		'WEB_MAIL' => $settings['WEB_MAIL']['value'], 
		'INFO_MAIL' => $settings['INFO_MAIL']['value'], 
		'ADMIN_MAIL' => $settings['ADMIN_MAIL']['value'], 
		'WEB_EMAIL_HEADER' => $settings['WEB_EMAIL_HEADER']['value'],
		'INFO_EMAIL_HEADER' => $settings['INFO_EMAIL_HEADER']['value'],
		'ADMIN_EMAIL_HEADER' => $settings['ADMIN_EMAIL_HEADER']['value'],
		'TEMPLATE_PUBLIC' => $settings['TEMPLATE_PUBLIC']['value'],  
		'TEMPLATE_ADMIN' => $settings['TEMPLATE_ADMIN']['value'],  
		'TEMPLATE_USER' => $settings['TEMPLATE_USER']['value'], 
		'TEMPLATE_PUBLIC' => $settings['TEMPLATE_PUBLIC']['value'], 
		'TEMPLATE_WEB' => $settings['TEMPLATE_WEB']['value']
	);

?>