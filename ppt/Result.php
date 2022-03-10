<?php
$subject_id=$_REQUEST["sid"];
$mar=$_REQUEST["mark"];
$count=$_REQUEST["count"];
include('header.php');
include ('session.php');
$start=0;
$qu_no=0;
$mark=0;
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
	$query = mysql_query("select * from tbl_questions where subject_id='$subject_id' and course_id='$student_course' and teacher_id='$teacher_id' order by RAND() Limit 1") or die(mysql_error());
	
?>
<head>
<script type="text/javascript" src="admin/js/cdtimer.js" ></script>
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
				<div class="hero-unit-1">
                    <ul class="nav  nav-pills nav-stacked">
                        <li class="nav-header">Links</li>
                        <li   class="active">
                            <a href="student_home.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li>
                            <a href="student_class.php"><i class="icon-group icon-large"></i>&nbsp;Class
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
					</ul>
				</div>
			</div>
			
			<div class="span9">
                <div class="hero-unit-3">
					<form method="post" enctype="multipart/form-data">
						<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Questions</strong>
						</div>
						<table cellpadding="0" cellspacing="0" border="0"  class="table table-striped table-bordered" id="example" name="examTable">
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000">Total Number of questions: 5 </div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000"><strong>Maximum Mark: 25</strong> </div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000">Number of correct answers:<?php echo $count?> </div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000"><strong>Total mark obtained: <?php echo $mar ?></strong> </div>
							</td>
							</tr>
						</table>
						<div><?php echo "<br>";?></div>
						<div id="start" align="center" style="visibility:visible"><input type="submit" name="ViewAnswers" value="View Answers" class="btn btn-success"/> 
						
						</div>
						<?php
							if(isset($_POST['ViewAnswers']))
							{
								$query=mysql_query("select * from tbl_questions where subject_id='$subject_id' and course_id='$student_course' and teacher_id='$teacher_id'");
								$count=0;
							while ($row = mysql_fetch_array($query)) 
							{
								if($_SESSION['qu_no'] <= 5)
								{
									$count=$count+1;
								?>
						<table cellpadding="0" cellspacing="0" border="0"  class="table table-striped table-bordered" id="example" name="examTable">
							<tr>
							</tr>
						
							<tr>
								<td><div align="left">Question <?php  echo $count; ?>:<?php echo $row['question']; ?> <input type="text" name="quest" value="<?php echo $row['question']; ?> " style="visibility:hidden"/></div></td><br>
							</tr>
							<tr>
								<td><div align="left">Correct Ans:<?php echo $row['correct_ans'];?></div></td>
							</tr>
							
							<tr>
							</tr>
							
						</table>
						<?php
						}
						}
						?>
						<div align="center" style="font-size:24px" style="color:#0000CC"><strong style="color:#FF0000"> THANK YOU. VISIT AGAIN...</strong></div>
						<?php
							}
							?>
                            &nbsp;
                            <center><input type="submit" name="issuecertificate" value="Issue Certificate"class="btn btn-success"/></center>
					</form>
				</div>
			</div>
				<?php
				if(isset($_REQUEST['issuecertificate']))
				{
				echo "<script>alert('Concerned Course certificate has been sent to your Mail. If not received kindly contact us');</script>";
				}
				?>
              

</body>
</html>


