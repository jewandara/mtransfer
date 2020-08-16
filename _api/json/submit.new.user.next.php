<?php 

//LOAD_JSON("submit_new_user_next", "&uid="+_uid_+"&nic="+_nic_+"&address="+_address_+"&cc="+_catagory_+"&designation="+_designation_);
//

function getRoleID($_CATAGORY_)
{
    global $_SQL;
 	$RESUTL_ARRY = $_SQL->query("SELECT id FROM mt_roles WHERE `role` = '".$_CATAGORY_."' LIMIT 1");
 	if ($RESUTL_ARRY->num_rows > 0) { 
 		$row = $RESUTL_ARRY->fetch_assoc(); 
 		return $row["id"]; 
 	}
 	else { return 4; }
}


function insertProfileJobs($_UID_, $_RID_, $_CATAGORY_, $_DESIGNATION_)
{
	global $_SQL;
	$sql =  "INSERT INTO mt_profile_jobs (`id`, `rid`, `jobCategory`, `jobDesignation`) 
	VALUES ( (SELECT Id FROM mt_profile WHERE Uid = '".$_UID_."'), ".$_RID_.", '".$_CATAGORY_."', '".$_DESIGNATION_."' );";
	$stmt = $_SQL->prepare($sql);
	$stmt->execute();
	$stmt->close();
	return true;
}


function updateNewUserLogin($_UID_, $_CATAGORY_, $_DESIGNATION_)
{
	global $_SQL;
	$_RID_ = getRoleID($_CATAGORY_);
	$sql =  "UPDATE mt_users SET rid=".$_RID_." WHERE uid='".$_UID_."' ";
	$stmt = $_SQL->prepare($sql);
	$stmt->execute();
	$stmt->close();
	if(insertProfileJobs($_UID_, $_RID_, $_CATAGORY_, $_DESIGNATION_)){ return true; }
	else{ return false; }
}


function updateNewUser($_USERARRY_)
{
	global $_SQL;
	$sql =  "UPDATE mt_profile SET NIC ='".$_USERARRY_[1]."', HomeAddress='".$_USERARRY_[2]."' WHERE Uid='".$_USERARRY_[0]."' ";
	if ($_SQL->query($sql) === TRUE) {
		if(updateNewUserLogin($_USERARRY_[0], $_USERARRY_[3], $_USERARRY_[4])){ return true; }
		else{ return false; }
	}
}


if(!empty($_WEB["GET"])){
	$ary = [$_WEB["GET"]["uid"], $_WEB["GET"]["nic"], $_WEB["GET"]["address"], $_WEB["GET"]["catagory"], $_WEB["GET"]["designation"]];
	if(updateNewUser($ary)){ echo "register(2);scrollTop();"; }
}


?>