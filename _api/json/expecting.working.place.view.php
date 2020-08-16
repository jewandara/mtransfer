<?php

/*function load_all_district()
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
$row = "";

foreach ($_DATA as $dt) { $row.= "<option value='".(string)$dt["id"]."'>".(string)$dt["district"]."</option>"; }*/

echo "document.getElementById('expectingTransferPlaceView').innerHTML = \"<br><div class='card-text col-md-12'><label for='expectingTransferPlace' class='form-control-label mbr-fonts-style display-7'>Name of Expecting Transfer Place / අපේක්ෂිත සේවා ස්ථානයේ නම:<br></label><input id='expectingTransferPlace' name='expectingTransferPlace' data-form-field='expectingTransferPlace' class='form-control display-7' placeholder='කරුණාකර ඔබගේ අපේක්ෂිත සේවා ස්ථානයේ නම තෝරන්න'></div>\";";

?>