<!doctype html>
<html>
<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<body>
 <?php include('navhead.php'); ?>

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
                        <li class="active"><a href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
                             <li class="nav-header">About US</li>
                        <li><a  href="#mission" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Mission
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
                        <li><a href="#vision" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Contact Us
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
                        <li><a href="#benefits" rol="button" data-toggle="modal"><i class="icon-list-alt icon-large"></i>&nbsp;Benefits
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>
                            </a></li>
                            </div>
                            <br>
                            </div>
                             <div class="span9">
                <section class="main">
                    <div class="custom-calendar-wrap">
                        <div id="custom-inner" class="custom-inner">
                            <div class="custom-header clearfix">
                                <nav>
                                    <span id="custom-prev" class="custom-prev"></span>
                                    <span id="custom-next" class="custom-next"></span>
                                </nav>
                                <h2 id="custom-month" class="custom-month"></h2>
                                <h3 id="custom-year" class="custom-year"></h3>
                            </div>
                            <div id="calendar" class="fc-calendar-container"></div>
                        </div>
                    </div>
                </section>



                    <div class="span12">
                        <div class="hero-unit-3">
                    <center>
                      <h1><font color="#0033FF" >Who are we?</font></h1></center>


                    <p>Education in today's world is drifting towards generalization. Over the decades, classroom teaching has taken such a precedence that most of the pedagogy and teaching is done in a 'One Size Fits All' manner. We believe it is not effective and should change.</p>
                    <br>
                    <p>Vedantu is conceptualized to bring Personalization back into Education. We imagine a world where a student will be at the center of learning again. Where a teacher will teach according to the need, pace and level of a student. Where learning graduates from <b>One-to-Many</b> to <b>1-to-1</b>.</p>
                    <br>
                    <p>For personalization to happen, technology will definitely help. But more importantly there has to be a system free of institutions where learning is bound within four walls. We imagine a world free of such middle layers, where a student is directly connected to a teacher and learning-teaching happens in a personalized way. Imagine a world with Knowledge Democracy.</p>
                    <br>
                    <p>Hence with this vision, we have defined our purpose of existence. Vedantu aims to create a world of learning which is <b>Personalized</b> & <b>Democratized</b></p>
                    <br>

                   </center>
                    <br>
                    <br>
                    <p> <b>'Vedantu'</b> bears a testimony to our purpose.
Veda = <b>'Knowledge'</b> and Tantu= <b>'Network'</b>.
<br></p>
<p>A knowledge network where any student can tap into a teacher directly and learning can happen in a personalized way, anytime-anywhere.
<br></p>
<br>

<div>
<div class="col-md-6 profile-middle">
				<div class="profile-img">
					



					</div>
                    </div>
                    <br>
              

                    <br>
                    <br>
               
<center><h4>Join the team:</h4></center>
<center>Contact Us on : <a href=
"gmail.com">anittageorge020.com</a></center>
				</div>
			</div>

</div>
</div>
</div>

				</div>
			</div>
 <?php include('footer.php'); ?>
</body>
</html>
