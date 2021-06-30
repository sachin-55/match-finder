<?php include('header.php');
       include('sanitize.php'); 
         
          ?>
<?php


//echo '<br><span style="color:red"><b>MESSAGE ALERTS here...</b></span><br>';
//echo $_SESSION['UNAME'] ;
$mongo=$_SESSION['UNAME'] ;

$sid= $_SESSION['IDDD'];
if(empty($sid)) echo 'owo not';
$query2 = "SELECT * FROM userr_l1 where email='$mongo'";
$result = $conn->query($query2);
if (!$result) die ("Database access failed: " . $conn->error);
   $result->data_seek($sid);
    $row = $result->fetch_array(MYSQLI_NUM);


/*echo <<<_END
<pre>
     sid:$sid
  USERID:$row[0] 
  UNAME:$row[1]
 email:$row[3]
</pre>
_END;*/



//echo $_SESSION['IDDD'] ;
/*
echo "<p>Your session ID is ".session_id().".</p>";

echo '<pre><span style="color:gray"><i><h58> WELCOME to our match making project.., ';

if(!empty(($_SESSION['NEW'])))
{
  echo 'WELCOME NEW USER LETS BEGIN...>';
}

*/
echo <<<_END


<html>
<head>
  <title>Match Finder Home page </title>
  <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
  <header>
     <nav>
      <h1><a class="Match" href="index.php">MATCH FINDER</a></h1>
     <ul id="nav">
      <li><a class="Home" href="index.php">HOME</a></li>
      <li><a class="About" href="about.php">ABOUT US</a></li>
      <li><a class="Contact" href="contact.php">CONTACT US</a></li>
     </ul>
     </nav>
     <div id="search">
     <input type="text" name="search" placeholder="Search...">
     <button type="submit"><i class="searchbtn"></i>&#128269;</button>
      <a href="logout.php"><h3>LOGOUT</h3></a>
     </div>
  </header>


  <div class="divider"></div>
  <div class="img1">
  <br>USER INFO:<br>
    sid:$sid<br>
  USERID:$row[0] <br>
  UNAME:$row[1]<br>
 email:$row[3]<br>

  </div>
</body>
</html>




_END;

   ?>