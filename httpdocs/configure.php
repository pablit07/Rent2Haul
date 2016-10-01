<?php
ob_start();
session_start(); 

require_once("classLibrary/DbHandler.class.php");
require_once("classLibrary/ps_pagination.php");
require_once("classLibrary/imageResize.class.php");
require_once("classLibrary/GeneralFunction.class.php");
require_once("classLibrary/pagination_functions.php");
require_once("classLibrary/Moving.class.php");

// DEFINE SECTION
define("ADMIN_TITLE", "Welcome to RENT2HAUL");
define("PHOTO_PAGE_LIMIT", "10");
define("SITE_NAME", "RENT2HAUL");
define("SITE_FROM", "RENT2HAUL");
define("COPYRIGHT_TEXT", "RENT2HAUL, Denver, Colorado &copy; 2015-2016, All Rights Reserved.");
define("ADMIN_PAGE_LIMIT", "10");
define("FRONT_PAGE_LIMIT", "5");
define("LIMIT",12);

define("DB_HOST", "50.62.209.161:3306");
define("DB_USER", "dev_sabmecto");
define("DB_PASSWORD", "Yal8&m41");
define("DB_NAME", "Rent2Haul");


define("SITE_ID",1);
define("SITE_URL", "http://localhost/Joydeep/project_2014/Ufirst-Moving/");
define("PATH_FCKEDITOR", "fckeditor/");
define("ADVERTISEMENT_DIR","../images/advertisement_images/");
define("MSG_INVALID_USER", "Invalid User Name or Password");
define("MSG_LOGIN_EXIST", "Login Id already exist.Please chose another.");
define("MSG_EMAIL_EXIST", "Email Id you provide already exist.Please choose another.");
define("MSG_ADD_SUCCESS", "Added Successfully.");
define("MSG_EDIT_SUCCESS", "Updated Successfully.");
define("MSG_DELETE_SUCCESS", "Deleted Successfully.");
define("MSG_ADD_FAIL", "Addition Fail.");
define("MSG_EDIT_FAIL", "Update Failed");
define("MSG_DELETE_FAIL", "Deletion Fail.");
define("MSG_REC_EXIST", "Record already exist.");
define("MSG_CATEGORY_EXIST", "Category Name already exist.Please chose another.");
define("MSG_OLD_PASSWORD_MISMATCH", "The Password you have Provided does not match with your Old Password.");
define("MSG_BLANK_PASSWORD", "Password can't be Blank.");
define("MSG_PASSWORD_MISMATCH", "Password Mismatch.");
define("MSG_PASSWORD_CHANGED", "Your Password has been successfully changed.");
define("MSG_PLEASE_CHECK", "Please check at least one checkbox.");

// TABLE NAME DECLARATION
define("TBL_USER_PAGES", "ufirst_pages");
define("TBL_PAGE_NAME", "ufirst_page_name");
define("TBL_META_GENERAL", "ufirst_meta_general");
define("TBL_ADMIN", "ufirst_admin");
define("TBL_SETTINGS", "ufirst_settings");
define("TBL_LOGO", "ufirst_logo");
define("COUNTRY", "ufirst_countries");
define("TBL_QUOTS", "ufirst_moving_quote");
define("TBL_QUOTS_ACC", "ufirst_moving_quote_acc");
define("TBL_REVIEW", "ufirst_rewiews");
define("TBL_TRAILER", "ufirst_trailer");
define("TB_PACK_UNPACK_MOVERS", "ufirst_movers_pack_unpack");
define("TBL_AJAX_CALCULATION", "ufirst_moving_ajax_calculation");
define("TBL_MOVING_QUOTE_DATA", "ufirst_moving_quote_acc_data");
define("TBL_BANNER", "ufirst_banner");
define("TBL_DOCTOR", "doctor");

//MAIN DEFINING THE OBJECT
$db = new DbHandler();
$gf = new GeneralFunction($db, array('memberInformation.php','memberHistory.php','memberOrderDetails.php'), array('index.php','adminOperations.php'));
$gf->checkLogin();
//DEFINING THE OBJECT
$image = new SimpleImage();
$move = new Moving($db);
?>