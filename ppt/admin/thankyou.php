<?php include('header.php'); ?>
<?php //include('session.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navhead.php'); ?>

            <div class="container">
			

                <!--<div class="row-fluid">-->

                    <div class="span17">

                        <div class="hero-unit-3">
						
							<form class="form-horizontal" method="POST" enctype="multipart/form-data" style="">
								<div class="thumbnail">
									<div align="right"><a style="color:#FF0000" href="forgotpwd.php" >Forgot Password</a>||<a style="color:#FF0000" href="add_student.php">New User</a></div>
										 <div class="alert alert-info">
                                    		<button type="button" class="close" data-dismiss="alert">&times;</button>
                                   			 <strong><i class="icon-user icon-large"></i> &nbsp;Reset Password</strong>
                                		</div>
										<table>
										<tr>
										<div class="control-group">
                                            <label class="control-label" for="inputname">Enter E-mail ID:</label>
                                            <div class="controls">
                                                <input type='text' size="30" maxlength="30" name="txtemail">
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
    									mail($to,$subject,$message,$headers);
    									//mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    									echo "Mail Sent. Check your mail Thank you.... ";
    									// You can also use header('Location: thank_you.php'); to redirect to another page.
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

