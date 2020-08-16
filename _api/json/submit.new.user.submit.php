<?php    
/*            
document.getElementById("submitSuccessMessage").style.display = "block";
document.getElementById("submitSuccessMessage").innerHTML = "<div class='alert alert-success'><h5>Hi "+_uname_+",</h5><br><strong>Your form has been submitted successfully !<br>ඔබගේ පෝරමය සාර්ථකව ඉදිරිපත් කර ඇත !</strong><br><br>Our agent will contact you soon to schedule your mutual transfer.<br>ඔබගේ අන්‍යෝන්‍ය මාරුව උපලේඛනගත කිරීම සඳහා අපගේ නියෝජිතයා ඉක්මනින් ඔබ හා සම්බන්ධ වනු ඇත.<br>For More, Please call us : ( +94 ) 070 400 8919</div>";
document.getElementById("content-register-form").style.display = "none";
LOAD_JSON("submit_new_user_submit", "&crdid="+_crDistrict_+"&crp="+_crPlace_+"&period="+_period_+"&exdid_="+_exDistrict_+"&exp="+_exPlace_);
*/

function getMonthNumber($_MONTH_)
{
	$months = array( 
		1 => 'January',
		2 => 'February',
	    3 => 'March',
	    4 => 'April',
	    5 => 'May',
	    6 => 'June',
	    7 => 'July',
	    8 => 'August',
	    9 => 'September',
	    10=> 'October',
	    11 => 'November',
	    12 => 'December'
	);
	return array_search($_MONTH_, $months);
}

function getUserID($Uid)
{
    global $_SQL; 
    $sql = "SELECT Id FROM `mt_profile` WHERE Uid = '".$Uid."' LIMIT 1";
    $result = $_SQL->query($sql);
    $RE = null;
    if ($result->num_rows > 0) { $RE = $result->fetch_assoc(); }
    return $RE['Id'];
}

function getUserType($Uid)
{
    global $_SQL; 
    $sql = "SELECT `id`, `role`, `type` FROM `mt_roles` WHERE `id` = ( SELECT `rid` FROM `mt_users` WHERE Uid = '".$Uid."' LIMIT 1 ) LIMIT 1 ";
    $result = $_SQL->query($sql);
    $RE = null;
    if ($result->num_rows > 0) { $RE = $result->fetch_assoc(); }
    return $RE;
}

function checkLocation($_TYPE_, $_DID_, $_NAME_)
{
    global $_SQL;
	if($_TYPE_ == "T"){
		$sql =  "SELECT id FROM `mt_location_schools` WHERE did = ".$_DID_." AND `name` = '".$_NAME_."' LIMIT 1";
	}
	else if($_TYPE_ == "N"){
		$sql =  "SELECT id FROM `mt_location_hospitals` WHERE did = ".$_DID_." AND `name` = '".$_NAME_."' LIMIT 1";
	}
	else if($_TYPE_ == "O"){
		$sql =  "SELECT id FROM `mt_location_others` WHERE did = ".$_DID_." AND `name` = '".$_NAME_."' LIMIT 1";
	}
	else{
		$sql =  "SELECT id FROM `mt_location_others` WHERE did = ".$_DID_." AND `name` = '".$_NAME_."' LIMIT 1";
	}
    $result = $_SQL->query($sql);
    $RE = null;
    if ($result->num_rows > 0) { $RE = $result->fetch_assoc(); return [ 0, $RE['id']]; }
    else{ return [1, ""]; }
}

function addNewLocation($_TYPE_, $_DID_, $_NAME_)
{
	$LID = checkLocation($_TYPE_, $_DID_, $_NAME_);
    if($LID[0]){
		global $_SQL;
		if($_TYPE_ == "T"){
			$sql =  "INSERT INTO `mt_location_schools`(`did`, `name`) VALUES ( ".$_DID_.", TRIM('".$_NAME_."') )";
		}
		else if($_TYPE_ == "N"){
			$sql =  "INSERT INTO `mt_location_hospitals`(`did`, `name`) VALUES ( ".$_DID_.", TRIM('".$_NAME_."') )";
		}
		else if($_TYPE_ == "O"){
			$sql =  "INSERT INTO `mt_location_others`(`did`, `name`) VALUES ( ".$_DID_.", TRIM('".$_NAME_."') )";
		}
		else{
			$sql =  "INSERT INTO `mt_location_others`(`did`, `name`) VALUES ( ".$_DID_.", TRIM('".$_NAME_."') )";
		}
		if ($_SQL->query($sql) === TRUE) { return $_SQL->insert_id; }
    } else{ return $LID[1]; }
}

