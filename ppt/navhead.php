<div class="row-fluid">
    <div class="span12">


        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">

                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <!-- Be sure to leave the brand out there if you want it shown -->


                    <!-- Everything you want hidden at 940px or less, place within here -->
					<div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
                       <a href="//www.facebook.com"><i class="icon-facebook-sign icon-large" id="color_white"></i></a>
                        <a href="//www.twitter.com"><i class="icon-twitter icon-large" id="color_white"></i></a>
                        <a href="//www.googleplus.com"><i class="icon-google-plus icon-large" id="color_white"></i></a>
                        <i class="icon-github-alt icon-large" id="color_white"></i>
                        <a href="//www.linkedin.com"><i class="icon-linkedin-sign icon-large" id="color_white"></i></a>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						<i  id="chat-button"><i aria-hidden="true"><img src ="./img/chat.png"></i>		<!--class="fa fa-3x fa-comments"--> 

                        <!-- end collapse -->
                    </div>
					<!-- chatbot strats-->
				
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">			
		<link rel="stylesheet" href="chatcss/chatstyle.css">

		<div id="chat-box">
			<div id="chat-head">Dia<i id="cancel" class="fa fa-times"></i></div>
			<div id="converse"></div>
			<div id="controls">
				<textarea id="textbox" class="controls-elements" placeholder="Say something.."></textarea>
				<button id="send" class="controls-elements"><i id="send-icon" class="fa fa-paper-plane"></i></button>
			</div>
		</div>
		
		<script src="chatjs/chatindex.js"></script>
<!--chatnot ends-->

                        <!-- end collapse -->
                    </div>

                </div>
            </div>
        </div>
        <div class="hero-unit-header">
            <div class="container">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span6">
                               <img src="admin/images/head1.png">
                            </div>
                            <div class="span6">
                                <div class="pull-right">
                                    <!--- login button -->
									<br>
									<br>
                                    <div class="btn-group">
                                        <button class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Login</button>
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#student" role="button"  data-toggle="modal"><i class="icon-user icon-large"></i>&nbsp;Student</a></li>
                                            <li><a href="#teacher" role="button"  data-toggle="modal"><i class="icon-user-md icon-large"></i>&nbsp;Teacher</a></li>
											<li><a href="admin/index.php" role="button"  data-toggle="modal"><i class="icon-user-md icon-large"></i>&nbsp;Admin</a></li>


                                        </ul>
                                    </div>

                                    <!-- end login -->
                                    <?php include('student_modal.php'); ?>
                                    <?php include('teacher_modal.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
