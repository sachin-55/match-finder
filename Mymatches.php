<?php 
include('conxn.php');
include('sanitize.php');


 session_start();

  	$id_count = array();
  	$id = array();
  	$match_count = array();

	if ($_SESSION['logged']==false) {
	header('location:index.php');
	}
	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];

		$age1=$age2=$religion=$education=$occupation=$income=$lookgender=$state=$district=$heightf1=$heightf2=$heighti2=$heighti1="";

		$sql_select="SELECT * FROM lookingfor
		JOIN userr_l1 ON userr_l1.uid=lookingfor.lid
		 WHERE lid='$uid'";
		$select_result=$conn->query($sql_select);

		if(!$select_result) die("Database Access Failed:".$conn->error);

		else{
			$rows = $select_result->num_rows;

				if($rows>0)
				{
					while($row=$select_result->fetch_assoc()) 
				     { 
				         $age1=$row["age1"];
				         $age2=$row['age2'];
				         $religion=$row['religion'];
				         $education=$row["education"];
				         $occupation=$row["occupation"];
				         $income=$row["income"];
				         $state=$row["state"];
				         $district=$row["district"];
				         $heightf1=$row["heightf1"];
				         $heightf2=$row["heightf2"];
				         $heighti2=$row["heighti2"];
				         $heighti1=$row["heighti1"];
				         $lookgender=$row['lookfor'];
				         	
				      }
				}
			}
	
		$sql_select="SELECT * FROM userr_l1 
		JOIN personal_details ON userr_l1.uid=personal_details.uid
		JOIN physical ON userr_l1.uid=physical.pid
		WHERE gender='$lookgender' AND (religion='$religion' AND education='$education' AND occupation='$occupation' AND annualincome='$income' AND state='$state' AND district='$district' AND (height1>='$heightf1' AND height1<='$heightf2') AND (height2>='$heighti1' AND height2<='$heighti2'))";
	
		$result=$conn->query($sql_select);

		if (!$result) die("Database Access Failed:".$conn->error);

		else{
				$j=0;
				$rows = $result->num_rows;
				if($rows>0){
						while($row=$result->fetch_assoc()) 
	      				{	$match_count[$j]=0;
	      					for ($i=0; $i <$rows ; $i++) {
	      						$id_count[$i]=$row['uid'];
	      						$id[$j]=$id_count[0];
	      						$match_count[$j]+=1;


	      					}
	      				$j++;
	      				}
				}	
		}
	
		
		
$total=$j;





echo <<<_END

<html>
<head>
	<title>My Matches</title>
	<link rel="stylesheet" type="text/css" href="CSS/Mymatches.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
_END;
	
	for($i=0;$i<$total;$i++){



			$sql_select="SELECT * FROM userr_l1 
				JOIN personal_details ON userr_l1.uid=personal_details.uid 
				JOIN family ON userr_l1.uid=family.fid 
				WHERE userr_l1.uid='$id[$i]'";
	$result=$conn->query($sql_select);
	if (!$result) die("Database Access Failed:".$conn->error);
	 else {
	
		$rows = $result->num_rows;
		if($rows>0)
	{
	while($row=$result->fetch_assoc()) 
      { 
          $name=ucfirst($row["usrname"])	;
          $gender=$row['gender'];
           $phno=$row['phno'];
           $year=$row["year"];
         $month=$row["month"];
         $day=$row["day"];
         $lookfor=$row["lookfor"];
         $education=$row["education"];
         $occupation=$row["occupation"];
         $Description=$row["description"];


         $now=time();
		$dob=strtotime("$year-$month-$day");
		$difference=$now-$dob;
		$age=floor($difference/31556926);

			$sign="";

if($gender		=="male"){
	$sign="Mr.";
}
else
{
	$sign="Ms.";
}

      }

	}
	
}



echo <<<_END
	<div class="content">

	  <div class="body">
	  $match_count[$i] parameters matched.<br>
		Name= $sign$name<br><br>
		Age= $age <br><br>
		Education= $education<br><br>
		Occupation= $occupation <br><br>
		Description=  $Description<br><br>
		</div>
	<div class="img">
			<img src="Photos/a.gif">
		</div><br>
		<div class="btn">
			<input type="submit" name="submit" value="Show Interest" >
		</div>
	  
	</div>
_END;
}
echo <<<_END

	
</body>

</html>

_END;
 ?>
