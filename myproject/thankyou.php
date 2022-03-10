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
										<tr><div align="center" style="size:50" style="color:#FF0000">Password recovery mail send to your account</div></tr>
										
										<tr><div align="center" style="size:20" style="color:#FF0000">Check your email..</div></tr>
										</table>
									</div>
										
                                    </form>
									
							
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('footer.php'); ?>

