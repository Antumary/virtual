<?php
$course_id=$_REQUEST["sid"];
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
$selCourse=mysql_query("select * from tbl_course where course_id='$course_id'");
$courserow=mysql_fetch_array($selCourse);
$did=$courserow['dept_id'];
$selDepart=mysql_query("select * from tbl_department where dept_id='$did'");
$deptrow=mysql_fetch_array($selDepart);
?>
<body>
    <?php include('navhead.php'); ?>

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
                        <li class="active"><a href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="add_student.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Student Registration
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a>                
                        </li>
						
                        <li class="nav-header">About US</li>
                        <li><a  href="#mission" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Mission
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#vision" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Contact Us
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#benefits" rol="button" data-toggle="modal"><i class="icon-list-alt icon-large"></i>&nbsp;Benefits
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
						<li><a href="#coursesofferd" rol="button" data-toggle="modal"><i class="icon-list-alt icon-large"></i>&nbsp;Courses Offered
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                    </ul>
                </div>
                <br>


            </div>
            <div class="span9">
                <section class="main">
                    <div class="custom-calendar-wrap">
                        <div id="custom-inner" class="custom-inner">
                            <div class="custom-header clearfix">
                                <nav>
                                    <span id="custom-prev" class="custom-prev"></span>
                                    <span id="custom-next" class="custom-next"></span>
                                </nav>
                                <h2 id="custom-month" class="custom-month"></h2>
                                <h3 id="custom-year" class="custom-year"></h3>
                            </div>
                            <div id="calendar" class="fc-calendar-container"></div>
                        </div>
                    </div>
                </section>
				<div class="container">
        			<div class="row-fluid">
						<div class="span9">
							<div class="hero-unit-3">
							<div class="alert alert-info">
                    				<button type="button" class="close" data-dismiss="alert"></button>
                    				<strong>Course Details</strong>&nbsp;
	            					</div>	
									<div class="thumbnail">
											<p><strong style="color:#FF0000"> Course Title &nbsp;: &nbsp;<?php echo $courserow['course_title'];  ?></strong> </p>
                      						<div class="thumbnail">
					                   		<p style="color:#0000FF"> Course Code &nbsp;: &nbsp;<?php echo $courserow['course_id'];  ?></strong> </p>
                                            <p style="color:#0000FF"> Department Name &nbsp;: &nbsp;<?php echo $deptrow['dept_name'];  ?></strong> </p>
											<p style="color:#0000FF"> Fee Structure &nbsp;: &nbsp;<?php echo $courserow['fee_structure'];  ?></strong> </p>
											<p style="color:#0000FF"> Course Duration &nbsp;: &nbsp;<?php echo $courserow['course_duration'];  ?></strong> </p>
											</div>
											<p style="color:#0000FF"> <strong style="color:#FF0000">Course Contents &nbsp;: &nbsp;</strong> </p>
											<div class="thumbnail">
											<?php
												$selsubj=mysql_query("select * from tbl_subject where course_id='$course_id' order by subject_code asc");
												while($subrow=mysql_fetch_array($selsubj))
												{?>
													<p style="color:#0000FF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $subrow['subject_code']; ?>&nbsp;:&nbsp;
													<?php echo $subrow['subject_title']; ?></p>
												<?php }?>
											
                			</div>
							</div>
						</div>
					</div>				
				</div>
                <!-- end slider -->
            </div>

        </div>

    </div>
	
    <!---------------->
    <div class="container">

        <div class="row-fluid">
            <div class="span12">

                <div class="row-fluid">
                    <div class="span17">
                        <div class="alert alert-success"><i class="icon-file icon-large"></i>&nbsp;<strong>OUR MISSION</strong></div>
                        <div class="hero-unit-2">
                            Virtual Academy is a unique learning environment developed specifically to help students achieve the best possible grades in their exams. It works by providing students with online access to concise coverage of theory and helps at times in the year when extra support is needed, it’s winning formula for exam success, used by individual students, schools and colleges across the world. Vedantu effectively promotes students learning and can increase student knowledge in specific subjects and topics through targeted components detailed in each lesson module. It aids in increasing basic academic skills such as reading, spelling, history, science, and mathematics and assists in the process of evaluating and synthesizing information </div>

                    </div>
   			 </div>
		</div>
	</div>
</div>
</body>
 <?php include('footer.php'); ?>
</html>