function addNewRequest($_REQ_)
{
    global $_SQL;
    $sql =  "INSERT INTO `mt_request` (`uid`, `existing_lid`, `request_lid`, `type`, `request_start_year`, `request_start_month`, `request_end_year`, `request_end_month` ) VALUES ( ".$_REQ_[0].", ".$_REQ_[1].", ".$_REQ_[2].", '".$_REQ_[3]."', ".$_REQ_[4].", ".$_REQ_[5].", ".$_REQ_[6].", ".$_REQ_[7]." );";
    //echo $sql;
    if ($_SQL->query($sql) === TRUE) { return 1; } 
    else { return 0; }
}

if(!empty($_WEB["GET"])){
	$TYPE =  getUserType($_WEB['GET']['uid']);
	if(!empty($TYPE)){
		$CURRENT_LOC_ID = addNewLocation($TYPE["type"], $_WEB["GET"]["crdid"], $_WEB["GET"]["crp"]);
		$REQUEST_LOC_ID = addNewLocation($TYPE["type"], $_WEB["GET"]["exdid"], $_WEB["GET"]["exp"]);
		if(!empty($CURRENT_LOC_ID) && !empty($REQUEST_LOC_ID)){
			if(!empty($_WEB["GET"]["period"])){
				$period = explode(" ", $_WEB["GET"]["period"]);
				$CURRENT_YEAR = date("Y");
				$CURRENT_MONTH = getMonthNumber(date("F"));
				$REQUEST_YEAR = $period[1];
				$REQUEST_MONTH = getMonthNumber($period[0]);
				if( (($CURRENT_YEAR*12)+$CURRENT_MONTH) <= (($REQUEST_YEAR*12)+$REQUEST_MONTH) ){
					$ID =  getUserID($_WEB['GET']['uid']);
					if(!empty($ID)){
						$ary = [ $ID, $CURRENT_LOC_ID, $REQUEST_LOC_ID, $TYPE["type"], $CURRENT_YEAR, $CURRENT_MONTH, $REQUEST_YEAR, $REQUEST_MONTH ];
						//print_r($ary);
						if(addNewRequest($ary)){
							echo 'var _uname_ = sessionStorage.getItem("NEW_USER_NAME");
							document.getElementById("errorMessage").style.display = "none";
							document.getElementById("submitSuccessMessage").style.display = "block";
							document.getElementById("submitSuccessMessage").innerHTML = "<div class=\'alert alert-success\'><h5>Hi "+_uname_+",</h5><br><strong>Your form has been submitted successfully !<br>ඔබගේ පෝරමය සාර්ථකව ඉදිරිපත් කර ඇත !</strong><br><br>Our agent will contact you soon to schedule your mutual transfer.<br>ඔබගේ අන්‍යෝන්‍ය මාරුව උපලේඛනගත කිරීම සඳහා අපගේ නියෝජිතයා ඉක්මනින් ඔබ හා සම්බන්ධ වනු ඇත.<br>For More, Please call us : ( +94 ) 070 400 8919<br></div><br><br><div class=\'mbr-section-btn align-center\'><a href=\'https://mtransfer.lk\' class=\'btn btn-primary display-4\'> GO TO HOME PAGE</a></div>";
							document.getElementById("content-register-form").style.display = "none";
							scrollTop();
							sessionStorage.clear();';
						}
					}
				}
				else{
					echo 'document.getElementById("errorMessage").innerHTML = "Please select the correct month and year. Your requesting date cannot be a previous date.<br>කරුණාකර නිවැරදි මාසය සහ වර්ෂය තෝරන්න. ඔබගේ ඉල්ලීමේ දිනය පෙර දිනයක් විය නොහැක.<br>";scrollTop();';
				}
			}
		}
	}
}

            
?>