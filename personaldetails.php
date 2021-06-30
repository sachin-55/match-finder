<?php
     include('conxn.php');
   include_once('sanitize.php');

session_start();
if ($_SESSION['logged']==false ) {
	header('location:index.php');
}
if ($_SESSION['logged']==true and $_SESSION['track']=="8") {
	header('location:home.php');
}
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];


		$name=$email2=$year=$month=$gender=$day=$lookfor=$phno="";

	$sql_select="SELECT * FROM userr_l1 WHERE email='$email' and uid='$uid'";
	$result=$conn->query($sql_select);
	if (!$result) die("Database Access Failed:".$conn->error);
	 else {
	
		$rows = $result->num_rows;
		if($rows>0)
	{
	while($row=$result->fetch_assoc()) 
      { 
          $name=$row["usrname"];
          $gender=$row['gender'];

      }

	}
	
}
$name2=explode(" ", $name);

$sign="";

if($gender=="male"){
	$sign="Mr. ";
}
else
{
	$sign="Ms. ";
}



if (isset($_POST['pdbtn'])) {


	
	$marital=get_post($conn,$_POST['marital1']);
	$religion=get_post($conn,$_POST['religion1']);
	
	$state=get_post($conn,$_POST['state1']);
	$horoscope=get_post($conn,$_POST['Horoscope']);
	$education=get_post($conn,$_POST['highest_education']);
	$occupation=get_post($conn,$_POST['Occupation']);
	$annualincome=get_post($conn,$_POST['Annualincome']);

	$eating=get_post($conn, $_POST['ehabit']);

	$district="";

		if ($_POST['district1']!="") {
		$district=get_post($conn, $_POST['district1']);
		}
		else if ($_POST['district2']!="") {
		$district=get_post($conn, $_POST['district2']);
			
		}
		else if ($_POST['district3']!="") {
		$district=get_post($conn, $_POST['district3']);
			
		}
		else if ($_POST['district4']!="") {
		$district=get_post($conn, $_POST['district4']);
			
		}
		else if ($_POST['district5']!="") {
		$district=get_post($conn, $_POST['district5']);
			
		}
		else if ($_POST['district6']!="") {
		$district=get_post($conn, $_POST['district6']);
			
		}
		else if ($_POST['district7']!="") {
		$district=get_post($conn, $_POST['district7']);
			
		}


	if ($marital!="select"&&$religion!="select"&&$state!=0&&$education!="select"&&$occupation!="select") {
$sql="insert into personal_details(uid,marital,religion,state,district,horoscope,checkreligion,education,occupation,annualincome,eating) values ('$uid','$marital','$religion','$state','$district','$horoscope','$checkreligion','$education','$occupation','$annualincome','$eating')";
        
		$result = $conn->query($sql);

		if (!$result) die ("Database access failed:ohhhhshit " . $conn->error);
		else
		{
			echo "personal_details stored success";
			$_SESSION['track']="3";
			
			header('location:Physical.php');	




		}

	}else{
		echo "Field is empty check and resubmit";
	}


	


}


echo <<<_END




<!DOCTYPE html>
<html>
<head>
	<title>Personal Detail</title>
	<link rel="stylesheet" type="text/css" href="CSS/personaldetail.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Personal Details</h1>
