<?php
include('conxn.php');
    include('sanitize.php');
		


if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

    
     $email = get_post($conn, str_replace("'", "", $_GET['email'])); // Set email variable
    $hash = get_post($conn, str_replace("'", "", $_GET['hash'])); // Set hash variable

    $search ="SELECT email, hash FROM userr_l1 WHERE email='$email' AND hash='$hash'";
    $result=$conn->query($search);
    if (!$result) die("Database access failed: " .$conn->error); 
    $match  =$result->num_rows;


    if($match > 0){
    	if (isset($_POST['change'])) {
    		$newpass1=get_post_pw(get_post($conn, $_POST['pass1']));
			$newpass2=get_post_pw(get_post($conn, $_POST['pass2']));
    	

    	if (strcmp($newpass1, $newpass2)) {
		$err="Password Mismatched";
		echo $err;
	}
	else{

		 $sql_update="UPDATE userr_l1 SET kadas='$newpass1' WHERE email='$email'";
 
			$select_result=$conn->query($sql_update);

			if(!$select_result) die("Database Access Failed:".$conn->error);  

			else
			{
				header('location:index.php?password%change%successfull');
			}
	}
        
       
    }
}else{
	echo " The url is either invalid ";
}

}



?>

<html>
 <head>
    <title></title>
 </head>
 <body>
Enter new password: 
<form method="POST" action="">
	<br><input type="password" name="pass1" placeholder="New Password" >
	<br><br><input type="password" name="pass2" placeholder="Confirm Password" >
<br><br>
<input type="submit" name="change" value="Change">
</form>

 </body>
 </html>