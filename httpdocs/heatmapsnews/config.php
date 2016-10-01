<?php
$host="50.62.209.2:3306";
$username="dev_sabmecto";  
$password="slD8i@43"; 
$db_name="dev_ufirst";  

mysql_connect("$host", "$username", "$password")or die("ERROR IN THE DATABASE CONNECTION"); 
mysql_select_db("$db_name")or die("ERROR IN THE DATABASE CONNECTION");
?>