</head>
<script type="text/javascript">
		function hide1(){
          var elem = document.getElementById('state1');
          elem.style.display = 'none';
        }
        function show1(){
			var elem = document.getElementById('state1');
			elem.style.display = 'inline';
		}
		function hide2(){
          var elem = document.getElementById('state2');
          elem.style.display = 'none';
        }
        function show2(){
			var elem = document.getElementById('state2');
			elem.style.display = 'inline';
		}
		function hide3(){
          var elem = document.getElementById('state3');
          elem.style.display = 'none';
        }
        function show3(){
			var elem = document.getElementById('state3');
			elem.style.display = 'inline';
		}
		function hide4(){
          var elem = document.getElementById('state4');
          elem.style.display = 'none';
        }
        function show4(){
			var elem = document.getElementById('state4');
			elem.style.display = 'inline';
		}
		function hide5(){
          var elem = document.getElementById('state5');
          elem.style.display = 'none';
        }
        function show5(){
			var elem = document.getElementById('state5');
			elem.style.display = 'inline';
		}
		function hide6(){
          var elem = document.getElementById('state6');
          elem.style.display = 'none';
        }
        function show6(){
			var elem = document.getElementById('state6');
			elem.style.display = 'inline';
		}
		function hide7(){
          var elem = document.getElementById('state7');
          elem.style.display = 'none';
        }
        function show7(){
			var elem = document.getElementById('state7');
			elem.style.display = 'inline';
		}
		

		function stateSelectHandler(select){
			if(select.value == '1'){
			show1();
			}else{
			hide1();
			}

			if(select.value == '2'){
			show2();
			}else{
			hide2();
			}
			if(select.value == '3'){
			show3();
			}else{
			hide3();
			}
			if(select.value == '4'){
			show4();
			}else{
			hide4();
			}
			if(select.value == '5'){
			show5();
			}else{
			hide5();
			}
			if(select.value == '6'){
			show6();
			}else{
			hide6();
			}
			if(select.value == '7'){
			show7();
			}else{
			hide7();
			}

		}
		function initialState(){
			hide1();hide2();hide3();hide4();hide5();hide6();hide7();
		}

		



</script>


