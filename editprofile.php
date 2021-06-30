<?php
include('conxn.php');
   include('sanitize.php');
session_start();
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];


if (isset($_POST['editphn']) and !empty($_POST['phno'])) {
	$phone=get_post($conn, $_POST['phno']);
	$update="UPDATE userr_l1 SET phno='$phone' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
   			
}

if (isset($_POST['editmsts']) and !empty($_POST['marital1'])) {
	$marital=get_post($conn,$_POST['marital1']);
	$update="UPDATE personal_details SET marital='$marital' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);


}

if (isset($_POST['editrel']) and !empty($_POST['religion1'])) {
	$religion=get_post($conn,$_POST['religion1']);
	$update="UPDATE personal_details SET religion='$religion' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);


}

if (isset($_POST['editeat']) and !empty($_POST['ehabit'])) {
	$eating=get_post($conn, $_POST['ehabit']);

	$update="UPDATE personal_details SET eating='$eating' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['editstate']) and !empty($_POST['editstate'])) {
}

if (isset($_POST['editdist'])) {
}

if (isset($_POST['editedu']) and !empty($_POST['highest_education'])) {
	$education=get_post($conn,$_POST['highest_education']);

	$update="UPDATE personal_details SET education='$education' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);


}

if (isset($_POST['editocc']) and !empty($_POST['occupation'])) {
	$occupation=get_post($conn,$_POST['occupation']);

	$update="UPDATE personal_details SET occupation='$occupation' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['editincome']) and !empty($_POST['Annualincome'])) {
	$annualincome=get_post($conn,$_POST['Annualincome']);

	$update="UPDATE personal_details SET annualincome='$annualincome' WHERE uid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);


}

if (isset($_POST['edithgt']) and !empty($_POST['dropdown1'])) {
	$height1=get_post($conn,$_POST['dropdown1']);
    $height2=get_post($conn,$_POST['dropdown2']);

    $update="UPDATE physical SET height1='$height1',height2='$height2' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['editwgt']) and !empty($_POST['weight'])) {
    $weight=get_post($conn,$_POST['weight']);

      $update="UPDATE physical SET weight='$weight' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);
}

if (isset($_POST['editbtype']) and !empty($_POST['Body'])) {
    $body=get_post($conn,$_POST['Body']);

     $update="UPDATE physical SET body='$body' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['edithobby']) and !empty($_POST['hobby'])) {
    $hobby=get_post($conn,$_POST['hobby']);

     $update="UPDATE physical SET hobby='$hobby' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['editpsts']) and !empty($_POST['status'])) {
    $physical=get_post($conn,$_POST['status']);

	$update="UPDATE physical SET physical='$physical' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);



}

