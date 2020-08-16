<?php 
    switch ($_WEB['URL'][3]) {
        case "view_total_district":
            require_once("view.total.district.php");
            break;
        case "view_total_teacher":
            require_once("view.total.teacher.php");
            break;
        case "view_total_teacher":
            require_once("view.total.teacher.php");
            break;
        case "view_total_teacher":
            require_once("view.total.teacher.php");
            break;
        default:
            require_once("dashboard.php");
            break;
    }
?>