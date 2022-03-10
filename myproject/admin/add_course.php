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
                                                        <option></option>
                                                        <?php 
                                                        $query=mysql_query("select * from tbl_department");
                                                        while($row=mysql_fetch_array($query)){
                                                            ?>
                                                        <?php echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>'; }?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputCourse">Course ID:</label>
                                                <div class="controls">
                                                    <input type="text" name="cid" id="inputId" placeholder="XXX-XX" required>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Course Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="ct" id="inputTitle" placeholder="Course Title" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputMajor">Major:</label>
                                                <div class="controls">
                                                    <input type="text" name="major" id="inputMajor" placeholder="Major">
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Fee structure:</label>
                                                <div class="controls">
                                                    <input type="text" name="fs" id="inputFee" placeholder="Fee structure" required>
                                                </div>
                                            </div>
											<div class="control-group">
                                                <label class="control-label" for="inputCourse">Course Duration:</label>
                                                <div class="controls">
                                                    <input type="text" name="cduration" id="inputDuration" placeholder="Course Duration" required>
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
											



                                            mysql_query("insert into tbl_course (course_id,course_title,dept_id,major,fee_structure,course_duration) values ('$cid','$ct','$cd','$major','$fs','$cdur')") or die(mysql_error());
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


