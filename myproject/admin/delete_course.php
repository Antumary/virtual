<?php
include('connect.php');
$get_id=$_GET['id'];
mysql_query("delete from tbl_course where course_id='$get_id'")or die(mysql_error());
header('location:course.php');
?>