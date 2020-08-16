<?php
/******************************************************************/
/******************  |  --  IMPORTANT ! -- |  *********************/
/********   INCLUDING PLUGINS TO FUNCTION CALLS IN ARRY   *********/
/******************************************************************/
	switch ($_WEB['URL'][2]) {
	    case "section":
	        require_once(__ROOT__."/config/plugins/section/section.php");
	        break;
	    case "ajax":
	        require_once(__ROOT__."/config/plugins/ajax/ajax.php");
	        break;
	    case "grid":
	        require_once(__ROOT__."/config/plugins/grid/grid.php");
	        break;
	    case "json":
	        require_once(__ROOT__."/config/plugins/json/json.php");
	        break;
	    case "excel":
	        require_once(__ROOT__."/config/plugins/excel/excel.php");
	        break;
	    case "mail":
	        require_once(__ROOT__."/config/plugins/mail/mail.php");
	        break;
	    case "popup":
	        require_once(__ROOT__."/config/plugins/popup/popup.php");
	        break;
	    case "option":
	        require_once(__ROOT__."/config/plugins/option/option.php");
	        break;
	    case "alart":
	        require_once(__ROOT__."/config/plugins/alart/alart.php");
	        break;
	    default:break;
	}

/******************************************************************/
/******************  |  --  IMPORTANT ! -- |  *********************/
/******   API CALL FUNCTION | URL REDIRECTING TO FUNCTION   *******/
/******************************************************************/
	switch ($_WEB['URL'][2]) {
	    case "section":
	        require_once("section/index.php");
	        break;
	    case "ajax":
	        require_once("ajax/index.php");
	        break;
	    case "grid":
	        require_once("grid/index.php");
	        break;
	    case "json":
	        require_once("json/index.php");
	        break;
	    case "excel":
	        require_once("excel/index.php");
	        break;
	    case "mail":
	        require_once("mail/index.php");
	        break;
	    case "popup":
	        require_once("popup/index.php");
	        break;
	    case "option":
	        require_once("option/index.php");
	        break;
	    case "alart":
	        require_once("alart/index.php");
	        break;
	    case "error":
	        require_once("error/index.php");
	        break;
	    default:
	        header('Location: /api/error/404');
	        break;
	}

?>