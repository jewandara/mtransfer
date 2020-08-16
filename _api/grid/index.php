<?php 
    switch ($_WEB['URL'][4]) {
        case "customer-base":
            require_once("side-bar-tab-customer-base.grid.php");
            break;
        case "location-base":
            require_once("side-bar-tab-customer-base.grid.php");
            break;
        case "progress":
            require_once("progress.php");
            break;
        default:
            require_once("ajaxc.php");
            break;
    }
?>