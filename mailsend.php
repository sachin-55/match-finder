
<?php
include('conxn.php');
include('sanitize.php');
	session_start();
	$uid=$_SESSION['id'];
	$email=$_SESSION['email'];

	$hash=md5(rand(0,1000));

	$update="UPDATE userr_l1
				SET hash='$hash'
				WHERE uid='$uid'";
	$result=$conn->query($update);
	if (!$result) die ("Database access failed: " . $conn->error);

if (isset($_POST['submit'])) {

	$to=$email;
	$subject="Change Password";
	$message="
		

	Please click this link to change password of your account:
http://localhost/PROJECT/changepassword.php?email='$email'&hash='$hash'
	";

	
		$headers='From:noreply@partnerfinder.com'."\r\n";
		mail($to,$subject,$message,$headers);
	


}



?>

<html>
<head>
	<title></title>
</head>
<body>

A link will be sent to your e-mail. <br>
Click this Button to sent mail.
<form method="POST" action="" >
	<input type="submit" name="submit" value="Send mail">
</form> 

</body>
</html>