<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php  $get_id=$_GET['id']; echo $get_id; ?>
<?php
$teacher_query=mysql_query("select * from tbl_teacher where teacher_id='$get_id'")or die(mysql_error());
$rows=mysql_fetch_array($teacher_query);
//echo "HIiiiiiiii";

?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">

                    <div class="span12">
                        <div class="hero-unit-3">
                            <a href="teacher.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            <br>
                            <br>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">

                                        <select name="department" class="span4" required>
                                            
											 <?php
											 $did=$rows['dept_id'];	
                                            $q = mysql_query("select * from tbl_department where dept_id='$did'");
											
                                            while ($ro = mysql_fetch_array($q)) {
                                                ?>
                                                 <?php echo '<option value="'.$ro["dept_id"].'">'.$ro["dept_name"].'</option>'; }?>
											 
                                            <?php
                                            $query = mysql_query("select * from tbl_department where dept_id!='$did'");
											
                                            while ($r = mysql_fetch_array($query)) {
                                                ?>
                                                 <?php echo '<option value="'.$r["dept_id"].'">'.$r["dept_name"].'</option>'; }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="username" value="<?php echo $rows['username']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" value="<?php echo $rows['password']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Firstname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="firstname" value="<?php echo $rows['firstname']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Lastname</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" value="<?php echo $rows['lastname']; ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middlename</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" value="<?php echo $rows['middlename']; ?>" required>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Email ID:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" value="<?php echo $rows['email']; ?>" required>
                                    </div>
                                </div>
								
								<!--	<div class="control-group">
	<label class="control-label" for="input01">Image:</label>
    <div class="controls">
	<input type="file" name="image" class="font" value="<?php echo $rows['image']; ?>"> 
    </div>
    </div>-->

                                
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            
							</form>

                            <?php
                            if (isset($_POST['save'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $middlename = $_POST['middlename'];
                                $department = $_POST['department'];
								//$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
//								$image_name= addslashes($_FILES['image']['name']);
//								$image_size= getimagesize($_FILES['image']['tmp_name']);
//
//								move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
//								$location="uploads/" . $_FILES["image"]["name"];
			
								mysql_query("update tbl_teacher set username='$username',password='$password',firstname='$firstname',lastname='$lastname',middlename='$middlename',dept_id='$department' where teacher_id='$get_id'")or die(mysql_error());

                                header('location:teacher.php');
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>





</body>
</html>


