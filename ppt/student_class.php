<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_student where student_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$cid=$user_row['course_id'];
$course_query = mysql_query("select course_title from tbl_course where course_id='$cid'") or die(mysql_error());
$course_row = mysql_fetch_array($course_query);
$subject_query = mysql_query("select * from tbl_subject where course_id='$cid' ") or die(mysql_error());
$count=0;
?>
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
                  <li>
                            <!--<a href="payment.php"><i class="icon-group icon-large"></i>&nbsp;Payment
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>-->



                    </ul>
                </div>

            </div>
			<div class="span9">
				<div class="hero-unit-3">
						<form method="post">
						<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <strong><i class="icon-user icon-large"></i>Course :<?php echo $course_row['course_title']; ?></strong>
                        </div>
						<table border="0"  class="table table-striped table-bordered" id="example">
						<th>Subject No</th>
						<th>Subject</th>
						<th>Teacher</th>
						<th>Action</th>
            <th>View Video</th>
						<?php
						while($subject_row = mysql_fetch_array($subject_query))
						{
							$count=$count+1;
							echo "<div><tr><td>".$count."</td>";
							echo "<td>".$subject_row['subject_title']."</td>";
							$sub_id=$subject_row['subject_id'];
							$class_query=mysql_query("select teacher_id from tbl_class where subject_id='$sub_id' and student_id='$session_id'") or die(mysql_error());
							$class_row=mysql_fetch_array($class_query);
							$tid=$class_row['teacher_id'];
							$teacher_query=mysql_query("select * from tbl_teacher where teacher_id='$tid'");
							$teacher_row=(mysql_fetch_array($teacher_query));
							echo "<td>".$teacher_row['firstname']." ". $teacher_row['lastname']."</td>";

							?>
							<td><a rel="tooltip" title="View notes" class="btn btn-info" href="download.php<?php echo "?sid=".$sub_id."&&tid=".$tid; ?>">View Notes     <i class="icon-file-alt icon-large"></i></a></td>
              <td> <a title="View Video" href="view_video.php?sub=<?php echo $sub_id ?>"> View Video </a> </td>


              </tr></div>


            	<?php
							}
							?>

							</table>
						</form>
						</div>
						</div>

            <!--<div class="span9">

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Head Up!</strong>&nbsp;Welcome to E-Learning Site.
                </div>
                <div class="slider-wrapper theme-default">

                    <?//php include('slider.php'); ?>

                </div>
                <!-- end slider -->
            </div>

        </div>

        <?php include('footer.php'); ?>
    </div>
</div>
</div>

</body>
</html>
