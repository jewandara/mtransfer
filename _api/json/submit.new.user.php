<?php 

//LOAD_JSON("submit_new_user", "&uid="+uid+"&fname="+_fname_+"&lname="+_lname_+"&gender="+_gender_+"&contact="+_contact_+"&email="+_email_);


function checkUserLogin($_CONTACT_)
{
    global $_SQL; 
    $sql = "SELECT uid FROM `mt_users` WHERE `user_contact` = ".$_CONTACT_." LIMIT 1 ";
    $result = $_SQL->query($sql);
    if ($result->num_rows > 0) { return false; }
    else{ return true; }
}

function addNewUserLogin($_ID_, $_USERARRY_)
{
	global $_SQL;
	$sql =  "INSERT INTO mt_users(uid, pid, user_contact, user_email ) VALUES ( '".$_USERARRY_[0]."', ".$_ID_.", TRIM('".$_USERARRY_[4]."'),  TRIM('".$_USERARRY_[5]."') )";
	$stmt = $_SQL->prepare($sql);
	$stmt->execute();
	$stmt->close();
	return true;
}


function addNewUser($_USERARRY_)
{
	global $_SQL;
	$sql =  "INSERT INTO mt_profile( Uid, FirstName, LastName, Gender, HandPhone, EmailAddress ) VALUES
			( '".$_USERARRY_[0]."', TRIM('".$_USERARRY_[1]."'),  TRIM('".$_USERARRY_[2]."'),  TRIM('".$_USERARRY_[3]."'), TRIM('".$_USERARRY_[4]."'), TRIM('".$_USERARRY_[5]."') )";
	if ($_SQL->query($sql) === TRUE) {
		if(addNewUserLogin($_SQL->insert_id, $_USERARRY_)){ return true; }
		else{ return false; }
	}
}


if(!empty($_WEB["GET"])){
	if(checkUserLogin($_WEB["GET"]["contact"])){
		$ary = [$_WEB["GET"]["uid"], $_WEB["GET"]["fname"], $_WEB["GET"]["lname"], $_WEB["GET"]["gender"], $_WEB["GET"]["contact"], $_WEB["GET"]["email"] ];
		if(addNewUser($ary)){ echo "register(1);scrollTop();"; }
	}
	else{
		echo 'document.getElementById("errorMessage").innerHTML = "Sorry, We have a registered account under contact number - '.$_WEB["GET"]["contact"].'.<br>කණගාටුයි, '.$_WEB["GET"]["contact"].' මෙම සම්බන්ධතා අංකය යටතේ ගිණුමක් ලියාපදිංචිව ඇත.<br>Please check the contact number or contact our agent : ( +94 ) 070 400 8919<br>කරුණාකර සම්බන්ධතා අංකය පරීක්ෂා කරන්න. එසේ නොවේ නම් අපගේ නියෝජිතයා අමතන්න : ( +94 ) 070 400 8919";scrollTop();';
	}
}


?>