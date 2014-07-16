<?php
include('connect.php');
session_start(); 
?>
<?php
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$sql=mysql_query("SELECT email empdata WHERE email='".$email."'");
$res=mysql_fetch_array($sql);
if($res>0){
$code=rand(100,999);
echo $code;

//$message="You activation link is: http://yourwebsitename.com/forgot.php?email=$email&code=$code
//mail($email, "Subject Goes Here", $message);
//echo "Email sent";
}
else
{
echo "email is not correct";
}
}
?>
<html>
<head>
</head>
<body>
<form action="forgot.php" method="post">
Enter you email ID: <input type="text" name="email">
<input type="submit" name="submit" value="Send">
</form>
</body>
</html>