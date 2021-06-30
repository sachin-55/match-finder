<?php 
	include('conxn.php');
	session_start();
	
	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];


		function first_search(){

			$sql_select="SELECT * FROM lookingfor 
		JOIN profileimage ON userr_l1.uid=profileimage.iid 
		WHERE email='$email' and uid='$uid'";
	
		$result=$conn->query($sql_select);

		if (!$result) die("Database Access Failed:".$conn->error);
		 else {
		
			$rows = $result->num_rows;
			if($rows>0)
		{
		while($row=$result->fetch_assoc()) 
	      { 
	         $name=ucfirst($row["usrname"]);
	         $gender=$row['gender'];
	         $phno=$row['phno'];
	         $year=$row["year"];
	         $month=$row["month"];
	         $day=$row["day"];
	         $lookfor=$row["lookfor"];

	         $filename=$row['filename'];
	         $location="upload/".$filename;

	         $now=time();
			$dob=strtotime("$year-$month-$day");
			$difference=$now-$dob;
			$age=floor($difference/31556926);

			$sign="";

		if($gender=="male"){
		$sign="Mr.";
		}
		else
		{
		$sign="Ms.";
		}	



	      }

		}
		
		}



			
		}

	


 ?>