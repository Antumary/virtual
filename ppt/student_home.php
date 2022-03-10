<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_student where student_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
$exam_declaration_Query=mysql_query("select * from tbl_exam where student_id='$session_id' and max_mark='0' ") or die(mysql_error());
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

				<div class="hero-unit-3">
                    <div class="alert-index alert-success">
					<i class="icon-file-alt icon-large"><a href="student_home.php"   >  Exam Notification </a> </i>
					<?php
					if($exam_row=mysql_num_rows($exam_declaration_Query) > 0)
					{
							while($exam_row=mysql_fetch_array($exam_declaration_Query))
							{
								$sub_id=$exam_row['subject_id'];
								$sub_qry=mysql_query("select subject_title from tbl_subject where subject_id='$sub_id'");
								$subject=mysql_fetch_array($sub_qry);

								?>
								<div><a href="question_paper.php<?php echo "?sid=".$sub_id;?>">
								<?php echo '<br>'; echo $subject['subject_title'].',Date:'.$exam_row['exam_date'];?></a></div>
								<?php
							}
				}
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
                                <a href="chat frame.php"><i class="icon-group icon-large"></i>Virtual ChatRoom
                                    <div class="pull-right">
                                        <i class="icon-double-angle-right icon-large"></i>
                                    </div>
                                </a></li>



                  <li>
                           <!-- <a href="payment.php"><i class="icon-group icon-large"></i>&nbsp;Payment
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>-->



                    </ul>
                </div>

            </div>

            <div class="span9">

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>Head Up!</strong>&nbsp;Live Online Tutoring.
                </div>
                <div class="slider-wrapper theme-default">

                    <?php include('slider.php'); ?>

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
