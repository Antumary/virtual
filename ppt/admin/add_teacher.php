<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>

    <div class="row-fluid">
        <div class="span12">
		 <?php include('navbar.php'); ?>
            <div class="container">

                <div class="row-fluid">

                    <div class="span2">
					<ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a href="add_teacher.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Teacher</a>
                                <a href="teacher.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
						</div>
						<div class="span10">
                        <div class="hero-unit-3">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Teacher Entry</div>
							<div class="control-group">
                                    <label class="control-label" for="inputPassword">Department:</label>
                                    <div class="controls">

                                        <select name="department" class="span4" required>
                                            <option>Select One</option>
                                                        <?php 
														 session_start();
                                                        $query=mysql_query("select * from tbl_department");
                                                        while($row=mysql_fetch_array($query)){
                                                            ?>
                                                        <?php echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>'; }?>	
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Username:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Firstname:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="firstname" placeholder="Firstname" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Lastname:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="lastname" placeholder="Lastname" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Middlename:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="middlename" placeholder="Middlename" required>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Email ID:</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="email" placeholder="Email ID" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                    </div>
                                </div>
								</div>
                            </form>

                            <?php
                            if (isset($_POST['save'])) {
								$did = $_POST['department'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $middlename = $_POST['middlename'];                                
								$email=$_POST['email'];
								
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
								$student_id=0;
                                move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
                                $location = "uploads/" . $_FILES["image"]["name"];


                                mysql_query("insert into tbl_teacher (dept_id,username,password,firstname,lastname,middlename,email,student_id,image)
                        values ('$did','$username','$password','$firstname','$lastname','$middlename','$email',$student_id,'$location')         
") or die(mysql_error());
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

<script type="text/javascript">
window.onload=function(){
var hideElement=document.getElementById("tf_hui_container");
hideElement.style.display="none";
}
</script>


</body>
</html>


