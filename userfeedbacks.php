
<?php
include('conxn.php');

$email=$_SESSION['email'];

$fname="SELECT * from userr_l1 where email='$email' ";
$resultname=$conn->query($fname);

		if (!$resultname) die("Database Access Failed:".$conn->error);

		$resultname->data_seek(0);
    $rownam = $resultname->fetch_array(MYSQLI_NUM);

		



	
echo<<<_END

<html>
<head>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="mrova-feedback-form.js" type="text/javascript"></script>
	<link rel="stylesheet" href="mrova-feedback-form.css" type="text/css"/>
	
</head>
<body>
	<div id="mrova-feedback">
		<div id="mrova-contact-thankyou" style="display: none;">
			<span style="color:blue">Thank you for your feedback. We have successfully received your useful feedback.</span>
		</div>
		<div id="mrova-form">
			<form id="mrova-contactform" action="#" method="post">
				<ul >
					<li>
						<label for="mrova-name">Your Name*</label> <input type="text" name="mrova-name" class="required" id="mrova-name" value="$rownam[1]">
					</li>
					<li>
						<label for="mrova-email">Email*</label> <input type="text" name="mrova-email" class="required" id="mrova-email" value="$email">
					</li>
					<li>
						<label for="mrova-message">Message*</label>
						<textarea class="required" id="mrova-message" name="mrova-message"  rows="8" cols="30"></textarea>
					</li>
				</ul>
				<input type="submit" value="Send" id="mrova-sendbutton" name="mrova-sendbutton">
			</form>
		</div>
		<div id="mrova-img-control"></div>
	</div>

</body>
</html>







_END;
?>

