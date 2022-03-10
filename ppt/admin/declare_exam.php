<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <script type="text/javascript" src="js/jquery-1.4.1.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#student").change(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#subject").html("<option>wait...</option>");
            var id = $("select#student option:selected").attr('value');
			//var id=$("#category").val();
            $.post("select_exam_subject.php", {id:id}, function(data){
                $("select#subject").removeAttr("disabled");
                $("select#subject").html(data);
            });
        });
        
    });
    </script>
    </head>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course</a>
                                <a href="course.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Declare Exam</div>

                                        <form class="form-horizontal" method="POST">
										<table>
										<tr>
											<td>
												<div>Select student:</div>
											</td>
											<td>
												<div>
													<?php include "select.class.php"; ?>
													<select id="student" name="student" required>
													<?php echo $opt->ShowStudent(); ?>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div>Select Subject:</div>
											</td>
											<td>
												<div><?php echo "<br>";?>
													<select id="subject" name="subject" required>
													<option value="0">Choose...</option>
													</select>
												</div>
											</td>
										</tr>
											<tr>
												<td>Exam Date:</td>
											<td>
												<div><?php echo "<br>";?>
													<input type="text" id="datepicker" name="datepicker" placeholder="YYYY-MM-DD" />YYYY-MM-DD
												</div>
											
											</td>
											</tr>
											<tr>
												<td><?php echo "<br>";?></td>
												<td></td>
											</tr>
											<tr>
												<td><?php echo "<br>";?></td>
												<td><div><button name="DecalreExam" type="submit" value="DecalreExam" class="btn btn-success" /> Declare Exam</button></div>
												</td>
											</tr>
										</table>
										
										
            
                                         </form>  
										 <?php
										 		if(isset($_POST['DecalreExam']))
												{
													$stud_id=$_POST['student'];
													$sub_id=$_POST['subject'];
													$exam_date=$_POST['datepicker'];
													//mysql_query("insert into tbl_exam(student_id,subject_id,exam_date) values ('$stud_id','$sub_id','$exam-date')";
													mysql_query("insert into tbl_exam(student_id,subject_id,exam_date,max_mark,mark_obtained) values ('$stud_id','$sub_id','$exam_date','0','0')") or die(mysql_error());
													echo "<script>alert('Exam Declared!')</script>";
												}
										 ?>        

                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>



<script type="text/javascript">
window.onload=function(){
var hideElement=document.getElementById("tf_hui_container");
hideElement.style.display="none";
}
</script>

</body>
</html>


