<?php 
    switch ($_WEB['URL'][3]) {
        case "submit_new_user":
            require_once("submit.new.user.php");
            break;
        case "submit_new_user_next":
            require_once("submit.new.user.next.php");
            break;
        case "submit_new_user_submit":
            require_once("submit.new.user.submit.php");
            break;
        case "view_total_district":
            require_once("view.total.district.php");
            break;
        case "view_total_nurse":
            require_once("view.total.nurse.php");
            break;
        case "view_total_teacher":
            require_once("view.total.teacher.php");
            break;
        case "current_working_place_view"://NOT IN USE
            require_once("current.working.place.view.php");
            break;
        case "expecting_working_place_view"://NOT IN USE
            require_once("expecting.working.place.view.php");
            break;
        default:
            require_once("submit.new.user.php");
            break;
    }
?>