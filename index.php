<?php
require_once("config/config.php");

if( !empty($_WEB['URL'][1])&&($_WEB['URL'][1] == "api") ){ require_once("_api/index.php"); }
else{
	require_once("_content/header.php");
	switch ($_WEB['URL'][1]) {
		case "":
			require_once("_public/home.php");
			break;
		case "index":
			require_once("_public/home.php");
			break;
		case "home":
			require_once("_public/home.php");
			break;
		case "login":
			require_once("_public/login.php");
			break;
		case "register":
			require_once("_public/register.php");
			break;
		case "register-next":
			require_once("_public/register-next.php");
			break;
		case "search":
			require_once("_public/search.php");
			break;
		default:
			require_once("_public/home.php");
			break;
	}
	require_once("_content/footer.php");
}

?>