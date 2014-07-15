<?php
include ('connect.php');
session_start();
if(!isset($_SESSION['id']))
{
	//header("Location: login.php");
}
$id=$_GET['id'];
$name=$_SESSION['user'];
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/JavaScript" src="logintest.js">
</script>

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
			<?php 
				if($id){?>
			
				<li><a href="profile.php" accesskey="5" title="">Profile</a></li>
				
				<li><a href="logout.php" accesskey="5" title="">Logout</a></li>
				<?php }else{?>
				<li ><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li ><a href="register.php" accesskey="2" title="">Sign Up</a></li>
				<li class="active"><a href="login.php" accesskey="3" title="">login</a></li>
				
				<li><a href="#" accesskey="5" title="">Contact Us</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
 
<div id="footer">
<div id="Sign-Up"  style="align:center;">

<?php 

 $result = mysql_query("SELECT * FROM empdata where id='$id'");
 while($row = mysql_fetch_array($result))
 {
 	$name=$row['name'];
 	$email=$row['email'];
 	//$gender=$row['gen'];
 	//$country=$row['country'];
 	//$address=$row['address'];
 }
 ?>
 <fieldset style="width:30%;margin-left:32%;">
 <table border="0">
 <form method="POST" name="reg" action="" onsubmit="return validate();"  enctype="multipart/form-data">
<span class="btn btn-default btn-file">
<td><input type="file" name="pic" id="pic" ></td></tr>
</span>
 <tr><td></td> <td><input id="button" type="submit" name="submit" value="OK" class="btn btn-info"></td> </tr> 
 </form>
 </table> 
</fieldset>
 
 <?php 
if (isset ( $_POST ['submit'] )) {
$pic_name = $_FILES ['pic']['name'];
$pic_size = $_FILES ['pic']['size'];
$pic_type = $_FILES ['pic']['type'];
$pic_path = 'change/'.$pic_name;
$query = "UPDATE empdata SET pic='$pic_path'  WHERE id='$id';";
$send = mysql_query ( $query ) or die ( mysql_error () );

	if (file_exists("change/" . $_FILES["pic"]["name"])) {
		echo $_FILES["pic"]["name"] . " already exists. ";
	} else {
		move_uploaded_file($_FILES["pic"]["tmp_name"],
		"change/" . $_FILES["pic"]["name"]);
		

		header('location:display.php');
	}
}

?>
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






