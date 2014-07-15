<?php
include ('connect.php');
//session_start();
//error_reporting(0);
//$_SESSION['id']=$row['id'];
if (isset ( $_POST ['submit'] )) {
	
	 $name = $_POST ['name'];	
	 $email = $_POST ['email'];
	 $pass = base64_encode ( $_POST ['pass'] );
	 $phno = $_POST ['phno'];
	 $city = $_POST ['city'];
	 $pic_name = $_FILES ['pic']['name'];
	 $pic_size = $_FILES ['pic']['size'];
	 $pic_type = $_FILES ['pic']['type'];
	 $pic_path = 'upload/'.$pic_name; 
	 
	 $sel = mysql_query("SELECT email FROM empdata WHERE email = '".$email."'");
	 $res = mysql_fetch_array($sel);
	 
	 if($res > 0)
	 {
		$sucess = 'Already Registered with this E-mail Address';
		 header('location:register.php?error='.$sucess);
	 
	 }else
	 {	 
	
	$query = "INSERT INTO empdata (name,email,pass,phno,city,pic) VALUES('$name','$email','$pass','$phno', '$city','$pic_path')";
	$send = mysql_query ( $query ) or die ( mysql_error () );
	if($send){
          $id1= mysql_insert_id();
  
   
	 $to = $email; 
		$subject = "Registration link";
	    echo $message = "localhost/EmpDetail/update.php?id=".$id1;
		exit;
		
		$from ="bobbykakileti@gmail.com";
		$headers = "From: $from"; 
		$sent = mail($to, $subject, $message, $headers) ; 
		if($sent){
		$mesag='you have an mail for ur email';

         header('location:login.php?error='.$mesag);
		 }
         
        else 
          {
		  print "We encountered an error sending your mail";
		  }
 
  
        }
    
	
	
	
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["pic"]["name"]);
$extension = end($temp);   
  if (file_exists("upload/" . $_FILES["pic"]["name"])) {
     echo $_FILES["pic"]["name"] . " already exists. ";
   } else 
      move_uploaded_file($_FILES["pic"]["tmp_name"],
      "upload/" . $_FILES["pic"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["pic"]["name"];
     
    // header('location:sucess.php');
	
	$sucess = 'Sucessfully Created';
   
    
    
	
	}
  }
 

	

	
	
	
	?>
		
	
	
	