
<?php 
	include('conxn.php');
	include('sanitize.php');
  session_start();

   include_once('userfeedbacks.php');


	if (empty($_SESSION['UID']) OR $_SESSION['status']='0') {
				session_unset();
				session_destroy();
	header('location:index.php');
	}

	$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];
    $chatroomid="";


//echo "lololol";
		
$name=$gender=$phno=$month=$day=$year=$lookfor=$age=$sign=$location="";

		$sql_select="SELECT * FROM userr_l1 
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
	         $_SESSION['status']=$row['status'];
	         $status=$row['status'];

	        
	         $filename=$row['filename'];
	         $location="Upload/".$filename;

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

echo <<<_END


<html>
<head>
	<title>Match Finder Home page </title>
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div id="content">
 <body >	
  <header id="Header">
   <nav>
	<h1><a class="Match" href="home.php">MATCH FINDER</a></h1>
     <ul id="nav">
	   <li><a class="Home" href="recommendindex.php" target="frame">Home &ensp;&ensp;</a></li>
	   <li>
	   	   <div class="dropdown">
    		<div class="dropbtn"><a href="#">Profile &ensp;&ensp;</a> </div>
    		<div class="dropdown-content">
	    		<a href="profile.php" target="frame">My Profile</a>
	      		<a href="partner.php" target="frame">Partner Details</a>
       		</div>
       		</div>

	   </li>
	   <li><a class="Chat" href="chatindex.php" target="frame">Chat &ensp;&ensp;</a></li>
	   <li><a class="Notifications" href="notify.php" target="frame">Notifications &ensp;&ensp;</a></li>
	   <li>
	   		<div class="dropdown">
    		<div class="dropbtn"><a href="#">Settings &ensp;&ensp;</a> </div>
    		<div class="dropdown-content">
    		<a href="changepsw.php" target="frame">Change Password
      		<a href="editprofile.php" target="frame">Edit Profile</a>
      		<a href="editpartner.php" target="frame">Edit Partner Details</a>
      		<a href="deactivate.php" target="frame">Deactivate account</a>
    		</div>
    		</div>
        </li>
	   <li><a class="Logout" href="logout.php">Logout &ensp;&ensp;</a></li>	

	 </ul>
   </nav>
  </header>
	  
		<div id="left-sect">

				<div id="imgg">
				<img src=$location style="width:350px; margin-left:15px; height:350px; border:1px solid; border-radius:7px;">
				<a href="changeimage.php">Change Profile Picture</a><br>
				</div>

		<br><br>Name&nbsp;&nbsp; &emsp;&emsp;: $sign $name	<br><br>

			Email&emsp;&emsp;&emsp;: $email	<br><br>
			Contact No.  : $phno		<br><br>
			Looking for	&nbsp;: $lookfor	<br><br>
			Age&emsp;&emsp;&ensp;&nbsp;&emsp;: $age		<br><br>

		</div>




<div id="mid-sect">
	
	<iframe id="frame" src="recommendindex.php" name="frame" width="100%" height="100%" ></iframe>


</div>


<div id="right-sect">
	<div id="search">
	   <a href="Quicksearch.php" target="frame"> &#128270; Quick Search </a> <br><br>
	   <a href="customizesearch.php" target="frame" > &#128270; Customize Search </a> <br><br>
	   <a href="location_search.php" target="frame"> &#128270; Search by Location </a> <br><br>
	   <a href="family_search.php" target="frame" > &#128270; Search by Family Details </a><br><br>
	  
	</div>  
</div> 

<div id="footer">
	<a href="contactus.php" >Contact us</a>&ensp;&ensp;&ensp; 
	<a href="aboutus.php">About us</a> 
	
	<br><br>
	<div id="copy">Copyright &copy MatchFinder 2018</div>
</div>


  </body>
 </div>
</html>

_END;

?>