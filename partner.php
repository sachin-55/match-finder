<?php
	include('conxn.php');
   	include('sanitize.php');
   	session_start();

   	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];

		$name="";

	$sql_select="SELECT * FROM lookingfor
			WHERE lid='$uid'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else
			{
				$rows = $select_result->num_rows;
				if($rows>0)
				{
					while ($row=$select_result->fetch_assoc()) {
						$age1=$row['age1'];
						$age2=$row['age2'];

						$state=ucfirst($row['state']);
						$district=ucfirst($row['district']);
						$education=ucfirst($row['education']);
						$occupation=ucfirst($row['occupation']);
						$inc=$row['income'];
						$height=$row['heightf1']."' ".$row['heighti1']."'' to ".$row['heightf2']."' ".$row['heighti2']."''" ;
						$pstatus=ucfirst($row['physical']);
						$eating=ucfirst($row['eating']);
						$religion=ucfirst($row['religion']);
						$marital=ucfirst($row['interest']);
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

	if($state==0){
		$district="Any";
		$state="Any";
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

		<h2>Required Partner Details</h2>
		
		Age&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: From $age1 to $age2<br><br>
		State &emsp;&emsp;&emsp;&emsp;&ensp;&emsp;: $state<br><br>
		District &emsp;&emsp;&emsp;&ensp;&emsp;: $district<br><br>
		Education &emsp;&emsp;&emsp;&ensp;: $education<br><br>
		Occupation &emsp;&emsp;&emsp;: $occupation<br><br>
		Annual Income &ensp;&emsp;: $income<br><br>
		Height &emsp;&emsp;&emsp;&emsp;&emsp;: $height<br><br>
		Physical Status&emsp;&emsp;: $pstatus<br><br>
		Eating Habit&emsp;&emsp;&emsp;: $eating<br><br>
		Religion&emsp;&emsp;&emsp;&emsp;&ensp;: $religion<br><br>
		Marital Status&emsp;&ensp;&emsp;: $marital<br><br>
		Partner Description &emsp;&emsp;&ensp; 
		<div style="display:block;border:1px solid white;background-color:white;padding:5px;">$desc<br><br></div>
		


	</div>
</body>
</html>
_END;
?>