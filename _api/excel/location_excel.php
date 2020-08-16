<?php

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

if (!empty($_FILES['file']['name'])) {
    $pathinfo = pathinfo($_FILES["file"]["name"]);
    if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls' || $pathinfo['extension'] == 'csv') && $_FILES['file']['size'] > 0 ) {
         
        $inputFileName = $_FILES['file']['tmp_name']; 
        $reader = ReaderFactory::create(Type::XLSX);
        $reader->open($inputFileName);
        $count = 1;

        $RESULT_OUTPUT = "";
 
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                if ($count > 1) {
                    if(!empty($row[0])){
                            $data['ID'] = $row[0];
                            $data['ADDRESS'] = $row[1];
                            $data['CONTACT'] = $row[2];
                            $data['EMAIL'] = $row[3];
                            echo $count.": ".$row[1]."-".$row[2];
                    }else{ return 0;}
                    //print_r(data);
                    //echo "My name is".$row[0]." and my contact is".$row[2];
                }
                $count++;
            }
        }

        $reader->close();
    } else { echo "Please Select Valid Excel File"; }
} else { echo "Please Select Excel File"; }
?>