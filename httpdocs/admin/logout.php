<?php
include_once("../configure.php");
unset($_SESSION['admin_id']);
unset($_SESSION['admin_login_id']);
unset($_SESSION['admin_password']);
$gf->reDirect("../admin/?logout");
?>