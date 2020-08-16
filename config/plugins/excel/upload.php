<?php 
 
/*$servername = "localhost";
$username = "your user name";
$password = "your root password";
$dbname = "demo_data";
 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); } 
echo "connected";*/

require_once 'Box/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;


if (!empty($_FILES['file']['name'])) {
      
    $pathinfo = pathinfo($_FILES["file"]["name"]);
    if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls' || $pathinfo['extension'] == 'csv') && $_FILES['file']['size'] > 0 ) {
         
        $inputFileName = $_FILES['file']['tmp_name']; 
        $reader = ReaderFactory::create(Type::XLSX);
        $reader->open($inputFileName);
        $count = 1;
 
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                if ($count > 1) { 
                    $data['name'] = $row[0];
                    $data['email'] = $row[1];
                    $data['phone'] = $row[2];
                    $data['city'] = $row[3];
                    //print_r(data);
                    echo "My name is".$row[0]." and my contact is".$row[2];
                }
                $count++;
            }
        }
        $reader->close();
    } else { echo "Please Select Valid Excel File"; }
} else { echo "Please Select Excel File"; }





/*



$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
 
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}
 
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
 
echo "success";
die();*/
