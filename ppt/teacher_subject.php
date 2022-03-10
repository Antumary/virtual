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
                        <li   class="active"><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
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
                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
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
				<div class="hero-unit-3">

                <a href="teacher_add_subject.php" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Add Subject</a>
                <br>
                <br>
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Subject Table</strong>
                        </div>
                        <thead>
                            <tr>

                                <th>Subject</th>
                                <th>Subject Code</th>
                                <th>Course Code</th>
								<th>Action</th>
								<th>Upload File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $teacher_subject_query = mysql_query("select * from tbl_teacher_subject where teacher_id='$session_id'") or die(mysql_error());
							
							   while ($teacher_row = mysql_fetch_array($teacher_subject_query)) {
                        
                            $subject_id = $teacher_row['subject_id'];

                            $query = mysql_query("select * from tbl_subject where subject_id = '$subject_id'") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
							   
                                $id = $row['subject_id'];
                                ?>
                                  
                                    <td><?php echo $row['subject_title']; ?></td>
                                    <td><?php echo $row['subject_code']; ?></td> 
                                    <td><?php echo $row['course_id']; ?></td>   
									<td width="100">
									<a  rel="tooltip"  title="Delete" id="d<?php echo $row['subject_id']; ?>" href="delete_teacher_subject.php<?php echo '?id=' .  $row['subject_id']; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;</a>
                                    </td>
									
									 <td>
									 <a  rel="tooltip"  title="upload files" id="d<?php echo $row['subject_id']; ?>" href="upload.php<?php echo '?id=' .  $row['subject_id']; ?>" role="button"  data-toggle="modal" class="btn btn-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp; Upload Files</a>
									 	
									 </td>
                            </tr>
                        <?php }
						} ?>
                        </tbody>
                    </table>
                    <!-- end slider -->
                </div>
            </div>
			</div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>
</body>
</html>


