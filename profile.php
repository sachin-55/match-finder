<?php
	include('conxn.php');
   	include('sanitize.php');
   	session_start();

   	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];

		$name="";

	$sql_select="SELECT * FROM userr_l1
			JOIN physical ON userr_l1.uid=physical.pid
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			JOIN family ON userr_l1.uid=family.fid
			WHERE userr_l1.uid='$uid' and userr_l1.email='$email'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else
			{
				$rows = $select_result->num_rows;
				if($rows>0)
				{
					while ($row=$select_result->fetch_assoc()) {
						$name=$row['usrname'];
						$state=ucfirst($row['state']);
						$district=ucfirst($row['district']);
						$education=ucfirst($row['education']);
						$occupation=ucfirst($row['occupation']);
						$inc=$row['annualincome'];
						$hobby=ucfirst($row['hobby']);
						$height=$row['height1']."' ".$row['height2']."''";
						$weight=$row['weight']." kg";
						$complexion=ucfirst($row['complexion']);
						$gender=ucfirst($row['gender']);
						$btype=ucfirst($row['body']);
						$blood=$row['bloodg']." ".$row['bloods'];
						$pstatus=ucfirst($row['physical']);
						$eating=ucfirst($row['eating']);
						$horoscope=ucfirst($row['horoscope']);
						$religion=ucfirst($row['religion']);
						$marital=ucfirst($row['marital']);
						$ftype=ucfirst($row['familytype']);
						$fstatus=ucfirst($row['familystatus']);
						$fvalue=ucfirst($row['familyvalue']);
						$nobrother=ucfirst($row['bronum']);
						$nosis=ucfirst($row['sisnum']);
						$bromarr=ucfirst($row['bromarried']);
						$sismarr=ucfirst($row['sismarried']);
						$desc=ucfirst($row['description']);


						

						if($inc=="no"){
							$income="No Income";
						}
						else if($inc=="-250k"){
							$income="Under RS.250,000";
						}
						else if($inc=="250-500k"){
							$income="RS.250,000-500,000";
						}
						else if($inc=="500-1000k"){
							$income="Rs.500,000-1,000,000";
						}
						else if($inc=="10lc-20lc"){
							$income="Rs.1,000,000-2,000,000";
						}
						else if($inc=="20lc-30lc"){
							$income="Rs.2,000,000-3,000,000";
						}
						else if($inc=="30lc-40lc"){
							$income="Rs.3,000,000-4,000,000";
						}
						else if($inc=="40lc-50lc"){
							$income="Rs.4,000,000-5,000,000";
						}
						else if($inc=="+50lc"){
							$income="Above Rs.5,000,000";
						}
						else{
							$income="Not Mentioned";
						}



					}

				}

			}

	$sign="";

if($gender=="Male"){
	$sign=" Mr.";
}
else
{
	$sign=" Ms.";
}


echo <<<_END

<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="CSS/setting.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="profile">

		<h2>Your Profile Details</h2>
		
		Name &emsp;&emsp;&emsp;&emsp;&emsp;: $sign $name<br><br>
		Gender &emsp;&emsp;&emsp;&emsp;&ensp;: $gender <br><br>
		State &emsp;&emsp;&emsp;&emsp;&ensp;&emsp;: $state<br><br>
		District &emsp;&emsp;&emsp;&ensp;&emsp;: $district<br><br>
		Education &emsp;&emsp;&emsp;&ensp;: $education<br><br>
		Occupation &emsp;&emsp;&emsp;: $occupation<br><br>
		Annual Income &ensp;&emsp;: $income<br><br>
		Hobby &emsp;&emsp;&emsp;&emsp;&emsp;: $hobby<br><br>
		Height &emsp;&emsp;&emsp;&emsp;&emsp;: $height<br><br>
		Weight &emsp;&emsp;&emsp;&emsp;&emsp;: $weight<br><br>
		Complexion &emsp;&emsp;&emsp;: $complexion<br><br>
		Body Type &emsp;&emsp;&ensp;&emsp;: $btype<br><br>
		Blood Group&emsp;&emsp;&emsp;: $blood<br><br>
		Physical Status &emsp;&emsp;: $pstatus<br><br>
		Eating Habit &emsp;&emsp;&emsp;: $eating<br><br>
		Horoscope&emsp;&emsp;&emsp;&emsp;: $horoscope<br><br>
		Religion&emsp;&emsp;&emsp;&emsp;&emsp;: $religion<br><br>
		Marital Status &emsp;&ensp;&emsp;: $marital<br><br>
		Family Type &emsp;&emsp;&emsp;: $ftype<br><br>
		Family Status &emsp;&ensp;&emsp;: $fstatus<br><br>
		Family Value&emsp;&emsp;&emsp;: $fvalue<br><br>
		Number Of Brother&ensp;: $nobrother<br><br>
		Number Of Sister &emsp;: $nosis<br><br>
		Brother Married &emsp;&ensp;: $bromarr<br><br>
		Sister Married&emsp;&emsp;&ensp;: $sismarr<br><br>
		About Family &emsp;&emsp;&ensp; 
		<div style="display:block;border:1px solid white;background-color:white;padding:5px;">$desc<br><br></div>
		


	</div>
</body>
</html>
_END;
?>