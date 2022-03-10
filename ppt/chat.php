<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="chat css/style.css" />
</head>

<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox"></div>


    <form name="message" >
        <input name="usermsg" type="text" id="usermsg" size="63" />

        <input type="hidden" id="sid" value="1"/>
        <input type="hidden" id="tid" value="1"/>
  <button name="submitmsg" type="button"  id="submitmsg"  >Send</button>
    </form>
</div>

</body>
</html>
<script>

$('#submitmsg').click(function(){
  var userMsg=$('#usermsg').val();

  var sid=$('#sid').val();
  var tid=$('#tid').val();

 $.ajax({
   url:'insertconn.php',
   method:'post',
   dataType:'application/json',
   data:{
     usermsg:userMsg,
     Sid:sid,
     Tid:tid
   },
   success:function(res){
     alert(res);
   },
   error:function(err){
     console.log(err);
   }
 });
});
</script>
