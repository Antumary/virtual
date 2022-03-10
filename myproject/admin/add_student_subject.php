<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php include('header.php'); ?>
<?php include('session.php'); ?>
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

                                        <form class="form-horizontal" method="POST">

											
											<div class="control-group">
                                                <label class="control-label" for="inputPassword">Teacher:</label>
                                                <div class="controls">
                                                 
                                                   <select name="teacher" required>
                                                       <?php
                                            $query = mysql_query("select * from teacher ");
                                            while ($row = mysql_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname'].$row['lastname']; ?></option>
                                                <?php
                                            
											}
                                            ?>
                                                    </select>
                                                </div>
                                            </div>
											
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Course:</label>
                                                <div class="controls">
                                                    <!--<input type="text" name="subject" id="inputPassword" placeholder="Subject Code" required>-->
                                                <select name="course" required>
                                                        <?php
                                            $query = mysql_query("select * from course");
                                            while ($row = mysql_fetch_array($query)) {
                                                ?>
                                                <option <?php if(isset($_POST["show"])){ if($_POST['course']== $row['course_id']){ echo "course_id";}}?>><?php echo $row['course_id']; ?></option>
                                                <?php
                                            }
                                            ?></select>
                                                    
												</div>
                                            </div>
											
											<div class="control-group">
                                                <label class="control-label" for="inputPassword">Subject:</label>
                                                <div class="controls">
                                                 
                                                    <select name="subject" required>
                                                        <?php
														$cid=$_POST["course"];
														$qry = "select * from subject";
														echo "<br><br>$qry";
                                            $query = mysql_query($qry);
                                            while ($row = mysql_fetch_array($query)) {
                                                ?>
                                                <option  value="<?php echo $row['subject_id'];?>"><?php echo $row['subject_title']; ?></option>
                                                <?php
                                            }
                                            ?>
                                                    </select>
                                                </div>
                                            </div>
											
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Class:</label>
                                                <div class="controls">
                                                     <select name="class" required>
                                                       <?php
                                            $query = mysql_query("select * from class");
                                            while ($row = mysql_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['course_id']; ?></option>
                                                <?php
                                            
											}
                                            ?>
                                                    </select>
                                                </div>
                                            </div>
											
											 

                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Student:</label>
                                                <div class="controls">
                                                 
                                                   <select name="student" required>
                                                       <?php
                                            $query = mysql_query("select * from student ");
                                            while ($row = mysql_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['student_id']; ?>"><?php echo $row['fullname']; ?></option>
                                                <?php
                                            
											}
                                            ?>
                                                    </select>
											</div>
                                            </div>
											
											 

                                            

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Subject Allotment</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {

											$t = $_POST['teacher'];
                                            $sub = $_POST['subject'];
                                            $c = $_POST['course'];
											 $cl= $_POST['class'];
                                            $s = $_POST['student'];
											
                                            mysql_query("insert into sws (student_id,teacher_id,cys,subject_id,class_id) values ('$s','$t','$c','$sub','cl')") or die(mysql_error());
                                            //header('location:subject.php');
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


