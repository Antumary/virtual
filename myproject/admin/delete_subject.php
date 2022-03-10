<?php
include('connect.php');
$s=$_GET['id'];
mysql_query("delete from tbl_subject where subject_id='$s'")or die(mysql_error());
header('location:subject.php');
?>
