<?php
	session_start(); 
	require_once("classLibrary/DbHandler.class.php");
	require_once("classLibrary/GeneralFunction.class.php");
	require_once("classLibrary/photogallery.class.php");
	require_once("classLibrary/imageResize.class.php");
	require_once("classLibrary/ps_pagination.php");
	require_once("classLibrary/pagination_functions.php");
	require_once("classLibrary/testimonial.class.php");
	require_once("classLibrary/movingtips.class.php");
	require_once("classLibrary/banner.class.php");

	define("ADMIN_TITLE", "Welcome to the Team72 administrative panel");
	define("PHOTO_PAGE_LIMIT", "10");
	define("SITE_NAME", "Subscribers");
	define("SITE_FROM", "Subscribers");
	define("COPYRIGHT_TEXT", "Team72 &copy; 2013, All Rights Reserved.");
	define("ADMIN_PAGE_LIMIT", "10");
	define("FRONT_PAGE_LIMIT", "5");
	define("LIMIT",12);
	define("DB_HOST", "50.62.209.2:3306");
	/*define("DB_USER", "root");
	define("DB_PASSWORD", "");*/
	define("DB_USER", "abracken");
	define("DB_PASSWORD", "slD8i@43");
	define("DB_NAME", "abracken_ufirstmoving");
	//define("DB_NAME", "sabmelbj_ufirstmoving");
	define("SITE_ID",1);
    //define("SITE_URL", "http://localhost/ufirstmoving/");
	define("SITE_URL", "http://ufirstmoving.com/");
	define("PATH_FCKEDITOR", "fckeditor/");
	define("PROFILE_DIR","../profile_picture/");
	/*define("ACTIVITY_PHOTO_DIR","../images/activity_images/");*/
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
	
	define("TBL_USER_REGISTER", "sabmelbj_user");
	
	
	/*define("PUBLICATION_PHOTO_DIR","../images/publication_images/");
	define("PRODUCT_DIR","../images/product_images/");*/
	
	
	 
	$db = new DbHandler();
	$gf = new GeneralFunction($db, array('memberInformation.php','memberHistory.php','memberOrderDetails.php'), array('index.php','adminOperations.php'));
	$ptg = new Photogallery($db);
	
?>