<body onload="initialState()">
<div class="body">
<form method="POST" action="">
	<table id="table">
		
		<tr><td><br>Marital Status</td><td><br>
			<select name="marital1">
			<option value="select">--select--</option>
			<option value="nevermarried">Unmarried</option>
			<option value="widow">Widow</option>
			<option value="divorced">Divorced</option>
			<option value="awaitingdiv">Awaiting Divorce</option>

		</select></td></tr>

		<tr><td><br>Religion</td><td><br>
			<select name="religion1">
			<option value="select">--select--</option>
			<option value="hindu">Hindu</option>
			<option value="christain">Christain</option>
			<option value="muslim">Muslim</option>
			<option value="buddhist">Buddhist</option>
			<option value="others">Others</option>

		</select></td></tr>

		

		<tr><td><br>Eating Habit</td><td><br>
				<input type="hidden" name="ehabit" value="">

				<input type="radio" name="ehabit" value="veg"> Veg
				<input type="radio" name="ehabit" value="non-veg"> Non-Veg</td></tr>


		<tr><td><br>State No.</td><td><br>
			<select name="state1" id="stateno" onchange="stateSelectHandler(this)" >
			<option value="0">--select--</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>

		</select></td></tr>
		<tr><td ><br>District</td><td  id="dist"><br>
			<select name="district1" id="state1">
			<option value="">--select--</option>
			<option value="taplejung">Taplejung</option>
			<option value="panchthar">Panchthar</option>
			<option value="ilam">Ilam</option>
			<option value="jhapa">Jhapa</option>
			<option value="sankhuwasava">Sankhuwasava</option>
			<option value="solukhumbhu">Solukhumbhu</option>
			<option value="bhojpur">Bhojpur</option>
			<option value="terathum">Terathum</option>
			<option value="sunsari">Sunsari</option>
			<option value="morang">Morang</option>
			<option value="udaypur">Udaypur</option>
			<option value="khotang">Khotang</option>
			<option value="okhaldhunga">Okhaldhunga</option>
			<option value="dhankuta">Dhankuta</option>

		</select>
		
			<select name="district2" id="state2">
				<option value="">--select--</option>
				<option value="saptari">Saptari</option>
				<option value="siraha">Siraha</option>
				<option value="mahottari">Mahottari</option>
				<option value="sarlahi">Sarlahi</option>
				<option value="dhanusa">Dhanusa</option>
				<option value="parsa">Parsa</option>
				<option value="bara">Bara</option>
				<option value="rautahat">Rautahat</option>
		    </select>


			<select name="district3" id="state3">
			<option value="">--select--</option>
			<option value="kathmandu">Kathmandu</option>
			<option value="lalitpur">Lalitpur</option>
			<option value="bhaktapur">Bhaktapur</option>
			<option value="kavrepalanchok">Kavrepalanchok</option>
			<option value="makwanpur">Makwanpur</option>
			<option value="nuwakot">Nuwakot</option>
			<option value="ramechhap">Ramechhap</option>
			<option value="rasuwa">Rasuwa</option>
			<option value="sindhuli">Sindhuli</option>
			<option value="sindhupalchowk">Sindhupalchowk</option>
			<option value="chitwan">Chitwan</option>
			<option value="dhading">Dhading</option>
			<option value="dolakha">Dolakha</option>
		</select>

			<select name="district4" id="state4" >
			<option value="">--select--</option>
			<option value="kaski">Kaski</option>
			<option value="gorkha">Gorkha</option>
			<option value="baglung">Baglung</option>
			<option value="lamjung">Lamjung</option>
			<option value="manang">Manang</option>
			<option value="mustang">Mustang</option>
			<option value="mayagdi">Mayagdi</option>
			<option value="parbat">Parbat</option>
			<option value="syangja">Syangja</option>
			<option value="tanahun">Tanahun</option>
			<option value="nawalpur">Nawalpur</option>
			
		</select>

			<select name="district5"  id="state5">
			<option value="">--select--</option>
			<option value="palpa">Palpa</option>
			<option value="banke">Banke</option>
			<option value="bardiya">Bardiya</option>
			<option value="dang">Dang</option>
			<option value="east rukum">East Rukum</option>
			<option value="gulmi">Gulmi</option>
			<option value="kapilvastu">Kapilvastu</option>
			<option value="nawalparasi">Nawalparasi</option>
			<option value="arghakhanchi">Arghakhanchi</option>
			<option value="pyuthan">Pyuthan</option>
			<option value="rolpa">Rolpa</option>
			<option value="rupandehi">Rupandehi</option>
			
		</select>
		
			<select name="district6" id="state6">
			<option value="">--select--</option>
			<option value="dolpa">Dolpa</option>
			<option value="dailekh">Dailekh</option>
			<option value="humla">Humla</option>
			<option value="jajarkot">Jajarkot</option>
			<option value="jumla">Jumla</option>
			<option value="kalikot">Kalikot</option>
			<option value="mugu">Mugu</option>
			<option value="salyan">Salyan</option>
			<option value="surkhet">Surkhet</option>
			<option value="west rukum">West Rukum</option>

			</select>

			<select name="district7" id="state7" >
			<option value="">--select--</option>
			<option value="achham">Achham</option>
			<option value="baitadi">Baitadi</option>
			<option value="bajhang">Bajhang</option>
			<option value="bajura">Bajura</option>
			<option value="dadeldhura">Dadeldhura</option>
			<option value="darchula">Darchula</option>
			<option value="doti">Doti</option>
			<option value="kailali">Kailali</option>
			<option value="kanchanpur">Kanchanpur</option>

		</select></td></tr>

		<tr><td><br>Horoscope</td><td colspan="2"><br>
			
		
			<select name="Horoscope">
			<option value="Select">--Select--</option>
			<option value="Aries">Aries</option>
			<option value="Taurus">Taurus</option>
			<option value="Gemini">Gemini</option>
			<option value="Cancer">Cancer</option>
			<option value="Leo">Leo</option>
			<option value="Virgo">Virgo</option>
			<option value="Libra">Libra</option>
			<option value="Scorpio">Scorpio</option>
			<option value="Sagittarius">Sagittarius</option>
			<option value="Capricorn">Capricorn</option>
			<option value="Aquarius">Aquarius</option>
			<option value="Pisces">Pisces</option>
	

		</select></td></tr>
		
		<tr><td><br>Education level</td><td><br>
			<select name="highest_education">
				<option value="">--Select--</option>
				<option value="any">Uneducated</option>
				<option value="Secondary">Secondary Level </option>
				<option value="Higher Secondary">Higher Secondary</option>
				<option value="Bachelor">Bachelor</option>
				<option value="Master">Master</option>
				<option value="P.HD">P.HD</option>
				<option value="diploma">Diploma</option>
				<option value="others">Others</option>
			</select></td></tr>
		
		
		
		<tr><td><br>Occupation</td><td><br>
		
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
	
		</select></td></tr>
		

	
	
		<tr><td><br>Annual Income&nbsp;</td><td><br>
		
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
			
		</select></td></tr>
			

	
        
          <tr><td><tr><td><td>  <input id="btn" type="submit" name="pdbtn" value="Next >>">
      
     </td><td></td></tr>

	</table>
   </form>	
  </div>
 </body>
</html>

_END;



?>