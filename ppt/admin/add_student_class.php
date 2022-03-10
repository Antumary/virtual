<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $admin_query = mysql_query("select * from tbl_admin where user_id='$session_id'") or die(mysql_error());
$admin_row = mysql_fetch_array($admin_query); ?>
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
            $.post("select_subject.php", {id:id}, function(data){
                $("select#subject").removeAttr("disabled");
                $("select#subject").html(data);
            });
        });
		 $("select#teacher").attr("disabled","disabled");
            $("select#subject").change(function(){
            $("select#teacher").attr("disabled","disabled");
            $("select#teacher").html("<option>wait...</option>");
            var id = $("select#subject option:selected").attr('value');
			//var id=$("#category").val();
            $.post("select_teacher.php", {id:id}, function(data){
                $("select#teacher").removeAttr("disabled");
                $("select#teacher").html(data);
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
                                <a href="add_course.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Class Entry</div>

                                        <form class="form-horizontal" method="POST">
										<div class="control-group">
                                                <label class="control-label" for="inputDepartment">Students:</label>
                                                <div class="controls">
            
                                                    <?php include "select.class.php"; ?>
            										<select id="student" name="student" required>
                										<?php echo $opt->ShowStudent(); ?>
            										</select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputCourse">Subjects of student:</label>
                                                <div class="controls">
                                                <select id="subject" name="subject" required>
             										<option value="0">choose...</option>
        										</select>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse"> Available Teachers:</label>
                                                <div class="controls">
                                                    <select id="teacher" name="teacher" required>
														<option value="0">choose...</option>
        										</select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Class</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $student_id=$_POST['student'];
											$subject_id=$_POST['subject'];
											$teacher_id=$_POST['teacher'];
                                            mysql_query("insert into tbl_class (student_id,subject_id,teacher_id) values ('$student_id','$subject_id','$teacher_id')") or die(mysql_error());
											echo "<script>alert('Successfully inserted')</script>";
                                           // header('location:course.php');
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


