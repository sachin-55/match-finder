<?php 

	include('conxn.php');
	include('sanitize.php');

	session_start();
if ($_SESSION['logged']==false) {
	header('location:index.php');
}
if ($_SESSION['logged']==true and $_SESSION['track']=="8") {
	header('location:home.php');
}
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if (isset($_POST['submit'])) {
	$file=$_FILES['imagefile'];
	$fileName=$_FILES['imagefile']['name'];
	$fileType=$_FILES['imagefile']['type'];
	$fileTmpName=$_FILES['imagefile']['tmp_name'];
	$fileSize=$_FILES['imagefile']['size'];
	$fileError=$_FILES['imagefile']['error'];
	$fileExt= explode('.', $fileName) ;
	$fileActualExt= strtolower(end($fileExt));

	$allowed  = array('jpeg','jpg','png' );


	if (in_array($fileActualExt, $allowed)) {
			if ($fileError===0) {
				if ($fileSize < 2000000) {
					
						$fileNewName=$email.".".$fileActualExt;

						$fileDestination='upload/'.$fileNewName;

						$sqlinsert="INSERT INTO profileimage(iid,filename)VALUES('$uid','$fileNewName')";

   							$insert_query= $conn->query($sqlinsert);
   							if (!$insert_query) die ("Database access failed: " . $conn->error);
   							else{

   								move_uploaded_file($fileTmpName, $fileDestination);
   								  $_SESSION['track']="7";
   								header('location:success2nd.php');

   							}

						

				} else {
						echo "Your file size cannot be more than 5MB";
					
				}
				


			}else{
						echo "There was an uploading error in your image.";

			}



	}else{
		echo "You cannot upload files of .".$fileActualExt." types.";
	}



}
	

echo <<<_END


<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
	body{
		background-color:#707B7C;
	}

	#box{
		background-color:#ced5e0;
		padding:10px;
		width:35%;
		float:centre;
		margin-left:auto;
		margin-right:auto;


	}
	#box label{
		color:#448899;
		padding-left:30px;


	}
	#image{
		background-image:url("Photos/no-image.jpg");
		background-size:cover;
		background-color:gray;
		padding:10px;
		width:350px;
		height:300px;
		margin-left:auto;
		margin-right:auto;
		margin-top:5px;
		
	}
	#selection{
		background-color:grey;
		text-align:center;
		margin-top:10px;

		
	}
	#selection button
	{
		cursor:pointer;

	}
	
	#selection input
	{
		cursor:pointer;
	}

	#image_display{
		width:100%;
		height:100%;
		margin:0px;
		
	}
</style>

</head>
<body>

<div id="box">
<label>Select Your Profile Picture</label><br>
	<label> The size of an image should be less than 2MB else error occurs.</label>
	<div id="image">
	<img id="image_display"/>


	</div>

	<div id="selection">
		<form method="POST" action="" enctype="multipart/form-data" onchange="loadFile(event)">
			<input type="file" name="imagefile" accept="image/*">
			<button type="submit" name="submit"> UPLOAD	</button>
		</form>
	</div>

</div>


<script>
	var loadFile = function(event) {
    var output = document.getElementById('image_display');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
	

</script>


</body>
</html>

_END;


 ?>