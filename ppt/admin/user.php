<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">
<!-- nav bar-->

<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -->

            <!-- Everything you want hidden at 940px or less, place within here -->



            <div class="nav-collapse collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -->

                <ul class="nav">
                    <li><a href="home.php"><i class="icon-home icon-large"></i>&nbsp;Home</a></li>                    
                    <li><a href="student.php"><i class="icon-group icon-large"></i>&nbsp;Students</a></li>
					<li><a href="department.php"><i class="icon-group icon-large"></i>&nbsp;Departments</a></li>
                    <li><a href="course.php"><i class="icon-group icon-large"></i>&nbsp;Courses</a></li>
					<li><a href="subject.php"><i class="icon-group icon-large"></i>&nbsp;Subjects</a></li>
					<li><a href="teacher.php"><i class="icon-group icon-large"></i>&nbsp;Teachers</a></li>
					<li><a href="add_student_class.php"><i class="icon-group icon-large"></i>&nbsp;Class</a></li>
                    <li><a href="declare_exam.php"><i class="icon-group icon-large"></i>&nbsp;Declare Exam</a></li>
                 <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-folder-close-alt icon-large"> </i>&nbsp;entry
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="add_department.php">Department</a></li>
                            <li><a href="add_course.php">Course</a></li>
                            <li><a href="add_subject.php">Subject</a></li>
                        </ul>s
                    </li>-->
					
                    <li><a href="user.php"><i class="icon-user icon-large"></i>&nbsp;User</a></li>
                    <li><a  href="#myModal" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="hero-unit-header">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">

<br />
                <div class="row-fluid">
                    <div class="span6">
                        <img src="images/head1.png">
                    </div>
                    <div class="span6">

                        <div class="pull-right">
                      
                            <i class="icon-calendar icon-large"></i>
                            <?php
                            $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                            echo '<font color ="white">'.$new.'</font>';
                            ?>
                            <br><br>
                            <?php $user_query=mysql_query("select * from tbl_admin where user_id='$session_id'")or die(mysql_error());
                            $row=  mysql_fetch_array($user_query);
                            ?>
                              <!-- profile pic-->
                        <img  src="<?php echo $row['image']; ?>"  class="img img-rounded" id="image" width="35" height="40">
                         &nbsp;
                        <!--pic end -->
                            <a href="" class="btn btn-info">Welcome:<i class="icon-user icon-large"></i>&nbsp;<?php echo $row['firstname']." ".$row['lastname']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- navbar closes-->

          

            <div class="container">

                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a  href="add_user.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">

                        <div class="hero-unit-3">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;User Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                     <th>Photo</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysql_query("select * from tbl_admin") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $user_id = $row['user_id'];
                                        ?>
                                        <tr class="odd gradeX">
                                            
                                                         <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            
                                            $('#e<?php echo $user_id; ?>').tooltip('show')
                                            $('#e<?php echo $user_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <!-- script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            
                                            $('#d<?php echo $user_id; ?>').tooltip('show')
                                            $('#d<?php echo $user_id; ?>').tooltip('hide')
                                        });
                                    </script>
                                    <!-- end script -->
                                    <td width="40"><img class="img-rounded" src="<?php echo $row['image']; ?>" height="50" width="30"></td>
                                            
                                            <td><?php echo $row['username']; ?></td> 
                                            <td><?php echo $row['password']; ?></td> 
                                            <td><?php echo $row['firstname']; ?></td> 
                                            <td><?php echo $row['lastname']; ?></td> 
                                            <td width="100">
                                                <a rel="tooltip"  title="Delete User" id="d<?php echo $user_id; ?>" href="#userdel<?php echo $user_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                                </a>
												 <a rel="tooltip"  title="Edit User" id="e<?php echo $user_id; ?>" href="edit_user.php<?php echo '?id='.$user_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;</a>
                                            </td>
                                            <!-- user delete modal -->
                                    <div id="userdel<?php echo $user_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Delete</strong>&nbsp;<?php echo $row['firstname'] . "  " . $row['lastname']; ?>?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
                                            <a href="delete_user.php<?php echo '?id=' . $user_id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
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


