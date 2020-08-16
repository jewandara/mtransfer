<?php
array_push($_CONSOLE, 'OPEN_CLASS_FUNCTION_PHP:'.$_SERVER['PHP_SELF']);
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
/***************  CHECK USER AUTHENTICATION PROCESS  **************/
/******************************************************************/
function AUTHENTICATION($_set){
	GLOBAL $_CONSOLE;
	$AesUserSession = new AesSession();
	if($AesUserSession->validateSession()){
		$UserS = new User();
		if($UserS->login()){	
			array_push($_CONSOLE, 'USER_AUTHENTICATION_SUCCESS_WITH_SESSION_ACCESS');
			return true; 
		} else{
			array_push($_CONSOLE, 'USER_AUTHENTICATION_FAILED_WITH_SESSION_ACCESS');
			return false; 
		}
	}
	elseif($AesUserSession->validateCookie($_set)){
		$UserC = new User();
		if($UserC->login()){	
			array_push($_CONSOLE, 'USER_AUTHENTICATION_SUCCESS_WITH_COOKIE_ACCESS');
			return true; 
		} else{
			array_push($_CONSOLE, 'USER_AUTHENTICATION_FAILED_WITH_COOKIE_ACCESS');
			return false; 
		}
	}
	else{ 
		array_push($_CONSOLE, 'USER_AUTHENTICATION_FAILED_WITH_AES_ENCRYPTION');
		return false; 
	}
}



function print_unauthorized_access(){
	GLOBAL $_CONSOLE;
	echo " 
    <div class='modal-popup-content'>
            <form class='modal-form' name='map_incident'>
		        <div class='loading-window' style='color:#fff;'>
		        	<img src=api.sira/img/authentication.png' alt='authentication' class='loading-img' ><br><br>
		        	<h1 class='status-error' style='color:'>UNAUTHORIZED ACCESS PLEASE LOGIN</h1>";
		        	$_CONSOLE_STRING = implode("\n", $_CONSOLE);
					echo $_CONSOLE_STRING;
		        	echo "
		        </div>
            </form>
    </div>";
}



function print_invalid_system(){
	GLOBAL $_SYS_ARRY;
	echo " 
    <div class='modal-popup-content'>
            <form class='modal-form' name='map_incident'>
		        <div class='loading-window' style='color:#fff;'>
		        	<img src='".$_CURL."api.sira/img/invalid_system.png' alt='invalid' class='loading-img' ><br><br>
		        	<h1 class='status-error'>INVALID SYSTEM ACCESS</h1>";
		        	$_SYS_STRING = implode("\n", $_SYS_ARRY);
					echo $_SYS_STRING;
		        	echo "
		        </div>
            </form>
    </div>";
}

?>