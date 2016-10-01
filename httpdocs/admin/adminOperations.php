<?PHP
session_start();
include_once("../configure.php");
$limit=(isset($_REQUEST['limit'])) ? $_REQUEST['limit'] : ADMIN_PAGE_LIMIT;
$offset=(isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;
//Ajax based admin login
if($_POST['action'] == 'adminLogin'){
$admin_login_id = $_POST['admin_login_id'];
$admin_password = md5($_POST['admin_password']);
//$sql="SELECT * FROM ".TBL_ADMIN." WHERE admin_login_id = '{$admin_login_id}' AND admin_password = '{$admin_password}'";
$sql="SELECT * FROM ".TBL_ADMIN." WHERE admin_login_id = '{$admin_login_id}'";
if($db->countRows($sql)==0) {
$admin_exist="SELECT * FROM ".TBL_ADMIN." WHERE admin_id = 1";
if($db->countRows($admin_exist)==0){
$_POST['admin_login_id'] = $_POST['admin_login_id'];
$_POST['admin_password'] = md5($_POST['admin_password']);
$_POST['admin_last_login_ip'] = $_SERVER['REMOTE_ADDR'];
$_POST['admin_last_login_datetime'] = date("Y-m-d");
$_POST['admin_id'] = $db->insertDataArray(TBL_ADMIN,$_POST);
$sql2="SELECT * FROM ".TBL_ADMIN." WHERE admin_id = '{$_POST['admin_id']}'";
$row2 = $db->selectData($sql2);
$res2 = $db->getRow($row2);
$_SESSION['admin_id']       = $res2['admin_id'];
$_SESSION['admin_login_id'] = $res2['admin_login_id'];
$_SESSION['admin_password'] = $res2['admin_password'];
$_SESSION['admin_name']     = ucwords($res2['admin_fastname'].' '.$res2['admin_lastname']);
$msg = !empty($_SERVER['QUERY_STRING']) ? substr($_SERVER['QUERY_STRING'], 9) : "home.php";
$status="Success";
}else{
$msg=MSG_INVALID_USER;
$status="Fail";
}
}else{ 
$row = $db->selectData($sql);
$res = $db->getRow($row);
$_SESSION['admin_id']       = $res['admin_id'];
$_SESSION['admin_login_id'] = $res['admin_login_id'];
$_SESSION['admin_password'] = $res['admin_password'];
$_SESSION['admin_name']     = ucwords($res['admin_fastname'].' '.$res['admin_lastname']);

$msg = !empty($_SERVER['QUERY_STRING']) ? substr($_SERVER['QUERY_STRING'], 9) : "home.php";
$status="Success";
}
echo $status."||".$msg;
}
//end of admin login
//Ajax based change admin password
if($_POST['action']=='changePassword'){
//$flag=0;
$admin_login_id = $_SESSION['admin_login_id'];
$admin_password_old = md5($_POST['admin_password_old']);
$admin_password_new=md5($_POST['admin_password_new']);
$sql = "SELECT * FROM ".TBL_ADMIN." WHERE admin_login_id='{$admin_login_id}' AND admin_password='{$admin_password_old}'";
if($db->countRows($sql) == 0){
$msg=MSG_OLD_PASSWORD_MISMATCH;
//$flag=1;
}else{
$sql_update = "UPDATE ".TBL_ADMIN." SET admin_password='{$admin_password_new}' WHERE admin_login_id='{$admin_login_id}'";
if($db->updateSql($sql_update))
$msg=MSG_PASSWORD_CHANGED;
else
$msg=$db->error;
}
echo $msg;
}
//end of change password
?>