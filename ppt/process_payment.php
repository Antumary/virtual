<?php
class payment
{
	
	function check_bal($acc,$pin,$amt)
	{
		
		$con=mysql_connect("localhost","root","");
		mysql_select_db("etutor",$con);
		
	if($res=mysql_query("select amount from tbl_account where ac_id='$acc' and  pin='$pin'",$con))
	{
	$row=mysql_fetch_array($res);
	return  $row["amount"];
	}
		return '0';
	}
	function update_bal($acc,$pin,$amt,$sid)
	{
	
			$con=mysql_connect("localhost","root","");
		mysql_select_db("etutor",$con);
	
	$res=mysql_query("update tbl_account set amount='$amt' where ac_id='$acc' and pin='$pin'",$con);
	 // Get the main settings from the array we just loaded
      
        // Connect to the database
       mysql_close($con);
			$con=mysql_connect("localhost","root","");
		mysql_select_db("etutor",$con);
		//echo "update tbl_student set due='no' where student_id=$sid ";
	mysql_query("update tbl_student set due='no' where student_id=$sid ",$con);
	
	}
}
?>