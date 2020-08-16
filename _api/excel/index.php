<?php 
    switch ($_WEB['URL'][4]) {
        case "location_excel":
            require_once("location_excel.php");
            break;
        default:
            require_once("location_excel.php");
            break;
    }
?>