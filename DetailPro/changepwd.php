<?php
session_start();

if(!isset($_SESSION['id'])){
header('locatuon:login.php');
}
include('connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Undeviating 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta content="text/html;charset=utf-8" http-equiv="Content-Type">

<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
 $("form").submit(function(){
	     $(".error").hide();
	    
		
		var pass=$('#pass').val();
		var cpass=$('#cpass').val();
	   
	
	    if(pass==""){
			 $("#pass").after('<span class="error" style="color:red ">Please enter your password.</span>');
		        hasError = true;
		//alert('please enter password');
		 $('#pass').focus();
		return false;
		}
		
		else if(cpass==""){
			 $("#cpass").after('<span class="error" style="color:red ">Please enter your cpassword.</span>');
		        hasError = true;
			//alert('please enter conform password');
			 $('#cpass').focus();
			return false;
			}
		else if(pass!=cpass){
			 $("#cpass").after('<span class="error" style="color:red ">password & conform password does not match.</span>');
		        hasError = true;
			//alert("password & conform password does not match");
			 $('#cpass').focus();
               $(".error").show();
			}
		return true;
	});
	});
</script>
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->


</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">Undeviating</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li ><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li class="active"><a href="#" accesskey="2" title="">Sign Up</a></li>
				<li><a href="login.php" accesskey="3" title="">login</a></li>
				
				<li><a href="#" accesskey="5" title="">Contact Us</a></li>
				<?php 
				if($id){?>
				<li><a href="logout.php" accesskey="5" title="">Logout</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
 
<div id="footer">
<div id="Sign-Up">

<?php @$error=$_GET['err'];
if(isset($error)){ echo $error;}?>




 <fieldset style="width:30%;margin-left:32%;">

 <table border="0">
 <form method="POST" name="reg" action="cpwdinsert.php" onsubmit=""  enctype="">
 <tr><td><label>CurrentPWD</label></td> 
 <td><input type="password" name="pwd" id="pwd" class="form-control"></td> </tr><input type="hidden" name="id" id="pwd" value="<?php echo $_SESSION['id'];?>" class="form-control"> 
  <tr><td><label>PassWord</label></td> 
 <td><input type="password" name="pass" id="pass" class="form-control"></td> </tr> 
  <tr><td><label>CPassWord</label></td>  
<td><input type="password" name="cpass" id="cpass" class="form-control"></td> </tr> 

 <tr><td></td> <td><input id="button" type="submit" name="submit" value="OK" class="btn btn-info"></td> </tr> 
 
 
 </form> 
 </table> 
 </fieldset> 
 </div> 
	<div class="container">
		
	</div>
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
	<ul class="contact">
		<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
		<li><a href="#" class="icon icon-facebook"><span></span></a></li>
		<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
		<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
		<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
	</ul>
</div>
</body>
</html>

