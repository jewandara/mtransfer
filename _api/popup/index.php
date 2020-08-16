<?php 
    switch ($_WEB['URL'][4]) {
        case "new_location":
            require_once("new_location.php");
            break;
        case "bulk_upload":
            require_once("bulk_upload.php");
            break;
        default:
            require_once("new_location.php");
            break;
    }
?>