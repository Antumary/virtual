<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php  $get_id=$_GET['id']; echo $get_id; ?>
<?php
$course_query=mysql_query("select * from tbl_course where course_id='$get_id'")or die(mysql_error());
$rows=mysql_fetch_array($course_query);
//echo "HIiiiiiiii";

?>
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
                                <a href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course</a>
                                <a href="course.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course Entry</div>

                                        <form class="form-horizontal" method="POST">
										<div class="control-group">
                                                <label class="control-label" for="inputDepartment">Department:</label>
                                                <div class="controls">
            
                                                    <select name="cd" required>
														<?php 
														$did=$rows['dept_id'];
                                                        $q=mysql_query("select * from tbl_department where dept_id ='$did'");
                                                        while($r=mysql_fetch_array($q)){
                                                            ?>
                                                        <?php echo '<option value="'.$r["dept_id"].'">'.$r["dept_name"].'</option>'; }?>
                                                        
                                                        <?php 
                                                        $query=mysql_query("select * from tbl_department where dept_id !='$did'");
                                                        while($row=mysql_fetch_array($query)){
                                                            ?>
                                                        <?php echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>'; }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputCourse">Course ID:</label>
                                                <div class="controls">
                                                    <input type="text" name="cid" id="inputId" placeholder="XXX-XX" value="<?php echo $rows['course_id']; ?>" required>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Course Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="ct" id="inputTitle" placeholder="Course Title" value="<?php echo $rows['course_title']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputMajor">Major:</label>
                                                <div class="controls">
                                                    <input type="text" name="major" id="inputMajor" placeholder="Major" value="<?php echo $rows['major']; ?>">
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Fee structure:</label>
                                                <div class="controls">
                                                    <input type="text" name="fs" id="inputFee" placeholder="Fee structure" value="<?php echo $rows['fee_structure']; ?>" required>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Course Duration:</label>
                                                <div class="controls">
                                                    <input type="text" name="cduration" id="inputDuration" placeholder="Course Duration" value="<?php echo $rows['course_duration']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $cid = $_POST['cid'];
											$ct=$_POST['ct'];
                                            $cd = $_POST['cd'];
                                            $major = $_POST['major'];
											$fs=$_POST['fs'];
											$cdur=$_POST['cduration'];
											



                                            mysql_query("update tbl_course set course_id='$cid',course_title='$ct',dept_id='$cd',major='$major',fee_structure='$fs',course_duration='$cdur' where course_id='$get_id'")  or die(mysql_error());
                                            header('location:course.php');
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