if (isset($_POST['editftype']) and !empty($_POST['family2'])) {
	$familytype=get_post($conn,$_POST['family2']);
	
		$update="UPDATE family SET familytype='$familytype' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}

if (isset($_POST['editfsts']) and !empty($_POST['family3'])) {
	$familystatus=get_post($conn,$_POST['family3']);

	$update="UPDATE family SET familystatus='$familystatus' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);



}

if (isset($_POST['editfvalue']) and !empty($_POST['family1'])) {
	$familyvalue=get_post($conn,$_POST['family1']);

	$update="UPDATE family SET familyvalue='$familyvalue' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);



}

if (isset($_POST['editbmarr']) and !empty($_POST['sibling2'])) {
	$bromarried=get_post($conn,$_POST['sibling2']);


	$update="UPDATE family SET bromarried='$bromarried' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);


}

if (isset($_POST['editsmarr']) and !empty($_POST['sibling4'])) {
	$sismarried=get_post($conn,$_POST['sibling4']);

	$update="UPDATE family SET sismarried='$sismarried' WHERE pid='$uid'";
	$result= $conn->query($update);
   		if (!$result) die ("Database access failed: " . $conn->error);

}


?>




<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="CSS/setting.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<form method="POST" action="">
	<div class="txt">
		Phone Number<br>
		<input type="text" name="phno">

	</div>
	<input class="edit" type="submit" name="editphn" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Height<br>
		 <select name="dropdown1">
                 <option value="">--Feet--</option>
                <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="dropdown2">
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
		Weight<br>

		<input type="text" name="weight" placeholder=" Enter weight in KG"><br>


	</div>

	<input class="edit" type="submit" name="editwgt" value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Body Type<br>
		  <label><input type="hidden" name="Body" value="">

		  <label><input type="radio" name="Body" value="average">Average</label>
           <label><input type="radio" name="Body" value="athletic">Athletic</label>
           <label><input type="radio" name="Body" value="slim">Slim</label>
           <label><input type="radio" name="Body" value="heavy">Heavy</label><br>

	</div>

	<input class="edit" type="submit" name="editbtype" value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Marital Status<br>
		<select name="marital1">
			<option value="">--select--</option>
			<option value="nevermarried">Never Married</option>
			<option value="widow">Widow</option>
			<option value="divorced">Divorced</option>
			<option value="awaitingdiv">Awaiting Divorce</option>

		</select><br>

	</div>

	<input class="edit" type="submit" name="editmsts" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Physical Status<br>
		<label> <input type="hidden" name="status" value=""></label>

		<label> <input type="radio" name="status" value="normal">Normal</label>
         <label> <input type="radio" name="status" value="physically_challenged">Physically Challenged</label><br>


	</div>

	<input class="edit" type="submit" name="editpsts" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Religion<br>
		<select name="religion1">
			<option value="">--select--</option>
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
		Eating Habit<br>
		<input type="hidden" name="ehabit" value="">

		<input type="radio" name="ehabit" value="veg"> Veg
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
		<select name="occupation">
			<option value="">--Select--</option>
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
			<option value="">--select--</option>			
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
		Hobby<br>
		 <input id="Hobby" type="textarea" name="hobby"  placeholder="eg.football,singing"><br>


	</div>

	<input class="edit" type="submit" name="edithobby" value="Reset" ><br>
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Family Type<br>
			<input type="hidden" name="family2" value="">
			<input type="radio" name="family2" value="Joint Family">Joint Family
			<input type="radio" name="family2" value="Nuclear family">Nuclear Family
			<input type="radio" name="family2" value="Others">Others<br>
	</div>

	<input class="edit" type="submit" name="editftype" value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Family Status<br>
		<input type="hidden" name="family3" value="">

		<input type="radio" name="family3" value="Lower Class">Lower Class
			<input type="radio" name="family3" value="Middle Class">Middle Class
			<input type="radio" name="family3" value="Upper Middle">Upper Class<br>


	</div>

	<input class="edit" type="submit" name="editfsts" value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Family Value<br>
		<input type="" name="family1" value="">

		<input type="radio" name="family1" value="Orthodox">Orthodox
			<input type="radio" name="family1" value="Traditional">Traditional			
			<input type="radio" name="family1" value="Moderate">Moderate
			<input type="radio" name="family1" value="Liberal">Liberal<br>

	</div>

	<input class="edit" type="submit" name="editfvalue" value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Brother Married<br>
		<select name="sibling2">
			<option value="">--select--</option>				
			<option value="0">none</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">All</option>
			<option value="5">All except me</option>

		</select><br>

	</div>

	<input class="edit" type="submit" name="editbmarr"  value="Reset" ><br>		
</form>
<br><br>
<form method="POST" action="">
	<div class="txt">
		Sister Married<br>
		<select name="sibling4">
			<option value="">--select--</option>				

			<option value="0">none</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">All</option>
			<option value="5">All except me</option>

		</select>
		<br>

	</div>

	<input class="edit" type="submit" name="editsmarr" value="Reset" ><br>		
</form>
<br><br>
</body>
</html>