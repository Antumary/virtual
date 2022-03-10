<br>
<div class="navbar  navbar-inverse">
    <div class="navbar-inner">
        <div class="footerindex">
            <center>
              <img width="25" height="25" src="admin/img/chmsc.png">&nbsp;Copyright &copy; 2022 Virtual Academy &reg; . All rights reserved.
</center>
        </div>
        <!-- modal -->
        <!-- mission -->
        <div id="mission" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">


                <div class="alert alert-info"><strong>Our Mission</strong></div>
                <p>
                    To provide a better learning experience.
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>
        <!-- end mission -->
        <!-- vision -->
        <div id="vision" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>Contact Us</strong></div>

                <p> Virtual Academy site developed by <a href="why.php">ANITTA GEORGE</a></p>
                <p>For feedback and complaints contact us on : <a href="//www.gmail.com">anittageorge020@gmail.com</a></p>

                <p>Talk to us on  : <a href=>9605125267</a></p>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>
        <!-- end vision -->


		<!--benefits-->
		<div id="benefits" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>Benefits</strong></div>

                A tutor from any part of the world can provide lectures to any student/s on any part of the world. An  platform that  providing a vast learning knowledge! 

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>

		<!-- end benefits-->

		<!-- courses offered -->
		<div id="coursesofferd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">
			   <div class="alert alert-info"><strong>
                            <i class="icon-building icon-large"></i>&nbsp;COURSES IN:
				</strong>
               </div>
               <div class="hero-unit-3">

								<?php $selDept=mysql_query("select * from tbl_department");
								while($rowdept=mysql_fetch_array($selDept))
								{?>
								<p><strong style="color:#000099" style="size:30"><i class=""></i><?php echo $rowdept['dept_name'].' Department';?></strong></p>

								<?php
								$did=$rowdept['dept_id'];
								//echo $did
								$selCourse=mysql_query("select * from tbl_course where dept_id='$did'");
								while($rowcourse=mysql_fetch_array($selCourse))
								{
								$course_id=$rowcourse['course_id']; ?>
									<p><i class="icon-sign-blank"><a rel="tooltip"  href="view_course.php?sid=<?php echo $course_id; ?>" title="View course details" rol="button" data-toggle="modal">&nbsp;<?php echo $rowcourse['course_title']; ?></a></i></p>
				 <?php }
								} ?>
               </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>
		<!-- end courses offered -->

        <!--end modal -->

    </div>
</div>
</div>
