<?php

if(isset($_POST['msg']))
{
$a=$_POST['usermsg'];
$b=1;
$c=2;

 $qry="insert into tbl_message (sentby,sentto,msg) values ($b,$c,'$a')";
mysql_query($qry);

}
?>
