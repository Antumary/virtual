<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php  $get_id=$_GET['id']; echo $get_id; ?>
<?php
$dept_query=mysql_query("select * from tbl_department where dept_id='$get_id'")or die(mysql_error());
$rows=mysql_fetch_array($dept_query);
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
                                <a href="add_department.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Department</a>
                                <a href="department.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Department Entry</div>

                                        <form class="form-horizontal" method="POST">

                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Department:</label>
                                                <div class="controls">
                                                    <input type="text" name="d" id="inputPassword" placeholder="Department" value="<?php echo $rows['dept_name']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Person In Charge:</label>
                                                <div class="controls">
                                                    <input type="text" name="p" id="inputPassword" placeholder="Person In Charge" value="<?php echo $rows['inCharge']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Title:</label>
                                                <div class="controls">
                                                    <input type="text" name="t" id="inputPassword" placeholder="Title" value="<?php echo $rows['title']; ?>" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Department</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $d = $_POST['d'];
                                            $p = $_POST['p'];
                                            $t = $_POST['t'];



                                            mysql_query("update tbl_department set inCharge='$p',title='$t', dept_name='$d' where dept_id='$get_id'") or die(mysql_error());
                                            header('location:department.php');
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


