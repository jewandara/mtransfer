<?php

function read_customer($WHERE, $ORDER = "", $LIMIT = "", $ACTIVE = "1")
{
	global $_SQL, $_PREFIX;
	$STMT = $_SQL->prepare("SELECT id, code, tag, name, email, header, link, insert_date
						FROM ".$_PREFIX."master_customer_tb 
						WHERE active = ".$ACTIVE." AND ".$WHERE."  ".$ORDER."  ".$LIMIT." ");
	$STMT->execute();
	$STMT->bind_result( $id, $code, $tag, $name, $email, $header, $link, $insert_date );
	while ($STMT->fetch()){
		$row[] = array( 
			'id'=>$id, 'code'=>$code, 'tag'=>$tag, 'name'=>$name, 
			'email'=>$email, 'header'=>$header, 
			'link'=>$link, 'insert_date'=>$insert_date
		);
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}

$_WHERE = " 1=1 ";
//$_DATA = read_customer(" 1=1 ");
//print_r($_DATA);

if(!empty($_REQUEST['search']['value']) ) {
	$_WHERE.=" AND ( id LIKE '%".$_REQUEST['search']['value']."%' ";
	$_WHERE.=" OR code LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR tag LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR name LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR email LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR header LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR link LIKE '%".$_REQUEST['search']['value']."%'  ";
	$_WHERE.=" OR insert_date LIKE '%".$_REQUEST['search']['value']."%' ) ";
}
$_COLUMNS = array(
	0 => 'code', 
	1 => 'tag',
	2 => 'name',
	3 => 'email', 
	4 => 'header', 
	5 => 'insert_date'
);
$_ORDER = " ORDER BY ".$_COLUMNS[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." ";
$_LIMIT = " LIMIT ".$_REQUEST['start']." , ".$_REQUEST['length']." ";


$_DATA = array();
$_COUNT = 0;
if( (!empty($_GET["status"])) && ($_GET["status"]=="active") ){
	$_DATA = read_customer($_WHERE, $_ORDER, $_LIMIT);
	$_COUNT = count(read_customer($_WHERE));
}
elseif( (!empty($_GET["status"])) && ($_GET["status"]=="deactive") ){
	$_DATA = read_customer($_WHERE, $_ORDER, $_LIMIT, "0");
	$_COUNT = count(read_customer($_WHERE, "", "", "0"));
}
else{
	$_DATA = read_customer($_WHERE, $_ORDER, $_LIMIT);
	$_COUNT = count(read_customer($_WHERE));
}


$_MATCH[][] = array();
$i = 0;
if($_COUNT == 0){
	$row = array();
	$row =["No Found", "No Found", "No Found", "No Found", "No Found", "No Found"];
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
		$row[0] = "<span class='small-tr'>".(string)$dt["code"]."</span>";
		$row[1] = "<span class='small-tr'>".(string)$dt["tag"]."</span>";
		$row[2] = "<span class='small-tr'>".(string)$dt["name"]."</span>";
		$row[3] = "<span class='small-tr'>".(string)$dt["email"]."</span>";
		$row[4] = "<span class='small-tr'>".(string)$dt["header"]."</span>";
		$row[5] = "Actions";	
	/*
		$row[0] = "<p title='Customer Telbiz Id'>".(string)$dt["code"]."</p>";
		$row[1] = "<p title='Customer Comman Tag'>".(string)$dt["tag"]."</p>";
		$row[2] = "<p title='Customer Full Name'>".(string)$dt["name"]."</p>";
		$row[3] = "<p title='Customer Email'>".(string)$dt["email"]."</p>";
		$row[4] = "<p title='Customer Header Description'>".(string)$dt["header"]."</p>";*/

/*		if( (!empty($_GET["status"])) && ($_GET["status"]=="active") ){
			$row[5] = "
				<a href='location/".$dt["id"]."' data-toggle='tooltip' data-placement='bottom' title='View Customer Location Details'>
					<div style='margin:5px;' class='btn btn-success btn-app-sm'><i class='fa fa-map-marker'></i></div>
				</a>
				<a onclick='editCustomerTab(".(string)$dt["id"].")' data-toggle='tooltip' data-placement='bottom' title='Edit Customer'>
					<div style='margin:5px;' class='btn btn-info btn-app-sm'><i class='fa fa-pencil-square-o'></i></div>
				</a>
				<a onclick='deactiveCustomerTab(".(string)$dt["id"].")' data-toggle='tooltip' data-placement='bottom' title='Delete Customer'>
					<div style='margin:5px;' class='btn btn-danger btn-app-sm'><i class='fa fa-trash-o'></i></div>
				</a>
			";
		}
		elseif( (!empty($_GET["status"])) && ($_GET["status"]=="deactive") ){
			$row[5] = "
				<a onclick='activeCustomerTab(".(string)$dt["id"].")' data-toggle='tooltip' data-placement='bottom' title='Active Customer'>
					<div style='margin:5px;padding:5px;' class='btn-info text-center'> Active </div>
				</a>
			";
		}
		else{
			$row[5] = "
				<a href='location/".$dt["id"]."' data-toggle='tooltip' data-placement='bottom' title='View Customer Location Details'>
					<div style='margin:5px;' class='btn btn-success btn-app-sm'><i class='fa fa-map-marker'></i></div>
				</a>
				<a onclick='editCustomerTab(".(string)$dt["id"].")' data-toggle='tooltip' data-placement='bottom' title='Edit Customer'>
					<div style='margin:5px;' class='btn btn-info btn-app-sm'><i class='fa fa-pencil-square-o'></i></div>
				</a>
				<a onclick='deactiveCustomerTab(".(string)$dt["id"].")' data-toggle='tooltip' data-placement='bottom' title='Delete Customer'>
					<div style='margin:5px;' class='btn btn-danger btn-app-sm'><i class='fa fa-trash-o'></i></div>
				</a>
			";
		}*/

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