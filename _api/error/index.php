<?php 
    switch ($_WEB['URL'][3]) {
        case "test":
            require_once("test.php");
            break;
        case "developer":
            require_once("developer.php");
            break;
        case "404":
            require_once("404.php");
            break;
        default:
            require_once("404.php");
            break;
    }
?>
