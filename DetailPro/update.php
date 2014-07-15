<?php
include ('connect.php');
$id=$_GET['$id1'];
if (isset ( $_POST ['submit'] )) {
	$query="update empdata set status=1 where id='$id1'";
	$result = mysql_query($query);
}
