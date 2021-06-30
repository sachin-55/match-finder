<?php

	include('conxn.php');
   include('sanitize.php');
session_start();
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if (isset($_POST['changebtn'])) {
	
	$newpass1=get_post_pw(get_post($conn, $_POST['pass1']));
	$newpass2=get_post_pw(get_post($conn, $_POST['pass2']));
	$oldpass=get_post_pw(get_post($conn, $_POST['oldpass']));


	if (strcmp($newpass1, $newpass2)) {
		$err="Password Mismatched";
		echo $err;
	}
	else{
		$sql_select="SELECT * FROM userr_l1
			WHERE uid='$uid' and email='$email' and kadas='$oldpass'";
 
			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{

				$rows = $select_result->num_rows;
				
				if($rows>0)
				{
					
				      $sql_update="UPDATE userr_l1 SET kadas='$newpass1' WHERE uid='$uid' and email='$email' and kadas='$oldpass' ";
 
			$select_result=$conn->query($sql_update);

			if(!$select_result) die("Database Access Failed:".$conn->error);  
				       session_unset();
						session_destroy();
						echo '<body onload="myFunction()"></body>';
				      
				}else{
					echo "Old password Incorrect or not filled";
				}

			}


	}



}




?>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<form method="POST" action="">
	
	<input type="password" name="pass1" placeholder="Enter New Password" required><br><br>
	<input type="password" name="pass2" placeholder="Confirm New Password" required  onclick="stateSelectHandler()"	><br><br>


	<input type="password" name="oldpass" placeholder="Enter old Password"><br>

	<br><input type="submit" name="changebtn" value="Change Password">
	


</form>
  <script >
	function myFunction () {
		parent.location.reload();
	}

</script>

</body>
</html>