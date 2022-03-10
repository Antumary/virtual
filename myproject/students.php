<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_teacher where teacher_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
?>
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
                       
                        <li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
							<li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>Upload Notes
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
							  <li><a href="teacher_video.php"><i class="icon-file-alt icon-large"></i>Upload video
                              <div class="pull-right">
                                  <i class="icon-double-angle-right icon-large"></i>
                              </div>
                          </a></li>
                        <li    class="active"><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
							<li><a href="chat frame.php"><i class="icon-group icon-large"></i>Virtual ChaTRoom
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



               <!-- <a href="teacher_add_student.php" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Student</a>-->
                <br>
                <br>

                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Students Table</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Name</th>

                                <th>Photo</th>
								<th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysql_query("select distinct student_id from tbl_class where teacher_id = '$session_id'") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $student_id = $row['student_id'];
                                $student_query = mysql_query("select * from tbl_student where student_id='$student_id'") or die(mysql_error());
                                $student_row = mysql_fetch_array($student_query);
                                ?>



                                <tr class="odd gradeX">
                                    <!-- script -->
                            <script type="text/javascript">
                                $(document).ready(function(){
                                                                                                    
                                    $('#e<?php echo $student_id; ?>').tooltip('show')
                                    $('#e<?php echo $student_id; ?>').tooltip('hide')
                                });
                            </script>
                                       <!-- script -->
                            <script type="text/javascript">
                                $(document).ready(function(){
                                                                                                    
                                    $('#d<?php echo $student_id; ?>').tooltip('show')
                                    $('#d<?php echo $student_id; ?>').tooltip('hide')
                                });
                            </script>


                            <td><?php echo $student_row['fullname']; ?></td>
							

                            <td width="50"><img class="img img-rounded" src="admin/<?php echo $student_row['image']; ?>" width="50" height="50"></td>
							<td><?php echo $student_row['email']; ?></td>
                            <td width="100">
                                <a rel="tooltip"  title="View More Info" id="e<?php echo $student_id; ?>" href="#view<?php echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-align-justify icon-large"></i></a>
                              <!--  <a  rel="tooltip"  title="Delete Student" id="d<?php //echo $student_id; ?>" href="#teacher<?php //echo $student_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;</a>
-->
                         <!-- user view modal -->
                            <div id="view<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-info">Student <strong>Info</strong></div>
                                    <div class="span12">
                                        <div class="span6">
                                            <p>  Name:&nbsp;<strong><?php echo $student_row['fullname'] ; ?></strong> </p>
                                        </div>
                                        <div class="span6">
                                            <img class="img img-rounded" src="admin/<?php echo $student_row['image']; ?>" width="250">
                                        </div>
										<div class="span6">
                                            <p>  Email ID:&nbsp;<strong><?php echo $student_row['email'] ; ?></strong> </p>
                                        </div>
										<div class="span6">
                                            <p>  Contact Number:&nbsp;<strong><?php echo $student_row['contactno'] ; ?></strong> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>

                                </div>
                            </div>
                            <!-- end delete modal -->

                            </tr>
                        <?php } ?>
						</tbody>
                        </tbody>
                    </table>
					<?php
					
					?>
                    <!-- end slider -->
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






</body>
</html>


