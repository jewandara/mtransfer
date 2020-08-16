<?php
array_push($_CONSOLE, 'LOAD_CLASS_SESSION_PHP:'.$_SERVER['PHP_SELF']);
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

class AesSession {

	private function generateCode($length = 50) {
	    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charLength = strlen($char);
	    $random = '';
	    for ($i = 0; $i < $length; $i++) { $random .= $char[rand(0, $charLength - 1)]; }
	    return $random;
	}

	private function validateCode($code) {
	    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charLength = strlen($char);
	    $random = '';
	    for ($i = 0; $i < $length; $i++) { $random .= $char[rand(0, $charLength - 1)]; }
	    return $random;
	}

	public function validateSession() {
		//GLOBAL DATA
		GLOBAL $_SQL, $_PREFIX, $_WEB, $_CONSOLE, $_NAME_SESSION, $_KEY;
		array_push($_CONSOLE, 'STARTING_SESSION_VALIDATE_AND_INSERT_LOG_RECODE');
		try {
			if(!empty($_WEB["GET"]["session"])){

				// OLD SESSION CREATE
				$_DATA_SESSION = str_replace(" ", "+", $_WEB["GET"]["session"]);
				$aes = new AES("", $_KEY, 256);
		    	$aes->setData($_DATA_SESSION);
		    	$session = $aes->decrypt();

				//print_r($session);
				// DECORDERED OLD SESSION
				$DE_CODE_SESSION = explode("#", $session, 3);
				$_SESSION_DATE = NULL;
				$_SESSION_CODE = NULL;

				if(!empty($DE_CODE_SESSION[0])){ 
					$_NAME_SESSION = $DE_CODE_SESSION[0];
					if(!empty($DE_CODE_SESSION[1])){ 
						$_SESSION_DATE = $DE_CODE_SESSION[1]; 
						if(!empty($DE_CODE_SESSION[2])){
							$_SESSION_CODE = $DE_CODE_SESSION[2];
							$sql_query = "INSERT INTO `".$_PREFIX."log_tb`(`name`, `url`, `sqltime`) VALUES ('".addslashes($_NAME_SESSION)."', '".addslashes(json_encode($_WEB))."', '".addslashes($_SESSION_DATE)."')";
							/*echo $sql_query;*/
							if (mysqli_query($_SQL, $sql_query)) {
								array_push($_CONSOLE, 'SESSION_VALIDATE_WITH_LOG_RECODE_INSERT_SUCCESS');
								return true; 
							} else {
								array_push($_CONSOLE, 'SESSION_VALIDATE_SESSION_SQL_ERROR');
								return false; 
							}
						}
						else{
							array_push($_CONSOLE, 'SESSION_VALIDATE_SESSION_HAS_NO_VALID_DATE_ERROR');
							return false; 
						}
					}
					else{
						array_push($_CONSOLE, 'SESSION_VALIDATE_SESSION_HAS_NO_VALID_USER_ID_ERROR');
						return false; 
					}
				}
				else{
					array_push($_CONSOLE, 'SESSION_VALIDATE_SESSION_HAS_NO_VALID_SESSION_ID_ERROR');
					return false; 
				}
			}
			else{
				array_push($_CONSOLE, 'SESSION_VALIDATE_EMPTY_URL_DATA_ERROR');
				return false; 
			}
		}
		catch(Exception $ex) {
			array_push($_CONSOLE, 'SESSION_VALIDATE_EXCEPTION_ERROR:'.$ex);
			return false; 
		}
	}

	public function validateCookie($_set) {

		//GLOBAL DATA
		GLOBAL $_SQL, $_PREFIX, $_WEB, $_CONSOLE, $_NAME_SESSION, $_YEAR, $_MONTH, $_DATE, $_HOUR, $_MINIT, $_SECOND, $_DATE, $_KEY;
		array_push($_CONSOLE, 'STARTING_COOKIE_VALIDATE_AND_INSERT_LOG_RECODE');
		try {
			//if(!isset($_COOKIE["dialog_sira"])){

				/*				
				$COOKIE_STR = null;
				foreach ($_COOKIE as $STRING => $VALUE){ 
					$COOKIE_STR = $COOKIE_STR.$STRING."=".$VALUE."; "; 
				}
				//echo $COOKIE_STR;
				//print_r($_COOKIE["dialog_sira"]);

				//CURL CONNECTION
				$CH = curl_init();
				//curl_setopt($CH, CURLOPT_HTTPHEADER, array("Cookie: dialog_sira=".$_COOKIE["dialog_sira"]));
				curl_setopt($CH, CURLOPT_HTTPHEADER, array("Cookie: ".$COOKIE_STR));
				curl_setopt($CH, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($CH, CURLOPT_URL, 'https://sira.dialog.lk/oapi/getUserDetails');
				$RESULT = curl_exec($CH);
				curl_close($CH);
				$USER_NAME = json_decode($RESULT);
				*/

				$CODE = $this->generateCode(20);
				$_DATE = $_YEAR."-".$_MONTH."-".$_DATE." ".$_HOUR.":".$_MINIT.":".$_SECOND;
				//$SESSION_DATA = ($USER_NAME->userName)."#".$_YEAR."-".$_MONTH."-".$_DATE." ".$_HOUR.":".$_MINIT.":".$_SECOND."#".$CODE;
				$SESSION_DATA = "RACHITHA_09415#".$_DATE."#".$CODE;
				$aes = new AES($SESSION_DATA, $_KEY, 256);
				$_DATA_SESSION = $aes->encrypt();

				//$_NEW_SESSION = $USER_NAME->userName;
				$_NAME_SESSION = "RACHITHA_09415";
				if($_set){ echo "saveSession('".$_DATA_SESSION."');"; }
				$sql_query = "INSERT INTO `".$_PREFIX."log_tb`(`name`, `url`, `sqltime`) VALUES ('".addslashes($_NAME_SESSION)."', '".addslashes(json_encode($_WEB))."', '".addslashes($_DATE)."')";
				/*echo $sql_query;*/
				if (mysqli_query($_SQL, $sql_query)) {
					array_push($_CONSOLE, 'COOKIE_VALIDATE_WITH_LOG_RECODE_INSERT_SUCCESS');
					return true; 
				} else {
					array_push($_CONSOLE, 'COOKIE_VALIDATE_SESSION_SQL_ERROR');
					return false; 
				}	
/*			}
			else{
				array_push($_CONSOLE, 'COOKIE_VALIDATE_EMPTY_COOKIE_DATA_ERROR');
				return false; 
			}*/
		}
		catch(Exception $ex) {  
			array_push($_CONSOLE, 'COOKIE_VALIDATE_EXCEPTION_ERROR:'.$ex);
			return false; 
		}
	}
}



?>