<?php
include('connect.php');
$get_id=$_GET['id'];
mysql_query("delete from tbl_admin where user_id='$get_id'")or die(mysql_error());
header('location:user.php');
?>
