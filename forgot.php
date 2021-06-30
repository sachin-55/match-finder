
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<h1>Enter your registered email to confirm your account.</h1>

<form method="POST" action="" >
	<input  type="email" name="emailtxt">
	<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php
include('conxn.php');
include('sanitize.php');
if(isset($_POST['submit'])){
$email=get_post($conn, $_POST['emailtxt']);

	$sql_select="SELECT * FROM userr_l1
			WHERE email='$email'";
 
			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{


				$rows = $select_result->num_rows;
				
				if($rows>0)
				{	while($row=$select_result->fetch_assoc()) 
				     { 
						session_start();
						$_SESSION['id']=$row['uid'];
						$_SESSION['email']=$row['email'];
						echo "Match Found ";
						header('location:mailsend.php');

					}
				}else{
					echo "No Match found";
				}
			}
}

?>