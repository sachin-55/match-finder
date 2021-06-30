
<?php
include('conxn.php');
   include('sanitize.php');
session_start();
///TRY FORM MATRAI HO ....THIS SHOULD BE INCLUDED IN FORM FILLING PROCESS..
require_once("recommendfunc.php");
//require_once("datacoll.php");
require_once('datacoll.php');


$email=$_SESSION['email'];
$uid=$_SESSION['UID'];

if(isset($_POST['submit']))
{
	$user=$_SESSION['email'];
	$T1=$_POST['p1'];
	$T2=$_POST['p2'];
	$T3=$_POST['p3'];
	$T4=$_POST['p4'];
	$T5=$_POST['p5'];
    $O1=$_POST['opt1'];
    $O2=$_POST['opt2'];
    $O3=$_POST['opt3'];
    $O4=$_POST['opt4'];
    $O5=$_POST['opt5'];
    $O6=$_POST['opt6'];
    $O7=$_POST['opt7'];
    $O8=$_POST['opt8'];
    $O9=$_POST['opt9'];
    $O10=$_POST['opt10'];


    $re = new Recommend();




/////////////recommending the blank choices//////////////////////////////////////



   



    /////////////////////////////////////////////////////////////

    //$gen=$_POST['sel'];//yo form bata 

$sql_select="SELECT * FROM userr_l1 where uid='$uid'";

$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{

				$rows = $select_result->num_rows;
				
				if($rows>0)
				{
					while($row=$select_result->fetch_assoc())
					{
						$gen=$row['gender'];
					}
				}
}

if($gen=='male'){
	$gen='M';
}else{
	$gen='F';
}


$sql=" INSERT INTO user_views(userid,T1,T2,T3,T4,T5,O1,O2,O3,O4,O5,O6,O7,O8,O9,O10,gender,oid) VALUES ('$email','$T1','$T2','$T3','$T3','$T4','$O1','$O2','$O3','$O4','$O5','$O6','$O7','$O8',
'$O9','$O10','$gen','$uid')  ";
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);
else{

header('location:photoupload.php');

/*

 if(is_null($O1)||is_null($O2)||is_null($O3)||is_null($O4)||is_null($O5)||is_null($O6)||is_null($O7)||is_null($O8)||is_null($O9)||is_null($O10))
    {


    	echo "i have to recommend there exists some null value";
    	$userindex="";
/*
$sql="SELECT * from user_views";  
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);
else{
   
   
    $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
   
if($row[0]==$email)
{   $userindex=$j;

	}


}

//echo "<br>";
//echo $userindex;
//echo "<br>";
//print_r($opvalue);

//echo "RECOMMENDED:<br>";

//print_r($opvalue);
//print_r($re->getRecommendations($opvalue,'15'));




}
   
*/



}







    	
    	

//

    

}


//}






?>


<html>
<head>
	<title>Matching Priority</title>
	<link rel="stylesheet" type="text/css" href="CSS/priority.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form method="POST" action="">
	<h1>Share Your few Views and Opinions Here...</h1>
	
	<div id="select">
	<table>
		Choose and Rank the following options with your desire !!! 
	<tr><td> <u>Options  </u></td> <td> <u>Priority Order</u></td></tr>
	  
	    <tr><td> Education and Job</td><td>

	  <select name="p1">
	    	<option value="">--Select--</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td></tr>
		<br>
		 <tr><td>
		 Family and Culture</td><td>
		<select name="p2">
			<option value="">--Select--</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td></tr>
		<br>
		 
		 <tr><td> Interests and Hobby</td><td>
		<select name="p3">
			<option value="">--Select--</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td></tr>
		<br>
		  
		 <tr><td>Lifestyle and Habits</td><td>
		<select name="p4">
			<option value="">--Select--</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td></tr>
		<br>
		 
		  <tr><td>Physical Outlook <td>
		<select name="p5">
			<option value="">--Select--</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select></td></tr>

	</table>
	</div>
	<div id="list">
		
		<nav>
			<ul>
				<div id="options">

					<li>Always True</li> &emsp;&emsp;
					<li> Mostly True</li>&emsp;
					<li>Sometimes True Or Sometimes False </li>
					<li>Mostly False</li>
					<li>Always False</li>
				</div>
			</ul>
		</nav>

				<div id="radio">
				&emsp;&emsp;	
					<input type="radio" name="opt1" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt1" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt1" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt1" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt1" value="5">&emsp;&emsp;
					<br><br>&emsp;&emsp;	
					<input type="radio" name="opt2" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt2" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt2" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt2" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt2" value="5">&emsp;&emsp;
					<br><br>
					&emsp;&emsp;	
					<input type="radio" name="opt3" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt3" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt3" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt3" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt3" value="5">&emsp;&emsp;
					<br><br>&emsp;&emsp;
					<input type="radio" name="opt4" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt4" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt4" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt4" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt4" value="5">&emsp;&emsp;
					<br><br>&emsp;&emsp;	
					<input type="radio" name="opt5" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt5" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt5" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt5" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt5" value="5">&emsp;&emsp;
					<br><br>
					&emsp;&emsp;	
					<input type="radio" name="opt6" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt6" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt6" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt6" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt6" value="5">&emsp;&emsp;
					<br><br>
					&emsp;&emsp;	
					<input type="radio" name="opt7" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt7" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt7" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt7" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt7" value="5">&emsp;&emsp;
					<br><br>&emsp;&emsp;	
					<input type="radio" name="opt8" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt8" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt8" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt8" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt8" value="5">&emsp;&emsp;
					<br><br>
					&emsp;&emsp;	
					<input type="radio" name="opt9" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt9" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt9" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt9" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt9" value="5">&emsp;&emsp;
					<br><br>
					&emsp;&emsp;
					<input type="radio" name="opt10" value="1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt10" value="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt10" value="3">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt10" value="4">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<input type="radio" name="opt10" value="5">&emsp;&emsp;

					
				</div>

				<div id="text">	
					
					I am at ease talking to people. <br><br>
					I make plans and stick to them.<br><br>
					I like this period of my life.<br><br>
					I get upset easily.<br><br>
					I am not interested in abstract ideas.<br><br>
					I do not hurt people whom I love.<br><br>
					I am willing to compromise.<br><br>
					I carry the conversation to a higher level.<br><br>
					I share a lot moments with closed ones.<br><br>
					I argue with people I care about.						
				</div>
				<br>
	</div>
	<div id="btn">
		<input type="submit" name="submit" value="Finish">
	</div>
</form>
</body>
</html>


