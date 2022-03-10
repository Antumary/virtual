<html>
<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_teacher where teacher_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$did=$user_row['dept_id'];
$selcourse=mysql_query("select * from tbl_course where dept-id='$did'"); 
?>
<head>
<script type="text/javascript" src="admin/js/jquery-1.4.1.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#course").change(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#subject").html("<option>wait...</option>");
            var id = $("select#course option:selected").attr('value');
			//var id=$("#category").val();
            $.post("select_subject.php", {id:id}, function(data){
                $("select#subject").removeAttr("disabled");
                $("select#subject").html(data);
            });
        });
        
    });
    </script>
</head>
<body>
    <?php include('navhead_user.php'); ?>
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
                        <li>
                            <a href="teacher_home.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        
                        <li  class="active"><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
							<li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>Upload Notes
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
							<li><a href="AddQns.php"><i class="icon-file-alt icon-large"></i>Questions
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>

                    </ul>
                </div>

            </div>
            <div class="span9">
			<div class="hero-unit-3">
                <div class="alert alert-info">
                    <strong><i class="icon-user icon-large"></i>&nbsp;Add Subject</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal" method="POST">
					<table>
					<tr>
					<div class="control-group">
                            <label class="control-label" for="inputSubject">Course</label>
                            <div class="controls">
							<?php include "select.class.php"; ?>
							<select id="course" name="course" class="span6">
							<?php echo $opt->ShowSubjectCourse($did); ?>
							</select>
							</div>
					</div>
					</tr>
					<tr>
                        <div class="control-group">
                            <label class="control-label" for="inputSubject">Subject</label>
                            <div class="controls">

                                <select id="subject" name="subject" class="span6">
								<option>Choose...</option>
                                </select>
                            </div>
							</div>
                        </div>
						</tr>
						<tr>
						<div class="control-group">
                            <div class="controls">
                               <input type="submit" name="save_subject" class="btn btn-success" value="Add Subject"/>
                            </div>
						</div>
						</tr>
                         </table>
						 </form>
                            <?php
                            if (isset($_POST['save_subject'])) {
								$cid= $_POST['course'];
                                $sid = $_POST['subject'];

                                $result = mysql_query("select * from tbl_teacher_subject where teacher_id='$session_id' and subject_id='$sid' and course_id='$cid'") or die(mysql_error());
                                $count = mysql_num_rows($result);

                                if ($count > 0) {
                                    ?>
                                    <div class="alert alert-danger">Subject <strong>Already Exist</strong></div>
                                    <?php
                                } else {


                                    mysql_query("insert into tbl_teacher_subject (teacher_id,course_id,subject_id) values('$session_id','$cid','$sid')") or die(mysql_error());
                                    header('location:teacher_subject.php');
                                }
                            }
                            ?>

                        </div>
                    <!-- end slider -->
                </div>
            </div>
			</div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</body>
</html>


