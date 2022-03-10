<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>	

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">

                    <div class="span2">
					<ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a  href="add_teacher.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Teacher</a>
                            </li>


                        </ul>
					</div>
					<div class="span10">
					<div class="thumbnails">
                        <div class="hero-unit-3">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Teachers Table</strong>
                                </div>
                                <thead>
                                    <tr>


                                        <th>Photo</th>
										<th>Department</th> 
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Email ID</th>                                
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysql_query("select * from tbl_teacher") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $teacher_id = $row['teacher_id'];
                                        ?>
                                        <tr class="odd gradeX">

                                            <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#e<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#e<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                                
                                            $('#d<?php echo $teacher_id; ?>').tooltip('show')
                                            $('#d<?php echo $teacher_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->

                                    <td width="40"><img class="img-rounded" src="<?php echo $row['image']; ?>" height="50" width="30"></td>
									<td><?php 
									$did=$row['dept_id'];
									$dname=mysql_query("select dept_name from tbl_department where dept_id='$did'");
									while($r=mysql_fetch_array($dname))
									{
										echo $r['dept_name'];
									}
									 ?></td> 
                                    <td><?php echo $row['username']; ?></td> 
                                    <td><?php echo $row['password']; ?></td> 
                                    <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td> 
                                   	<td><?php echo $row['email'];?></td>

                                    <td width="100">
                                        <a rel="tooltip"  title="Delete Teacher" id="d<?php echo $teacher_id; ?>" href="#course_id<?php echo $teacher_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;</a>
                                        <a rel="tooltip"  title="Edit Teacher" id="e<?php echo $teacher_id; ?>" href="edit_teacher.php<?php echo '?id='.$teacher_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;</a>
                                    </td>
                                    <!-- user delete modal -->
                                    <div id="course_id<?php echo $teacher_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp; this Teacher?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_teacher.php<?php echo '?id=' . $teacher_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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


