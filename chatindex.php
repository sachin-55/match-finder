<?php
include_once('conxn.php');
session_start();

$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];
    $chatroomid="";
//echo $email;

/////




/*



    	$sqlpre="Select * from connected where usereid1='$email'||usereid2='$email'";
	$resultpre = $conn->query($sqlpre);
if (!$resultpre) die ("Database access failed: " . $conn->error);
else{
   $rowspre = $resultpre->num_rows;
    echo $rowspre;
    echo "humm...";
if($rowspre==0)
{
	echo "humm no connected database exists...";
}
/////////////////////////////////////////////////////////////////////////
for ($j = 0 ; $j < $rows ; ++$j)
{
    $resultpre->data_seek($j);
    $row = $resultpre->fetch_array(MYSQLI_NUM);
   
   
if($rowpre[1]==$email)
  {
  	echo "iams";

  	$chatroomid=$rowpre[0];
       //creating chatroom after detecting connected
  	$chatroomname=$rowpre[2];
  	   //check in to chatroom before inserting..necessary
  	$prensql="select * from chatroom where chatroomid='$chatroomid' ";
  	$resultpresql = $conn->query($prensql);
if (!$resultpresql) die ("Database access failed: " . $conn->error);
else{
  
    $re = $resultpresql->num_rows;
    echo $re;

    if($re==0) ///if not found in chatroom
    {

        $today = date('h:i:s a m/d/Y  ', time());
    	echo "There exists no chatroom:So  its created ";

    	  $nosql="insert into chatroom(chatroomid,chat_name,chatuser,date_created)VALUES('$chatroomid','$chatroomname','$email', '$today') ";
    	 $resulltnosql = $conn->query($nosql);
if (!$resulltnosql) die ("Database access failed: " . $conn->error);


    }
    else{ };
}

}









}


/////////////////////////////////////////////////////////////////////////


    //$resultpre->data_seek(0);

    //$rowpre = $resultpre->fetch_array(MYSQLI_NUM);
    
    $chatroomid=$rowpre[0];
    echo $rowpre[0];
    	echo "iams";


  if($rowpre[1]==$email)
  {
  	echo "iams";

       //creating chatroom after detecting connected
  	$chatroomname=$rowpre[2];
  	   //check in to chatroom before inserting..necessary
  	$prensql="select * from chatroom where chatroomid='$chatroomid'";
  	$resultpresql = $conn->query($prensql);
if (!$resultpresql) die ("Database access failed: " . $conn->error);
else{
  
    $re = $resultpresql->num_rows;
    echo $re;

    if($re==0)
    {

        $today = date('h:i:s a m/d/Y  ', time());
    	echo "There exists no chatroom:So  its created ";

    	  $nosql="insert into chatroom(chatroomid,chat_name,chatuser,date_created)VALUES('$chatroomid','$chatroomname','$email', '$today') ";
    	 $resulltnosql = $conn->query($nosql);
if (!$resulltnosql) die ("Database access failed: " . $conn->error);


    }
    else{ };
}

}


 if($rowpre[2]==$email)
  {

  //	echo "ulalajsjjsjjjjjjjjjjjjjjjjjjjjjjjjlal";

       //creating chatroom after detecting connected
  	$chatroomname=$rowpre[1];
  	   //check in to chatroom before inserting..
  	$prensql="select * from chatroom where chatroomid='$chatroomid'";
  	$resultpresql = $conn->query($prensql);
if (!$resultpresql) die ("Database access failed: " . $conn->error);
else{
  
    $re = $resultpresql->num_rows;

    if($re==0)
    {

        $today = date('h:i:s a m/d/Y  ', time());
    	echo "There exists no chatroom:So created if connected";

    	 $nosql="insert into chatroom(chatroomid,chat_name,chatuser,date_created)VALUES('$chatroomid','$chatroomname','$email', '$today') ";
    	 $resulltnosql = $conn->query($nosql);
if (!$resulltnosql) die ("Database access failed: " . $conn->error);


    }
    else{ };
}


  }


}



    ////






*/


?>




<!DOCTYPE html>
<html>
<head>
	<title>Chat Room</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php include('chatassossaries.php'); ?>
<div class="container">
	<div class="row">
		<?php  include('chatlist.php'); ?>
	</div>
</div>



</body>

</html>

