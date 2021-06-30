
<?php

include('conxn.php');
session_start();
if ($_SESSION['logged']==false) {
	header('location:index.php');
}
if ($_SESSION['logged']==true and $_SESSION['track']=="8") {
	header('location:home.php');
}
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

		$name=$email1=$year=$month=$gender=$day=$lookfor=$phno="";

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
         $email1=$row["email"];
         $year=$row["year"];
         $month=$row["month"];
         $day=$row["day"];
         $lookfor=$row["lookfor"];
         $phno=$row["phno"];
         $gender=$row["gender"];
    

      }

	}
	
}

//$name1=strstr($name," ",true);
//echo $name1;

$now=time();
$dob=strtotime("$year-$month-$day");
$difference=$now-$dob;
$age=floor($difference/31556926);



$name2=explode(" ", $name);

$sign="";

if($gender=="male"){
	$sign="Mr.";
}
else
{
	$sign="Ms.";
}


if(isset($_POST['next']))
{

$_SESSION['track']="2";

header('location:personaldetails.php');

}


echo <<<_END


<html>
<head>
	<title>Login_Success</title>
	<link rel="stylesheet" type="text/css" href="CSS/success1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="login_success">
		<span>Welcome to "Match Finder"   $sign $name2[0]. <br>Information you provided here are : </span>
	</div>	

	<div id="details">
		
				Email&emsp;&emsp;&emsp;&emsp;: $email1	<br><br>
				Phone number&ensp;: $phno		        <br><br>
				Age &emsp;&emsp; &emsp;&emsp; : $age	<br><br>
				Looking for	&emsp; : $lookfor	        <br><br>
	</div>	
	<br>
	<div class="btn">
		<form method ="POST" action="">
		
			<input type="submit" name="next" value="NEXT >>">
			
	    </form>

	</div>

 </body>
</html>

_END;

?>