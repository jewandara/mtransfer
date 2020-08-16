<?php

function read_all_data($WHERE, $ORDER, $LIMIT)
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT `CID`, `DID`, `IID`, `PID`, `DESCRIPTION`, `SUB`, `DIRECTION`, `ACCESS`, 
							`CUSTOMER`, `LOCATION`, `IP`, `PORT`, `COMENT`, `CATAGORY`, `TYPE`, `INTERFACE`, `ACTIVE`, 
							`STANDARD`, `STATUS`, `PE_NAME`, `PE_IP`, `CUpdate`, `DUpdate`, `IUpdate`, `PUpdate` 
						FROM all_data_view  
						WHERE ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $CID, $DID, $IID, $PID, $DESCRIPTION, $SUB, $DIRECTION, $ACCESS, 
						$CUSTOMER, $LOCATION, $IP, $PORT, $COMENT, $CATAGORY, $TYPE, $INTERFACE, $ACTIVE, 
						$STANDARD, $STATUS, $PE_NAME, $PE_IP, $CUpdate, $DUpdate, $IUpdate, $PUpdate );
	while ($STMT->fetch()){
		$row[] = array( 'CID'=>$CID, 'DID'=>$DID, 'IID'=>$IID, 'PID'=>$PID, 'DESCRIPTION'=>$DESCRIPTION, 'SUB'=>$SUB, 
				'DIRECTION'=>$DIRECTION, 'ACCESS'=>$ACCESS, 'CUSTOMER'=>$CUSTOMER, 'LOCATION'=>$LOCATION, 'IP'=>$IP, 
				'PORT'=>$PORT, 'COMENT'=>$COMENT, 'CATAGORY'=>$CATAGORY, 'TYPE'=>$TYPE, 'INTERFACE'=>$INTERFACE, 
				'ACTIVE'=>$ACTIVE, 'STANDARD'=>$STANDARD, 'STATUS'=>$STATUS, 'PE_NAME'=>$PE_NAME, 'PE_IP'=>$PE_IP, 
				'CUpdate'=>$CUpdate, 'DUpdate'=>$DUpdate, 'IUpdate'=>$IUpdate, 'PUpdate'=>$PUpdate );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}


$_WHERE = " 1=1 ";

if( (!empty($_GET["from"])) && (!empty($_GET["to"])) ){
	if($_GET["from"] == $_GET["to"]){
		$_WHERE.= " AND DUpdate LIKE '".$_GET["from"]."%' ";
	}
	else{
		$_WHERE.= " AND DUpdate >= '".$_GET["from"]."' AND DUpdate <= '".$_GET["to"]."' ";
	}
}




if(!empty($_GET["stand"]))  {
	if( $_GET["stand"] == "s" ){ $_WHERE.= " AND STANDARD = 1 "; }
	elseif( $_GET["stand"] == "n" ) { $_WHERE.= " AND STANDARD = 0 "; }
	elseif( $_GET["stand"] == "standard" ){ $_WHERE.= " AND STANDARD = 1 "; }
	elseif( $_GET["stand"] == "notstandard" ) { $_WHERE.= " AND STANDARD = 0 "; }
	else { $_WHERE.= " "; }
}



if(!empty($_GET["status"]))  {
	if( $_GET["status"] == "active" ){ $_WHERE.= " AND ACTIVE = 1 "; }
	elseif( $_GET["status"] == "deactive" ) { $_WHERE.= " AND ACTIVE = 0 "; }
	else { $_WHERE.= " "; }
}




if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( INTERFACE LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR PE_NAME LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR PE_IP LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR DESCRIPTION LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR CATAGORY LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR TYPE LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR SUB LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR ACCESS LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR STATUS LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR STANDARD LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR ACTIVE LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR DUpdate LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'DID', 
	1 => 'INTERFACE', 
	2 => 'PE_NAME', 
	3 => 'PE_IP', 
	4 => 'DESCRIPTION', 
	5 => 'CATAGORY', 
	6 => 'TYPE', 
	7 => 'SUB', 
	8 => 'ACCESS', 
	9 => 'STATUS', 
	10 => 'STANDARD', 
	11 => 'ACTIVE', 
	12 => 'DUpdate'
);
$_ORDER = " ORDER BY ".$_COLUMNS[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." ";
$_LIMIT = " LIMIT ".$_REQUEST['start']." , ".$_REQUEST['length']." ";


/**********************************************************/
$_DATA = array();
$_COUNT = 0;
$_DATA = read_all_data($_WHERE, $_ORDER, $_LIMIT);
$_COUNT = count(read_all_data($_WHERE, "", ""));


/**********************************************************/
$_MATCH[][] = array();
$i = 0;
if($_COUNT == 0){ 
	$row = array();
	$row =["No Found", "No Found", "No Found", "No Found", "No Found", "No Found", "No Found", "No Found", "No Found"];
	$_MATCH[0] = $row;
	$json_data = array(
		"draw" => intval( $_REQUEST['draw'] ), "recordsTotal" => intval(0), 
		"recordsFiltered" => intval(0), "data" => $_MATCH 
	);
	echo json_encode($json_data);
}
else {
	foreach ($_DATA as $dt) {
		$row = array();	
		$row[0] = "<p class='grid-view-td' style='max-width:180px'>".(string)$dt["INTERFACE"]."</p>";
		$row[1] = "<p class='grid-view-td' style='min-width:180px'>".(string)$dt["PE_NAME"]."</p>";
		$row[2] = "<p class='grid-view-td' style='min-width:80px'>".(string)$dt["PE_IP"]."</p>";
		$row[3] = "<p class='grid-view-td'>".(string)$dt["DESCRIPTION"]."</p>";
		$row[4] = "<p class='grid-view-td' style='min-width:110px'>".(string)$dt["TYPE"]."</p>";
		$row[5] = "<p class='grid-view-td' style='min-width:70px'>".(string)$dt["SUB"]."</p>";

		if($dt["STATUS"] =="NEW"){ $row[6] = "<div class='grid-status-new'>Newly Added</div>"; }
		else{ $row[6] = "<div class='grid-status-update' >Lately Updated</div>"; }
		
		$row[7] = "<a onclick=\"loadPopUp('interface_description', 'id=".(string)$dt["IID"]."')\" target='_blank' title='ID : ".$dt["IID"].", View Interface History'><i class='fa fa-history grid-history-icon'></i></a>";
		$_MATCH[$i] = $row;
		$i = $i + 1;
	}
	$json_data = array(
		"draw"            => intval( $_REQUEST['draw'] ),
		"recordsTotal"    => intval( $_COUNT ),
		"recordsFiltered" => intval( $_COUNT ),
		"data"            => $_MATCH 
	);
	echo json_encode($json_data);
}
?>