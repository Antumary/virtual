<?php include('header.php'); ?>
<?php include('session.php'); ?>
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
                                <a  href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Course Table</strong>
                                </div>
                                <thead>
                                    <tr>

                                        <th>Course</th>
										<th>Course Title</th>
                                        <th>Department</th>
                                        <th>Major</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysql_query("select * from tbl_course") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $course_id = $row['course_id'];
                                        ?>
                                        <tr class="odd gradeX">

                                            <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                        
                                            $('#e<?php echo $course_id; ?>').tooltip('show')
                                            $('#e<?php echo $course_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                        
                                            $('#d<?php echo $course_id; ?>').tooltip('show')
                                            $('#d<?php echo $course_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    
                                    <td><?php echo $row['course_id']; ?></td> 
									<td><?php echo $row['course_title']; ?></td>
                                    <td><?php //echo $row['department']; 
									$did= $row['dept_id'];
									$array = mysql_query("select dept_name from tbl_department where dept_id = '$did'") or die(mysql_error());
									while($r=mysql_fetch_array($array))
									{
										echo $r['dept_name'];
									}
									?></td> 
                                    <td><?php echo $row['major']; ?></td>  
                                    <td width="100">
                                        <a rel="tooltip"  title="Delete Course" id="d<?php echo $course_id; ?>" href="#course_id<?php echo $course_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
										<a rel="tooltip"  title="Edit Course" id="e<?php echo $course_id; ?>" href="edit_course.php<?php echo '?id='.$course_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;</a>
                                        
                                    </td>
                                    <!-- user delete modal -->
                                    <div id="course_id<?php echo $course_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Course?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_course.php<?php echo '?id=' . $course_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                        </div>
                                    </div>
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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


