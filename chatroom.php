

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php
include_once('conxn.php');
session_start();
include('chatassossaries.php');
	$id=$_REQUEST['id'];
	$r=substr($id,0,-2);
$_SESSION['pchat']=$r;
	
?>
<body>


		<?php include('room.php'); ?>



<?php include('room_modal.php'); ?>
<?php include('modal.php'); ?>


				
</body>
</html>