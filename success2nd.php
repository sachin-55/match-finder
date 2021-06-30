<?php 

include('conxn.php');
	include('sanitize.php');

	session_start();
	if(empty($_SESSION['UID']) and $_SESSION['status']='1'){	
  header('location:index.php');
}




	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];

	$hash=md5(rand(0,1000));

	$update="UPDATE userr_l1
				SET hash='$hash'
				WHERE uid='$uid'";
	$result=$conn->query($update);
	if (!$result) die ("Database access failed: " . $conn->error);

if (isset($_POST['submit'])) {

	$to=$email;
	$subject="Signup | Verification";
	$message="
		Thanks for signing up!
Your account has been created, you can continue after you have activated your account by pressing the url below.

	Please click this link to activate your account:
http://localhost/PROJECT/verify.php?email='$email'&hash='$hash'
	";

	
		$headers='From:noreply@partnerfinder.com'."\r\n";
		mail($to,$subject,$message,$headers);
	


}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Account Activation</title>
	<link rel="stylesheet" type="text/css" href="CSS/success1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="msgg">
<h1>Your account has been successfully registered. </h1>
<br>
<p> But your account is still deactivated to activate your account you need to verify your email address that you provide us.<br>
Check your email that you provide us.</p>
<br>
<form method="POST" action="" >
	
		<input type="submit" name="submit" value="Send mail">
	</div>
</form>

</body>
</html>