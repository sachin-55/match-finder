<?php
include('conxn.php');
include('sanitize.php');
 session_start();
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if(isset($_POST['deactivate'])){
echo "sjkdkjksdn";
	$update="UPDATE userr_l1
				SET status=0
				WHERE uid='$uid'";

	$result=$conn->query($update);
	if (!$result) die ("Database access failed: " . $conn->error);
else{
		session_unset();
		session_destroy();
		echo "<font color=red;>Your account has been deactivated.</font>";
		echo '<body onload="myFunction()"> </body>';

}

}



?>

<html>
<head>
	<title>Deactivate</title>
	<link rel="stylesheet" type="text/css" href="CSS/setting.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form method="POST" action="">
	<div class="txt">
		Click this button to deactivate your account

	</div>

	<input class="edit" type="submit" name="deactivate" value="Deactivate" >
</form>


<script >
	function myFunction () {
		parent.location.reload();
	}




</script>
</body>
</html>