<?php

$subject_id=$_REQUEST["sid"];
include('header.php');
include ('session.php');
//timer
// Upon starting the section
if(!isset($_SESSION['TIMER']))
{
	$_SESSION['TIMER'] = time();
}
////timer
?>

<?Php
$start=0;
$n=1;
if(!isset($_SESSION['count']))
{
	$_SESSION['count']= 0;
}
if(!isset($_SESSION['qu_no']))
{
	$_SESSION['qu_no']=1;
}
else
{
	$_SESSION['qu_no']=$_SESSION['qu_no']+1;

}
if(!isset($_SESSION['mark']))
{
	$_SESSION['mark']=0;
}


$student_query = mysql_query("select * from tbl_student where student_id='$session_id'") or die(mysql_error());
$student_row = mysql_fetch_array($student_query);
//$stud_due = mysql_query("select due from student where student_id='$session_id'") or die(mysql_error());
//$stud_row = mysql_fetch_array($stud_due);
if($student_row['due']=='yes')
{
echo "<script>alert('not paid')</script>";
//header("location:student_home.php");
}
else
{

}
	$student_course=$student_row['course_id']; 
	//$query = mysql_query("select * from tbl_questions") or die(mysql_error());
	$sqlClass=mysql_query("select * from tbl_class where subject_id='$subject_id' and student_id='$session_id' ");
	$class_row=mysql_fetch_array($sqlClass);
	$teacher_id=$class_row['teacher_id'];
?>
<head>
<script type="text/javascript" src="admin/js/cdtimer.js" ></script>
<script type="text/javascript">
var TimeLimit = new Date('<?php echo date('r', $_SESSION['TIMER']) ?>');
</script>
</head>
<body>
    <?php include('navhead_student.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">
                <div class="hero-unit-3">
                    <div class="alert-index alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>
                </div>
			</div>
			<div class="span9">
                <div class="hero-unit-3">
					<form method="post">
						<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Questions</strong>
						</div>
						<div align="right"><input type="submit" name="finalSubmit" value="Final Submit" class="btn btn-success"/> </div><div><?php
						$thisTime=time();
						$diffTime=($thisTime-$_SESSION['TIMER']);
						$count=300 - $diffTime; 
						if ($count < 10){ 
						echo "Time is expaired in  ".$count ."seconds...";} 
						if($count < 0)
						{ 
						header('location:Result.php?sid='.$subject_id.'&mark='.$m.'&count='.$c);
						}
						//echo $diffTime;
						 ?></div>						
						<?php
							$query=mysql_query("select * from tbl_questions where subject_id='$subject_id' and course_id='$student_course' and teacher_id='$teacher_id' order by RAND() Limit 1")or die(mysql_error());
							while ($row = mysql_fetch_array($query)) 
							{
								
								if($_SESSION['qu_no'] <= 5)
								{
									
								?>
						<table cellpadding="0" cellspacing="0" border="0"  class="table table-striped table-bordered" id="example" name="examTable">
							<!--<tr>
								<td><div> <?php// $thisTime=time();
						$diffTime=($thisTime-$_SESSION['TIMER']);  
						
						$count=120 - $diffTime; 
						if ($count < 10){ 
						echo "Time is expaired in  ".$count ."seconds...";} 
						if($count < 0)
						{ 
						$c=$_SESSION['count'];
								$m=$_SESSION['mark'];
								unset($_SESSION['count']);
								unset($_SESSION['mark']);
								//echo $session_id;
								$updateQry=mysql_query("update tbl_exam set max_mark='100', mark_obtained='$m' where student_id='$session_id' and subject_id='$subject_id'")or die(mysql_error());
								if($updateQry)
								{
									unset($_SESSION['TIMER']);
							 		header('location:Result.php?sid='.$subject_id.'&mark='.$m.'&count='.$c);
								}
						 } ?></div></td>
							</tr>-->
							<tr>
								<td><div align="left"><strong><?php echo $row['qn_paper_code']; ?> </td>
							</tr>
						
							<tr>
								<td><div align="left"><strong>Question <?php  echo $_SESSION['qu_no']; ?>:<?php echo $row['question']; ?> <input type="text" name="quest" value="<?php echo $row['question']; ?> " style="visibility:hidden"/></strong></div></td><br>
							</tr>
							<tr>
								<td><div>A. <input type="radio" name="option" value="<?php echo $row['option1']; ?>" required > 	<?php echo $row['option1']; ?> </div></br></td>
							</tr>
							<tr>
								<td><div>B. <input type="radio" name="option" value="<?php echo $row['option2']; ?>" required> 	<?php echo $row['option2']; ?>  </div></br></td>
							</tr>
							<tr>
								<td><div>C. <input type="radio" name="option" value="<?php echo $row['option3']; ?>" required> 	<?php echo $row['option3']; ?> </div></br></td>
							</tr>
							<tr>
								<td><div>D. <input type="radio" name="option" value="<?php echo $row['option4']; ?>" required> 	<?php echo $row['option4']; ?> </div></br></td>
							</tr>
							<tr>
								<td><div align="center"><input type="submit" name="showQns" value="Next" class="btn btn-success"/> </div><di><?php
								 ?></div> </td>
							</tr>
							
						</table>
								
							<?php
								if(isset($_POST['showQns']))
								{
									//echo $_SESSION['qu_no'];
									$a= $_SESSION['qu_no'];
									$opt=$_POST['option'];
									$question= $_POST['quest'];
									//echo $question;
									//echo $opt;
									$sqlResult=mysql_query("select * from tbl_questions where question='$question' and correct_ans='$opt'") or die(mysql_error());
									
									if(mysql_fetch_array($sqlResult) > 0)
									{
										//echo 'Hello';
										$_SESSION['mark']= $_SESSION['mark'] + 5;
										$_SESSION['count']=$_SESSION['count']+1;
										//echo $_SESSION['mark'];
									}
								
								}
							 }
							 else
							 {
							 	
							 	unset($_SESSION['qu_no']);
								
								unset($_SESSION['i']);
							}
							?>
								<div align="right"><strong style="color:#FF0000"><?php echo 'Mark Obtained:'. $_SESSION['mark']; ?></strong></div>
							<?php
							 }
							 if(isset($_POST['finalSubmit']))
							 {
							 	$c=$_SESSION['count'];
								$m=$_SESSION['mark'];
								unset($_SESSION['count']);
								unset($_SESSION['mark']);
								//echo $session_id;
								$updateQry=mysql_query("update tbl_exam set max_mark='100', mark_obtained='$m' where student_id='$session_id' and subject_id='$subject_id'")or die(mysql_error());
								if($updateQry)
								{
									unset($_SESSION['TIMER']);
							 		header('location:Result.php?sid='.$subject_id.'&mark='.$m.'&count='.$c);
								}
							 }
							 ?>
					</form>
				</div>
			</div>
				
              

</body>
</html>


