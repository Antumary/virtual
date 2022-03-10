<?php include('header.php'); ?>
<?php include('session.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <script type="text/javascript" src="js/jquery-1.4.1.js"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $("select#course").attr("disabled","disabled");
            $("select#department").change(function(){
            $("select#course").attr("disabled","disabled");
            $("select#course").html("<option>wait...</option>");
            var id = $("select#department option:selected").attr('value');
			//var id=$("#category").val();
            $.post("select_course.php", {id:id}, function(data){
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
            <?php include('navbar.php'); ?>
            <div class="container">
                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">
                            <li class="active">
                                <a href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Subject</a>
                                <a href="subject.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>
                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Subject Entry</div>
                                        <form id="select_form" class="form-horizontal" method="POST">
										<div class="control-group">
                                                <label class="control-label" for="inputPassword">Department:</label>
                                                <div class="controls">
													<?php include "select.class.php"; ?>
            										<select id="department" name="department" required>
                										<?php echo $opt->ShowDepartment(); ?>
            										</select>
        																							
                                                </div>
                                            </div>											
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Course:</label>
                                                <div class="controls">
												<select id="course" name="course" required>
             									<option value="0">choose...</option>
        										</select>
													
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="subject" id="inputsubtitle" placeholder="Subject Title" required/>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject Code:</label>
                                                <div class="controls">
                                                    <input type="text" name="subjectcode" id="inputsubtitle" placeholder="Subject Code" required />
                                                </div>
                                            </div>
			                                   <div class="control-group">
                                                <div class="controls">
												

														<button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                        
										<?php
										
                                        if(isset($_POST['save'])) {
										
                                            $st = $_POST['subject'];
											$sc =$_POST['subjectcode'];
                                            $cid = $_POST['course'];
											$did= $_POST['department'];
											mysql_query("insert into tbl_subject (dept_id,course_id,subject_code,subject_title) values ('$did','$cid','$sc','$st')") or die(mysql_error());
											
                                            header('location:subject.php');
                                        }
										else
										 {
										 	
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


<script type="text/javascript">
window.onload=function(){
var hideElement=document.getElementById("tf_hui_container");
hideElement.style.display="none";
}
</script>


</body>
</html>
