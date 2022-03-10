<html>
<?php
include('header.php');
include ('session.php');
$get_id=$_GET['id'];
$user_query = mysql_query("select * from tbl_teacher where teacher_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
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
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Upload Files</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal"   method="post" enctype="multipart/form-data" name="upload" >
					<!--<button type="button" class="close" data_dismiss="alert">&times;</button>-->
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">File</label>
                            <div class="controls">

                                <input name="uploaded_file" type="file" class="input-xlarge" required/>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
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

                                <input name="Upload" type="submit" value="Upload" class="btn btn-success" /></button>
                            </div>
                        </div>
                    </form>
                           <?php
						   	if(isset($_POST['Upload']))
							{
								//include('session.php');
								//Include database connection details
								require("opener_db.php");
								$errmsg_arr = array();
								//Validation error flag
								$errflag = false;
								//Function to sanitize values received from the form. Prevents SQL injection
								function clean($str) {
									$str = @trim($str);
									if (get_magic_quotes_gpc()) {
										$str = stripslashes($str);
									}
									return mysql_real_escape_string($str);
								}
								//Sanitize the POST values
								$filedesc = clean($_POST['desc']);
								$fname= clean($_POST['name']);
								//echo $fname;
								//echo "</br>";
								//echo $filedesc;
								if ($filedesc == '') {
									$errmsg_arr[] = ' file discription is missing';
									$errflag = true;
								}

								if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
									$errmsg_arr[] = 'file selected exceeds 5MB size limit';
									$errflag = true;
								}


								//If there are input validations, redirect back to the registration form
								if ($errflag) {
									$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
									session_write_close();
									header("location: teacher_class.php");
									exit();
								}
								//upload random name/number
								$rd2 = mt_rand(1000, 9999) . "_File";
								//Check that we have a file
								if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
									//Check if the file is JPEG image and it's size is less than 350Kb
									$filename = basename($_FILES['uploaded_file']['name']);

									$ext = substr($filename, strrpos($filename, '.') + 1);
									if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {
										//Determine the path to which we want to save this file
										//$newname = dirname(__FILE__).'/upload/'.$filename;
										$newname = "uploads/" . $rd2 . "_" . $filename;
										//Check if the file with the same name is already exists on the server
										if (!file_exists($newname)) {
											//Attempt to move the uploaded file to it's new place
											if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {
												//successful upload
												// echo "It's done! The file has been saved as: ".$newname;
												$qry2 = "INSERT INTO tbl_files (location,fdateIn,description,fname,teacher_id,subject_id) VALUES ('$newname','$Today','$filedesc','$fname','$session_id','$get_id')";
												//echo $qry2;
												echo "<script>alert('Uploaded Successfully')</script>";
												//$result = @mysql_query($qry);
												$result2 = $connector->query($qry2);
												//header("location: teacher_class.php");
												if ($result2) {
													$errmsg_arr[] = 'record was saved in the database and the file was uploaded';
													$errflag = true;
													if ($errflag) {
														$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
														session_write_close();
														?>

														<?php
												}
												}



												 else {
													$errmsg_arr[] = 'record was not saved in the database but file was uploaded';
													$errflag = true;
													if ($errflag) {
														$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
														session_write_close();
														header("location: teacher_class.php");
														exit();
													}
												}
											} else {
												//unsuccessful upload
												//echo "Error: A problem occurred during file upload!";
												$errmsg_arr[] = 'upload of file ' . $filename . ' was unsuccessful';
												$errflag = true;
												if ($errflag) {
													$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
													session_write_close();
													header("location: teacher_class.php");
													exit();
												}
											}
										} else {
											//existing upload
											// echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
											$errmsg_arr[] = 'Error: File >>' . $_FILES["uploaded_file"]["name"] . '<< already exists';
											$errflag = true;
											if ($errflag) {
												$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
												session_write_close();
												header("location: teacher_class.php");
												exit();
											}
										}
									} else {
										//wrong file upload
										//echo "Error: Only .jpg images under 350Kb are accepted for upload";
										$errmsg_arr[] = 'Error: All file types except .exe file under 5 Mb are not accepted for upload';
										$errflag = true;
										if ($errflag) {
											$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
											session_write_close();
											header("location: teacher_class.php");
											exit();
										}
									}
								} else {
									//no file to upload
									//echo "Error: No file uploaded";

									$errmsg_arr[] = 'Error: No file uploaded';
									$errflag = true;
									if ($errflag) {
										$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
										session_write_close();
										header("location: teacher_class.php");
										exit();
									}

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
