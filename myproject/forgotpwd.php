<?php include('header.php'); ?>
<?php //include('session.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>

    <div class="row-fluid">
        <div class="span12">

            <!--navhead-->
            <div class="row-fluid">
    <div class="span12">


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
                       <a href="//www.facebook.com"><i class="icon-facebook-sign icon-large" id="color_white"></i></a>
                        <a href="//www.twitter.com"><i class="icon-twitter icon-large" id="color_white"></i></a>
                        <a href="//www.googleplus.com"><i class="icon-google-plus icon-large" id="color_white"></i></a>
                        <i class="icon-github-alt icon-large" id="color_white"></i>
                        <a href="//www.linkedin.com"><i class="icon-linkedin-sign icon-large" id="color_white"></i></a>
                       
                        <!-- end collapse -->
                    </div>


                    
                        <!-- end collapse -->
                    </div>

                </div>
            </div>
        </div>
        <div class="hero-unit-header">
            <div class="container">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span6">
                               <a href="index.php"><img src="admin/images/head1.png" width="500"></a>
                            </div>
                            <div class="span6">
                                <div class="pull-right">
                                    <!--- login button -->							
                                    <div class="btn-group">
                                        <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#student" role="button"  data-toggle="modal"><i class="icon-user icon-large"></i>&nbsp;Student</a></li>
                                            <li><a href="#teacher" role="button"  data-toggle="modal"><i class="icon-user-md icon-large"></i>&nbsp;Teacher</a></li>
											<li><a href="admin/index.php" role="button"  data-toggle="modal"><i class="icon-user-md icon-large"></i>&nbsp;Admin</a></li>
                                    
									 
                                        </ul>
                                    </div>

                                    <!-- end login -->
                                    <?php include('student_modal.php'); ?>
                                    <?php include('teacher_modal.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!--navhead ends-->

            <div class="container">
			

                <!--<div class="row-fluid">-->

                    <div class="span17">

                        <div class="hero-unit-3">
						
							<form class="form-horizontal" method="POST" enctype="multipart/form-data" style="">
								<div class="thumbnail">
									<div align="right"><a style="color:#FF0000" href="forgotpwd.php" >Forgot Password</a>&nbsp;||&nbsp;<a style="color:#FF0000" href="add_student.php">New User</a></div>
										 <div class="alert alert-info">
                                    		<button type="button" class="close" data-dismiss="alert"></button>
                                   			 <strong><i class="icon-user icon-large"></i> &nbsp;Reset Password</strong>
                                		</div>
										<table>
										<tr>
										<div class="control-group">
                                            <label class="control-label" for="inputname">Enter E-mail ID:</label>
                                            <div class="controls">
                                                <input type='text' size="30" maxlength="30" name="txtemail" required>
                                            </div>
                                        </div>
										</tr>
										
											<div align="center" class=""><input type="submit" name="submitEmail" value="Get Password" class="btn btn-info"/></div>
										<tr>
										</tr>
										</table>
									</div>
										
                                    </form>
									<?php 
										if(isset($_POST['submitEmail'])){
											
    									$to = "mubeena003@gmail.com"; // this is your Email address
    									$from = $_POST['txtemail']; // this is the sender's Email address
    									$subject = "Password recovery";
    									//$subject2 = "Copy of your form submission";
    									$message = "Hiiiiiiiiiiiiiii";
    									//$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    									$headers = "From:" . $from;
    									//$headers2 = "From:" . $to;
										ini_set("SMTP","smtp.gmail.com");
 										ini_set("smtp_port","587");
 										ini_set("sendmail_from","mubeena003@gmail.com");
 										ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
										echo"<script>alert('Password reset link has been sent to your mail id')</script>";
    									//if( mail($to,$subject,$message,$headers) )
										//{
    									//mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    										//echo "Mail Sent. Check your mail Thank you.... ";
    									// You can also use header('Location: thank_you.php'); to redirect to another page.
										//}
										//else
										//{
											//echo "Error";
										//}
    									}
										
									?>
							
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('footer.php'); ?>

