<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">
        <!-- navbar-->
        
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
                            echo $new;
                            ?>
                            <br><br>
                            <?php $user_query=mysql_query("select * from tbl_admin where user_id='$session_id'")or die(mysql_error());
                            $row=  mysql_fetch_array($user_query);
                            ?>
                              <!-- profile pic-->
                        <img  src="<?php echo $row['image']; ?>"  class="img img-rounded" id="image" width="25" height="25">
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
<!-- navbr ends-->

            

            <div class="container">

                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a href="add_user.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User</a>
                                <a href="user.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    
                    <div class="span10">

					<div class="hero-unit-3">
                        <ul class="thumbnails">
                            <li class="span7">
                                <div class="thumbnail">
                                    <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add User Account</div>

                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">Username:</label>
                                            <div class="controls">
                                                <input type="text" name="un" id="inputEmail" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password:</label>
                                            <div class="controls">
                                                <input type="password" name="p" id="inputPassword" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">FirstName:</label>
                                            <div class="controls">
                                                <input type="text" name="fn" id="inputPassword" placeholder="FirstName" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">LastName:</label>
                                            <div class="controls">
                                                <input type="text" name="ln" id="inputPassword" placeholder="LastName" required>
                                            </div>
                                        </div>
                                          <div class="control-group">
                                    <label class="control-label" for="inputPassword">Image:</label>
                                    <div class="controls">
                                        <input style="width: 220px" type="file" name="fileToUpload" id="fileToUpload"/> 
                                    </div>
                                </div>
                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save User</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST['save'])) {

                                        $un = $_POST['un'];
                                        $p = $_POST['p'];
                                        $fn = $_POST['fn'];
                                        $ln = $_POST['ln'];
								
									/*$image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                                $image_name = addslashes($_FILES['img']['name']);
                                $image_size = getimagesize($_FILES['img']['tmp_name']);
								$student_id=0;
                                move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/" . $_FILES["img"]["name"]);
                                $location = "uploads/" . $_FILES["img"]["name"];*/
								
								$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$location=$target_file;
echo $location;
								
								
                                        
                                        mysql_query("insert into tbl_admin (username,password,firstname,lastname,image) values ('$un','$p','$fn','$ln','$location')")or die(mysql_error());
                                        header('location:user.php');
                                    }
                                    ?>

                                </div>
                            </li>

                        </ul>
						</div>



                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>




</body>
</html>


