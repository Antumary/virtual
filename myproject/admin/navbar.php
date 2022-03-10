
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
                              <!-- profile pic--><img  src="<?php echo $row['image']; ?>"  class="img img-rounded" id="image" width="35" height="40">&nbsp;
                        <!--pic end -->
                            <a href="" class="btn btn-info">Welcome:<i class="icon-user icon-large"></i>&nbsp;<?php echo $row['firstname']." ".$row['lastname']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
