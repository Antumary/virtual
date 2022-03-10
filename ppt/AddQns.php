<?php
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from tbl_teacher where teacher_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <script type="text/javascript" src="admin/js/jquery-1.4.1.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#course").change(function(){
            $("select#subject").attr("disabled","disabled");
            $("select#subject").html("<option>wait...</option>");
            var id = $("select#course option:selected").attr('value');
			//var id=$("#category").val();
            $.post("select_qns_subject.php", {id:id}, function(data){
                $("select#subject").removeAttr("disabled");
                $("select#subject").html(data);
            });
        });
        
    });
    </script>
    </head>
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
                        <!--<li>
                            <a href="teacher_class.php"><i class="icon-group icon-large"></i>&nbsp;Class
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>-->
                        <li><a href="teacher_subject.php"><i class="icon-file-alt icon-large"></i>&nbsp;Subjects
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
						<li><a href="AddQns.php"><i class="icon-file-alt icon-large"></i>&nbsp;Question
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>

                    </ul>
                </div>

            </div>
            <div class="span9">
                <div class="hero-unit-3">
				<form class="form-horizontal" method="post">
                    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;Add Question</strong>
                        </div>
						
						<tr>
							<td><div>Enter Question Paper code</div></td>
							<td><div><input type="text" name="txtQpc" placeholder="Question Paper code" required/></div><?php echo "<br>";?></td></tr>
							<tr>
							<td><div>Choose course</div></td>
							<td><div>
								<?php include "admin/select.class.php"; ?>
            										<select id="course" name="course" required>
                										<?php echo $opt->ShowQnsCourse($user_row['dept_id']); ?>
            										</select>
							</div></td></tr>
							<tr>
							<td><div> Choose Subject</div></td>
							<td><div>
								<select id="subject" name="subject" required>
             									<option value="0">choose...</option>
        										</select>
							</div></td></tr>
							<tr>
							<td><div>Enter Question</div></td>
							<td><div><input type="text" name="txtQst" placeholder="Enter Question"  required/></div></td></tr>
							<tr>
							<td><div>Enter Options</div></td>
							<td><div><input type="text" name="txtOpt1" placeholder="First Option" required/></div>
							<div><input type="text" name="txtOpt2" placeholder="Second Option" required /></div>
							<div><input type="text" name="txtOpt3" placeholder="Third Option" required /></div>
							<div><input type="text" name="txtOpt4" placeholder="Last Option" required /></div></td></tr>
							<tr>
							<td><div>Enter Answer</div></td>
							<td><div><input type="text" name="txtAns" placeholder="Answer" required/></div></td></tr>
							<tr>
							<td><div></div></td>
							<td><div><input type="submit" name="btnAdd"  id="btnAdd" value="Upload Question" class="btn btn-success"></div></td></tr>
							</table>
<?php
if (isset($_POST['btnAdd']))
{
	$qpc=$_POST['txtQpc'];
	$cid=$_POST['course'] ;
	$sid=$_POST['subject'];
	$qn=$_POST['txtQst'];
	$op1=$_POST['txtOpt1'];
	$op2=$_POST['txtOpt2'];
	$op3=$_POST['txtOpt3'];
	$op4=$_POST['txtOpt4'];
	$ans=$_POST['txtAns'];
	$insQry="insert into tbl_questions(qn_paper_code,course_id,teacher_id,subject_id,question,option1,option2,option3,option4,correct_ans)
	values('$qpc','$cid','$session_id','$sid','$qn','$op1','$op2','$op3','$op4','$ans')";
	if(mysql_query($insQry))
	{
		echo "Successfully inserted";
	}
}
?>	
</form>
</div>
			
                    
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>

</body>
</html>


