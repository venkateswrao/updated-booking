<?php
include ('connect.php');
session_start();
error_reporting(0);

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
<script type="text/javascript">
function ConfirmDelete()
{
 // var empids1=0;
   //empids1=form['empids'];
   var empids1=document.getElementsByName("empids[]");
  var count=document.getElementById("count").value;
  var flag = 0;
 
  for(var i=0;i<count;i++){
  if(empids1[i]){
          if(empids1[i].checked==false){

	      flag ++;
		}
		}
    }
	
	   if (flag != 1) {
		   alert ("You must check one and only one checkbox!");
		   return false;
		   }
	var x = confirm("Are you sure you want to delete?");
      if (x){
      return true;
  }
  else{
    return false;
  }
		   
  
  
  
}
function ConfirmActive()
{
var x = confirm("Are you sure you want to activate?");
  if (x)
      return true;
  else
    return false;
}


</script>
<style type="text/css">
    .Table
    {
    
    display:table;
    width:90%;
    border-collapse: collapse;
  
    }
    
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
      
         
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left:5px ;
        padding-right:5px;
    }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>




<form action="" method="POST" name="form">
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">Undeviating</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="activeusers.php" accesskey="3" title="">ActiveRecords</a></li>
				<li class="active"><a href="dactiveusers.php" accesskey="3" title="">DActiveRecords</a></li>
				<li><a href="logout.php" accesskey="3" title="">Logout</a></li>
				
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	<div id="welcome" class="container">
    	
<div class="title">
	  <h2>List of  Dactive Users</h2>
	
	
	<!--  <div class="Heading">
        <div class="Cell">
            <p>pic</p>
        </div>
        <div class="Cell">
            <p>name</p>
        </div>
        <div class="Cell">
            <p>email</p>
        </div>
		<div class="Cell">
            <p>pno</p>
        </div>
		<div class="Cell">
            <p>city</p>
        </div>
    </div> -->
	 <?php

@ $page = $_GET['page'];
if (!$page) {

	$page = 1;

}
$records = mysql_query("select * from empdata where flag='0'");
$numofrecords = mysql_num_rows($records);

$perpage = 2;

$totalpages = ceil($numofrecords / $perpage);

if ($page > $totalpages) {

	$page = 1;
}

$pointer = 0;

mysql_data_seek($records, ($page -1) * $perpage);

while ($row = mysql_fetch_array($records)) {
      $picture=$row['pic'];
      $name=$row['name'];
       $email=$row['email'];
       $phno=$row['phno'];
       $city=$row['city'];
       $id=$row['id'];
	$pointer = $pointer +1;
?>
	<div class="Table">
   <div class="Row" align="center">
        <div class="Cell">
            <p> <input type="checkbox" name="empids[]" id="empids[]"  value="<?php echo $id?>" /></p>
			 <input type="hidden" name="count" id="count"  value="<?php echo $numofrecords; ?>" />
        </div>
        <div class="Cell">
		 
            <p><img src="<?php echo $picture ?>" width="50" height="50" alt="no image found" style="margin-top: 15px;" /><br /><a href="change.php?id=<?php echo $id;?>" style="text-decoration: none;">Change Picture </a></p>
			
        </div>
        <div class="Cell">
            <p><?php echo $name ?></p>
        </div>
        <div class="Cell">
            <p><?php echo $email ?></p>
        </div>
		<div class="Cell">
            <p><?php echo $phno ?></p>
        </div>
		<div class="Cell">
            <p><?php echo $city ?></p>
        </div>
        <div class="Cell">
           <p><a href="edit.php?id=<?php echo $id; ?>">EDIT</a></p>
        </div>
        <div class="Cell">
           <p><a href="fileupload.php?id=<?php echo $id; ?>">fileupload</a></p>
                </div>
  
    <div class="Cell">
           <p><input type="checkbox" name="active[]" id="checkbox[]" value="<?php echo $id?>" "javascript:return ConfirmActive()";>Active</p>
                </div>
   
    <div class="Cell">
            <p><input type="checkbox" name="deactive[]" id="checkbox[]" value="<?php echo $id?>">Deactive</p>
                </div>
   
    
   </div>
   
</div>
<?php 
	if ($pointer == $perpage) {

		break;

	}

}

if ($totalpages > 1) {

	if ($page > 1) {

		$prev = $page -1;
?>
		<a href="dactiveusers.php?page=<?php echo $prev; ?>">Prev</a> 
		

	<?php

	}

	for ($i = 1; $i < $totalpages; $i++) {

		if ($i != $page) {
?>	
		<a href="dactiveusers.php?page=<?php echo $i; ?>"><?php echo $i; ?></a> 
				
	<?php

		} else {
?>
				
				<font color="red" ><?php echo $i?></font>
				
		<?php

		}

	}

	if ($page < $totalpages) {

		$next = $page +1;
?>
		<a href="dactiveusers.php?page=<?php echo $next; ?>">next</a> 
		
<?php

	}

}
?>
 


<div><br /><br /><br /><br /><br /><br /></div>
<div>
<p><input name="delete" type="submit" id="delete" value="Delete" Onclick="javascript:return ConfirmDelete()";>&nbsp;<input name="save" type="submit" id="save" value="save"></p>
</div>
	
</div>
</form>
</body>
</html>
