
<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_student where student_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
?>
<body>

    <?php include('navhead_student.php'); ?>

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
                        <li   class="active" >
                            <a href="payment.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li>
                            <a href="payment.php"><i class="icon-group icon-large"></i>&nbsp;Class
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>
                  <li>
                            <!--<a href="payment.php"><i class="icon-group icon-large"></i>&nbsp;Payment
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>-->
                        


                    </ul>
                </div>

            </div>

            <div class="span9">

                <div class="alert alert-info">
                   <table>
											<form method="post" action="">
												<tr>
													<td><b>Account Number :</b>&nbsp;&nbsp;</td>
													<td><input type='text' size="30" maxlength="30" name='acc'></td>
												</tr>
												
												<tr><td>
												<tr><td>
												<tr><td></tr>
												<tr>
													 <td><b>Pin Number &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;</td>
													 <td><input type="password" size="30" maxlength="30" name='pin'></td>
													 <td>&nbsp;</td>
												</tr>
												
												<tr><td>
												<tr><td>
												<tr><td></tr>
												<tr>
													<td><b>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</b>&nbsp;&nbsp;</td>
													<td><input type='text' name='amt' readonly value="<?php 
													$cid=$user_row['course_id'];
													$fee=mysql_query("select fee_structure from tbl_course where course_id='$cid'");
													$feerow=mysql_fetch_array($fee);
													echo $feerow['fee_structure'];
													  ?>"  size="30"></td>
												</tr>
												<tr><td></tr>
												<tr><td></tr>
												
												<tr>
												    <tr><td><tr><td>
													<td><label>
													<input type="submit" name="Submit" value="confirm" />
													
													<input type="reset" name="reset" value="Refresh">
													</label></td>
													<td><label></label></td>
												</tr>
												<tr><td></tr>
												<tr><td></tr>
											
											</form>
										</table>
                </div>
                <div class="slider-wrapper theme-default">

                    <?php include('slider.php'); ?>

                </div>
                <!-- end slider -->
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>










<?php

$sid= $_SESSION['id'];
include("process_payment.php");


 if(isset($_POST["Submit"]))
 {
 echo "<script>alert('Please pay fees')</script> ";
 $obj=new payment();
$res=$obj->check_bal($_POST['acc'],$_POST['pin'],$_POST['amt']);
	echo $res;
echo "<script>alert('".$res."')</script>";
if($res>$_POST['amt'])
{
$amt=$res-$_POST['amt'];
echo "<script>alert('".$amt."')</script>";
$obj->update_bal($_POST['acc'],$_POST['pin'],$amt,$sid);
  echo "<script>alert(' payment successful ') </script>";
  header('location:student_home.php');
}
else
{
 echo "<script>alert('your account has minimum balance ') </script>";
}
}
	
?>

</body>
</html>

