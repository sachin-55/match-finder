<?php
include('conxn.php');
   include('sanitize.php');
session_start();
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if (isset($_POST['editage']) and !empty($_POST['age1'])and !empty($_POST['age2'])) {

	$age1=get_post($conn, $_POST['age1']);
		$age2=get_post($conn, $_POST['age2']);
	
	$update="UPDATE lookingfor SET age1='$age1',age2='$age2'  WHERE lid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}	
if (isset($_POST['edithgt'])and !empty($_POST['feet1'])and !empty($_POST['feet2'])and !empty($_POST['inch1'])and !empty($_POST['inch2'])) {

	$heightf1=get_post($conn, $_POST['feet1']);
		$heightf2=get_post($conn, $_POST['feet2']);

		$heighti1=get_post($conn, $_POST['inch1']);
		$heighti2=get_post($conn, $_POST['inch2']);

	$update="UPDATE lookingfor SET heightf1='$heightf1',heightf2='$heightf2',heighti1='$heighti1',heighti2='$heighti2'  WHERE lid='$uid'";
	
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}

if (isset($_POST['editintr'])and !empty($_POST['interests'])) {
		$interest=get_post($conn, $_POST['interests']);

	$update="UPDATE lookingfor SET interest='$interest'  WHERE lid='$uid'";
	
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
}

if (isset($_POST['editpsts'])and !empty($_POST['pstatus'])) {
		$physical=get_post($conn, $_POST['pstatus']);


	
	$update="UPDATE lookingfor SET physical='$physical'  WHERE lid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editrel'])and !empty($_POST['religion1'])) {
		$religion=get_post($conn, $_POST['religion1']);
			

	$update="UPDATE lookingfor SET religion='$religion'  WHERE lid='$uid'";

	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editeat']) and !empty($_POST['ehabit'])) {
		$eating=get_post($conn, $_POST['ehabit']);
		
	$update="UPDATE lookingfor SET eating='$eating' WHERE lid='$uid'";

	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editedu']) and !empty($_POST['highest_education'])) {
		$education=get_post($conn, $_POST['highest_education']);
			

	$update="UPDATE  lookingfor SET education='$education' WHERE lid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editocc'])and !empty($_POST['Occupation'])) {
		$occupation=get_post($conn, $_POST['Occupation']);
	
	$update="UPDATE lookingfor SET occupation='$occupation' WHERE lid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editincome'])and !empty($_POST['Annual_income'])) {
		$income=get_post($conn, $_POST['Annual_income']);
		
	$update="UPDATE  lookingfor SET income='$income' WHERE lid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}
if (isset($_POST['editdesc'])and !empty($_POST['partdecs'])) {
		$description=get_post($conn, $_POST['partdecs']);

	
$update="UPDATE  lookingfor SET description='$description' WHERE lid='$uid'";
	
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}


?>


<html>
<head>
	<title>Edit Partner</title>
	<link rel="stylesheet" type="text/css" href="CSS/setting.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form method="POST" action="">
	<div class="txt">
		Age<br>
		<label>From</label>
			<input type="text" name="age1"> to 
			<input type="text" name="age2"><br>

	</div>
	<input class="edit" type="submit" name="editage" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Height<br>
		 From 
            <select name="feet1" style="width:70px;">
                <option value="">--Feet--</option>
                 <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="inch1" style="width:70px;">
                <option value="">--Inches--</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>
            to
            <select name="feet2" style="width:70px;">
                <option value="">--Feet--</option>
                 <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="inch2" style="width:70px;">
                <option value="">--Inches--</option>
                 <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>

	</div>

	<input class="edit" type="submit" name="edithgt" value="Reset" ><br>		
</form>
<br><br>

<form method="POST" action="">
	<div class="txt">
		Interests<br>
		<input type="radio" class="radio" name="interests" value="unmarried">Unmarried&emsp;&ensp;
  			<input type="radio" class="radio" name="interests" value="widow">Widow&emsp;&ensp;
  			<input type="radio" class="radio" name="interests" value="divorced">Divorced<br>

	</div>

	<input class="edit" type="submit" name="editintr" value="Reset" ><br>
</form>
<br><br>

<form method="POST" action="">
	<div class="txt">
		Religion<br>
		<select name="religion1">
			<option value="select">--select--</option>
			<option value="hindu">Hindu</option>
			<option value="christain">Christain</option>
			<option value="muslim">Muslim</option>
			<option value="buddhist">Buddhist</option>
			<option value="others">Others</option>

		</select><br>

	</div>

	<input class="edit" type="submit" name="editrel" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Physical Status<br>
		<label> <input type="radio" name="status" value="normal">Normal</label>&emsp;&ensp;
         <label> <input type="radio" name="status" value="physically_challenged">Physically Challenged</label><br>


	</div>

	<input class="edit" type="submit" name="editpsts" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Eating Habit<br>
		<input type="radio" name="ehabit" value="veg"> Veg&emsp;&ensp;
		<input type="radio" name="ehabit" value="non-veg"> Non-Veg<br>

	</div>

	<input class="edit" type="submit" name="editeat" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Education<br>
		<select name="highest_education">
				<option value="">--Select--</option>
				<option value="any">Doesn't matter</option>
				<option value="Secondary">Secondary Level </option>
				<option value="Higher Secondary">Higher Secondary</option>
				<option value="Bachelor">Bachelor</option>
				<option value="Master">Master</option>
				<option value="P.HD">P.HD</option>
				<option value="diploma">Diploma</option>
				<option value="others">Others</option>
			</select><br>

	</div>

	<input class="edit" type="submit" name="editedu" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Occupation<br>
		<select name="Occupation">
			<option value="select">--Select--</option>
			<option value="looking for a job">looking for a job </option>
			<option value="not working">not working</option>
			<option value="actor/model">actor/model</option>
			<option value="agent">agent</option>
			<option value="air hostess">air hostess</option>
			<option value="architech">architech</option>
			<option value="banking professional">banking professional</option>
			<option value="beautician">beautician</option>
			<option value="businessperson">businessperson</option>
			<option value="CA">CA</option>
			<option value="civil services">civil services</option>
			<option value="consultant">consultant</option>
			<option value="corporate communication">corporate communication</option>
			<option value="network security">network security</option>
			<option value="doctor">doctor</option>
			<option value="engineer">engineer</option>
			<option value="farming">farming</option>
			<option value="fashon designer">fashon designer</option>
			<option value="accountant">accountant</option>
			<option value="govt. services">govt.services</option>
			<option value="telecome">telecome</option>
			<option value="healthcare professional">healthcare professional</option>
			<option value="hotel">hotel</option>
			<option value="journalist">journalist</option>
			<option value="layer">layer</option>
			<option value="manager">manager</option>
			<option value="marketing professional">marketing professional</option>
			<option value="media professional">media professional</option>
			<option value="social services">social services</option>
			<option value="nurse">nurse</option>
			<option value="technician">technician</option>
			<option value="pilot">pilot</option>
			<option value="police">police</option>
			<option value="private security">private security</option>
			<option value="professor">professor</option>
			<option value="program manager">program manager</option>
			<option value="psychologist">psychologist</option>
			<option value="physiotherapist">physiotherapist</option>
			<option value="research professional">research professional</option>
			<option value="scientist">scientist</option>
			<option value="security professional">security professional</option>
			<option value="self employed">self employed</option>
			<option value="sports person">sports person</option>
			<option value="student">student</option>
			<option value="teacher">teacher</option>
			<option value="others">others</option>
	
		</select><br>

	</div>

	<input class="edit" type="submit" name="editocc" value="Reset" ><br>
</form>
<br><br>

<form method="POST" action="">
	<div class="txt">
		Annual Income<br>
		<select name="Annualincome">
			<option value="no">No income</option>
			<option value="-250k">Under Rs.250,000</option>
			<option value="250-500k">Rs.250,000-500,000</option>
			<option value="500-1000k">Rs.500,000-1,000,000</option>
			<option value="10lc-20lc">Rs.1,000,000-2,000,000</option>
			<option value="20lc-30lc">Rs.2,000,000-3,000,000</option>
			<option value="30lc-40lc">Rs.3,000,000-4,000,000</option>
			<option value="40lc-50lc">Rs.4,000,000-5,000,000</option>
			<option value="+50lc">Above Rs.5,000,000</option>
			
		</select><br>

	</div>

	<input class="edit" type="submit" name="editincome" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Partner Description<br>
		<textarea  rows="10" cols="50" style="resize:none" name="partdecs" maxlength="150"></textarea><br>

	</div>

	<input class="edit" type="submit" name="editdesc" value="Reset" ><br>
</form>
<br><br>

</body>
</html>