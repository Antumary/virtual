<?php include('header.php'); ?>
<?php //include('session.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="admin/js/jquery-1.4.1.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("select#course").attr("disabled","disabled");
            $("select#department").change(function(){
            $("select#course").attr("disabled","disabled");
            $("select#course").html("<option>wait...</option>");
            var id = $("select#department option:selected").attr('value');
			//var id=$("#category").val();
            $.post("admin/select_course.php", {id:id}, function(data){
                $("select#course").removeAttr("disabled");
                $("select#course").html(data);
            });
        });
        
    });
	</script>
</head>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navhead.php'); ?>

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
                        <li class="active"><a href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="add_student.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Student Registration
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a>                
                        </li>
						
                        <li class="nav-header">About US</li>
                        <li><a  href="#mission" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Mission
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#vision" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Contact Us
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#benefits" rol="button" data-toggle="modal"><i class="icon-list-alt icon-large"></i>&nbsp;Benefits
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
						<li><a href="#coursesofferd" rol="button" data-toggle="modal"><i class="icon-list-alt icon-large"></i>&nbsp;Courses Offered
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                    </ul>
                </div>
				</div>
                <div class="container">
        			<div class="row-fluid">
						<div class="span9">
							<div class="hero-unit-3">
							<form class="form-horizontal" method="POST" enctype="multipart/form-data" style="">
							<div class="thumbnail">
							<div align="right"><a style="color:#FF0000" href="forgotpwd.php" >Forgot Password</a>&nbsp;||&nbsp;<a style="color:#FF0000" href="add_student.php">New User</a></div>
										 <div class="alert alert-info">
                                    		<button type="button" class="close" data-dismiss="alert"></button>
                                   			 <strong><i class="icon-user icon-large"></i>&nbsp;New Student Registration</strong>
                                		</div>
										<table>
										<tr>
                                        <div class="control-group">
                                            <label class="control-label" for="inputname">Full Name:</label>
                                            <div class="controls">
                                                <input type='text' size="30" maxlength="30" name='fnm' required>
                                            </div>
                                        </div>
										</tr>
										<tr>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Username:</label>
                                            <div class="controls">
                                                <input type='text' size="30" maxlength="30" name='unm' required>
                                            </div>
                                        </div>
										</tr>
										<tr>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Password:</label>
                                            <div class="controls">
                                               <input type='password' name='pwd' size="30" required>
                                            </div>
                                        </div>
										</tr>
										<tr>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword">Confirm Password:</label>
                                            <div class="controls">
                                                <input type='password' name='cpwd' size="30" required>
                                            </div>
                                        </div>
										</tr>
										<tr>
										<div class="control-group">
                                            <label class="control-label" for="inputPassword">Gender:</label>
                                            <div class="controls">
                                                <input type="radio"  value="Male" name="gender" id='m' checked="checked"><label> Male</label>
												<input type="radio" value="Female" name="gender" id='f'><label>Female</label></td>
                                          </div>
										 </div>
										  </tr>
										  <tr>
										<div class="control-group">
                                            <label class="control-label" for="inputPassword">Email Address:</label>
                                            <div class="controls">
                                               <input type='email' name='mail' size="30" required>
                                            </div>
                                        </div>
										</tr>
										<tr>
										 <div class="control-group">
                                            <label class="control-label" for="inputPassword">Contact Number:</label>
                                            <div class="controls">
                                                <input type='text' name='contact' size="10" required pattern="[789][0-9]{9}">
                                            </div>
                                        </div>
										</tr>
										<tr>
										 <div class="control-group">
                                            <label class="control-label" for="inputPassword">Select city:</label>
                                            <div class="controls">
                                               <select style="width: 220px;" name="city" >
														
