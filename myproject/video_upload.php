<html>
<?php
include('header.php');
include ('session.php');
include ('config.php');
$get_id=$_GET['id'];
echo $user_query = mysql_query("select * from tbl_teacher where teacher_id='$session_id'") or die(mysql_error());
echo $user_row = mysql_fetch_array($user_query);
$subject_query=mysql_query("select * from tbl_subject where subject_id='$get_id'") or die(mysql_error());
$subject_row=mysql_fetch_array($subject_query);
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

                        <li  class="active"><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
							<li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>Upload Notes
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
                        <li><a href="students.php"><i class="icon-group icon-large"></i>&nbsp;Students
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
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Upload Files</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal"   method="post" enctype="multipart/form-data" name="upload" >
					<!--<button type="button" class="close" data_dismiss="alert">&times;</button>-->

                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Video</label>
                            <div class="controls">

                                <input name="file" type="file" class="input-xlarge" required/>
                                <!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> -->
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">File Name</label>
                            <div class="controls">
                                <input type="text" name="name" size="30" maxlength="30" class="input-xlarge" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Description</label>
                            <div class="controls">
                                <textarea name="desc" cols="" rows="" class="input-xlarge" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">

                                <input name="Upload" type="submit" value="Upload" class="btn btn-success" ></button>
                            </div>
                        </div>
                    </form>
                           <?php
						  if(isset($_POST['Upload']))
              {
                  echo "<script>alert('Uploaded Successfully')</script>";
                   $maxsize = 524288000; // 5MB

                   $name = $_FILES['file']['name'];
                   $target_dir = "videos/";
                   $target_file = $target_dir . $_FILES["file"]["name"];
                   

                   // Select file type
                   $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                   // Valid file extensions
                   $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

                   // Check extension
                   if( in_array($videoFileType,$extensions_arr) ){

                      // Check file size
                      if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                        echo "File too large. File must be less than 5MB.";
                      }else{
                        // Upload
                        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                          // Insert record
                            $query = mysql_query("INSERT INTO tbl_video(name,location,teacher_id,subject_id) VALUES('".$name."','".$target_file."','".$session_id."','".$get_id."')");


                          if($query)
                          {
                          echo "Upload successfully.";
                          }
                        }
                      }

                   }else{
                      echo "Invalid file extension.";
                   }

                 }

						   ?>

                        </div>




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
