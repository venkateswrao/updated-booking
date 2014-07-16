<?php
session_start();

if(!isset($_SESSION['id'])){
header('locatuon:login.php');
}
include('connect.php');
?>
<?php

if(isset($_POST['submit']))
{
 $id=$_POST['id'];
 $pass=base64_encode($_POST['pwd']);

$sql=mysql_query("SELECT * FROM empdata WHERE pass='$pass' AND id='$id'");
$row = mysql_num_rows($sql);

if($row){
echo "exist";
$cpass=base64_encode($_POST['pass']);
$sql=mysql_query("UPDATE empdata SET pass='$cpass' where id='$id'");
$sucess = 'password sucessfully changed';
 header('location:display.php?error='.$sucess);

}else
{
$msg = 'current password not correct';
 header('location:changepwd.php?err='.$msg);
}

}
?>