<?php 
    switch ($_WEB['URL'][3]) {
        case "register":
            require_once("register.php");
            break;
        case "register_next":
            require_once("register.next.php");
            break;
        case "register_submit":
            require_once("register.submit.php");
            break;
        case "developer":
            require_once("developer.php");
            break;
        default:
            header('Location: /api/error/404');
            break;
    }
?>