<option> choose..</option>															<option>Ernakulam</option>
															<option>Thrissur</option>
															<option>Kottayam</option>
															<option>Palakkad</option>
															<option>Kannur</option>
															<option>Malapuram</option>
															<option>Thiruvananthapuram</option>
															<option>Wayanad</option>
															<option>Kasargod
															<option>Kozhikode
															<option>Kollam
															<option>Alapuzha
															<option>Pathanamthitta
															
														
													</select>
                                            </div>
                                        </div>
                                        </div>
										</tr>
										<tr>
										<!--</div>-->
										 <div class="control-group">
                                            <label class="control-label" for="inputPassword">Image:</label>
                                            <div class="controls">
                                                <input style="width: 220px" type="file" name="file" required>
                                            </div>
                                        </div>
										</tr>
									<!--	</div>-->
									<tr>
										 <div class="control-group">
                                            <label class="control-label" for="inputPassword">Department:</label>
                                            <div class="controls">
                                                <?php include "admin/select.class.php"; ?>
            												<select style="width: 220px" id="department" name="department" required>
                										<?php echo $opt->ShowDepartment(); ?>
            										</select>
													
                                            </div>
                                        </div>
									</tr>
									<tr>
										<!--</div>-->
										 <div class="control-group">
                                            <label class="control-label" for="inputPassword">Course:</label>
                                            <div class="controls">
                                                <select style="width: 220px" id="course" name="course" required>
             									<option value="0">choose...</option>
        										</select>
                                            </div>
                                        </div>
									</tr>
                                        <div class="control-group">
                                            <div class="controls">

                                                <button type="submit" name="submit" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Register Student</button>
                                            </div>
                                        <!--</div>-->
										</div>
										</table>
										</div>
										
                                    </form>
							
						  	
<?php
							
if(isset($_POST['submit']))
{
			$fnm=$_POST['fnm'];
			//$cid=$_POST['sid'];
			$unm=$_POST['unm'];
			$pwd=$_POST['pwd'];
			$gender=$_POST['gender'];
			$email=$_POST['mail'];
			$contact=$_POST['contact'];
			$city=$_POST['city'];
			$did = $_POST['department'];
            $cid = $_POST['course'];
			$cpwd=$_POST['cpwd'];
    	   $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
           $image_name = addslashes($_FILES['file']['name']);
           $image_size = getimagesize($_FILES['file']['tmp_name']);
           move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
           $location = "uploads/" . $_FILES["file"]["name"];
		   if(empty($_POST['fnm']))
		   {
		   		echo "</br>Please enter fullname";
		   }
		   else if(!preg_match("/^[a-zA-Z ]*$/",$fnm))
		   {
					echo "</br>Invalid name format ".$fnm;
			}
			else if(empty($_POST['unm']))
			{
				echo "</br>Please enter username";	
			}
		  	else if(empty($_POST['pwd']))
			{
				echo "</br>Please enter password";
				
			}
			else if(empty($_POST['cpwd']))
			{
				echo "</br>Please confirm password";
			}
			else if($cpwd!=$pwd)
			{
				echo "<script>alert('Password confirmation is failed...Try Again')</script>";
			}
			else if(empty($_POST['mail']))
			{
				echo "</br>Please enter email ID";
			}
			
			else
			{
			
				$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			

				mysql_select_db("etutor",$link) or die("Can't Connect to Database...");	
				$selQry=mysql_query("select username from tbl_student where username='$unm'");
				if($stu=mysql_fetch_array($selQry) != 0)
				{
					echo "<script>alert('Username already exist...')</script>";
				}
				else
				{
				$query="insert into tbl_student(fullname,dept_id,course_id,username,password,gender,email,contactno,city,image,due,status)
			values('$fnm','$did','$cid','$unm','$pwd','$gender','$email','$contact','$city','$location','yes','0')";
			
				if(!mysql_query($query,$link))
				{
					echo "<script>alert ('".mysql_error($link)."')</script>";
					echo mysql_error($link);
				}
				else
				{
					echo "<script> alert('Your application successfully submitted...')</script>";
					header("location:index.php?ok=1");
				//echo "Your application successfully submitted...";
				}
				}
			}
			
		}
	
?>
	            			</div>	
											
						</div>
					</div>				
				</div>
			</div>
</body>
</html>

<?php include('footer.php'); ?>
