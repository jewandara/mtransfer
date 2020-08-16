<?php

function load_all_district()
{
    global $_SQL, $_PREFIX; 
    $STMT = $_SQL->prepare("SELECT id, district FROM mt_district");
	$STMT->execute();
	$STMT->bind_result( $ID, $DISTRICT );
	while ($STMT->fetch()){
		$row[] = array( 'id'=>$ID, 'district'=>$DISTRICT );
	}
	$STMT->close();
	if(!empty($row)){ return ($row); }
	else { return NULL; }
}


$_DATA = load_all_district();
$row = "<option value='-1'> - Select District / දිස්ත්‍රික්කය තෝරන්න - </option>";

foreach ($_DATA as $dt) { $row.= "<option value='".(string)$dt["id"]."'>".(string)$dt["district"]."</option>"; }

echo "document.getElementById('currentWorkingLocation').innerHTML = \"".$row."\";";
echo "document.getElementById('expectingWorkingLocation').innerHTML = \"".$row."\";";


?>