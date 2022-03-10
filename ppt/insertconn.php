
<?php

$con = mysql_connect("localhost","root","");
mysql_select_db("etutor");
$usermsg = $_POST['usermsg'];
$sid=$_POST['Sid'];
$tid=$_POST['Tid'];
$query = "insert into tbl_message (sentby,sentto,msg) values ('$sid','$tid','$usermsg')";

mysql_query($query);

return "success";


$qs="select * from tbl_message";
$exe=mysql_query($qs);

$message = array();
while($res=mysql_fetch_array($exe))
{

  $message = array(
    "msg" => $row['msg'],

  );
  $msg_res[] = $message;
}

echo json_encode($msg_res);
}


?>
