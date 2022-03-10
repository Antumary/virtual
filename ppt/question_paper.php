<?php
$subject_id=$_REQUEST["sid"];
include('header.php');
include ('session.php');
$start=0;
$qu_no=0;
$mark=0;
$student_query = mysql_query("select * from tbl_student where student_id='$session_id'") or die(mysql_error());
$student_row = mysql_fetch_array($student_query);
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
	$query = mysql_query("select distinct * from tbl_questions where subject_id='$subject_id' and course_id='$student_course' and teacher_id='$teacher_id' order by RAND() Limit 1") or die(mysql_error());
	$QryExamDate=mysql_query("select count(*) from tbl_exam where student_id='$session_id' and subject_id='$subject_id' and exam_date=CURDATE()");
	$examCount=mysql_fetch_array($QryExamDate);
	
	
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
			</div>
			<div class="span9">
                <div class="hero-unit-3">
					<form method="post" enctype="multipart/form-data">
					
						<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Questions</strong>
						</div>
						<div class="<div class="thumbnail">
						<table cellpadding="0" cellspacing="0" border="0"  class="table table-striped table-bordered" id="example" name="examTable">
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000"> <strong>Please Read Instructions </strong></div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000" >&diams; There is no negative marks</div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000">&diams; Total number of questions is 5</div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000">&diams; Each questions carry 5 marks </div>
							</td>
							</tr>
							<tr>
							<td>
								<div><?php echo "<br>";?></div>
								<div align="center" style="color:#FF0000">&diams; Maximum time allowed is 10 minute</div>
							</td>
							</tr>
													</table>
						<div id="start" align="center" style="visibility:visible"><input type="submit" id="startSubmit" name="startSubmit" value="Start Exam" class="btn btn-success" <?php if($examCount[0] <= 0){echo "disabled=disabled";}?> />
						</div>
						</div>
						<?php
							if(isset($_POST['startSubmit']))
							{
								
								header('location:ViewQuestions.php?sid='.$subject_id);
							}
						?>
						
					</form>
				</div>
			</div>
				
              

</body>
</html>


