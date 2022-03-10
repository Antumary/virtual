<?php

include('config.php');
 ?>
<html>
<head>

</head>
<body>
  <?php

   $qry=mysql_query("select * from tbl_message");
   $qa=mysql_fetch_array($qry);




   ?>

<div>
<textarea readonly rows='1' placeholder='Auto-Expanding Textarea' style="min-height:100px;min-width:500px;margin-left:300px;margin-top:100px;">

<?php
while($res=mysql_fetch_array($qa))
{
echo $res[3];
}
 ?>
</textarea>


</div>

<br>
<br>
<div style="margin-left:300px;">
<form name="message" action="" method="post">
    <input name="usermsg" type="text" id="usermsg" size="63" />
    <input name="msg" type="submit"  id="submitmsg" value="Send" />
</form>
</div>
</body>

</html>

<?php
if(isset($_POST['msg']))
{
$a=$_POST['usermsg'];
$b=1;
$c=2;

 $qry="insert into tbl_message (sentby,sentto,msg) values ($b,$c,'$a')";
mysql_query($qry);

}
if(isset($_POST['msg']))
{
$a=$_POST['usermsg'];
$b=1;
$c=2;

 $qry="insert into tbl_message (sentby,sentto,msg) values ($b,$c,'$a')";
mysql_query($qry);

}
?>
