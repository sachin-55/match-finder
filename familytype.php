<html>
<head>
    <title>FamilyType</title>
    <link rel="stylesheet" type="text/css" href="CSS/familytype.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="body">
	<h1>Family Type Details</h1>
<form method="post" action="">
	<table id="table">
		
		
		<tr><td><br>Family Type</td><td><br>
			<input type="hidden" name="family2" value="">

			<input type="radio" name="family2" value="Joint Family">Joint Family
			<input type="radio" name="family2" value="Nuclear family">Nuclear Family
			<input type="radio" name="family2" value="Others">Others</td></tr>

		<tr><td><br>Family Status</td><td><br>
			<input type="hidden" name="family3" value="">

			<input type="radio" name="family3" value="Lower Class">Lower Class
			<input type="radio" name="family3" value="Middle Class">Middle Class
			<input type="radio" name="family3" value="Upper Middle">Upper Class</td></tr>

			<tr><td><br>Family Value</td><td><br>
			<input type="hidden" name="family1" value="">

			<input type="radio" name="family1" value="Orthodox">Orthodox
			<input type="radio" name="family1" value="Traditional">Traditional			
			<input type="radio" name="family1" value="Moderate">Moderate
			<input type="radio" name="family1" value="Liberal">Liberal</td></tr>


		
		<tr><td><br>Sibling Details :</td></tr>
		<tr><td>No. of Brothers</td><td>
			<select name="sibling1">
				<option value="0">0</option>	
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">More than 4</option>

			</select></td></tr>
	<tr><td><br>Brother's Married</td><td><br>
		<select name="sibling2">
			<option value="0">none</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">All</option>
			<option value="5">All except me</option>

		</select></td></tr>
		<tr><td><br>No. of Sisters</td><td><br>
			<select name="sibling3">
				<option value="0">0</option>	
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">More than 4</option>

		</select></td></tr>
		<tr><td><br>Sisters's Married</td><td><br>
		<select name="sibling4">
			<option value="0">none</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">All</option>
			<option value="5">All except me</option>

		</select></td></tr>

		<tr><td><br>About my family</td><td><br>
			<textarea rows="4" cols="50" name="familydes" style="resize: none; " maxlength="150"></textarea>
		</td></tr>
		<tr><td></td><td><br>
			<input id="btn" type="submit" name="pdbtn1" value="Next>>"></td><td></td></tr>


		</table>
	</form>
	</div>
	</body>
</html>

<?php 
include("conxn.php");
include("sanitize.php");

session_start();
if ($_SESSION['logged']==false) {
	header('location:index.php');
}
if ($_SESSION['logged']==true and $_SESSION['track']=="8") {
	header('location:home.php');
}
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if (isset($_POST['pdbtn1'])) {

	$familytype=get_post($conn,$_POST['family2']);
	$familystatus=get_post($conn,$_POST['family3']);
	$familyvalue=get_post($conn,$_POST['family1']);
	$nbro=get_post($conn,$_POST['sibling1']);
	$nsis=get_post($conn,$_POST['sibling3']);
	$bromarried=get_post($conn,$_POST['sibling2']);
	$sismarried=get_post($conn,$_POST['sibling4']);
	$desc=get_post($conn,$_POST['familydes']);

	

if ($familytype!=""&&$familystatus!=""&&$familyvalue!=""&&$desc!="") {

	 $sqlinsert="INSERT INTO family(fid,familytype,familystatus,familyvalue,bronum,sisnum,bromarried,sismarried,description)VALUES('$uid','$familytype','$familystatus','$familyvalue','$nbro','$nsis','$bromarried','$sismarried','$desc')";
   $insert_query= $conn->query($sqlinsert);
 
   if(!$insert_query) die("Database access failed:" . $conn->error);
   else{
   	echo "Successfull";
   	 $_SESSION['track']="5";
	            
			
   	header('location:lookingfor.php');
   }


} 

else {
echo "Some field is empty. Check and resubmit.";

}





}


 ?>