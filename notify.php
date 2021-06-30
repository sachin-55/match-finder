<!DOCTYPE html>
<html>
<head>
	<body>
                   <meta http-equiv="refresh" content="25" > 
        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        

<link rel="stylesheet" type="text/css" href="CSS/setting.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</body>
</html>


<?php
include('conxn.php');
session_start();


$userid=$_SESSION['UID']; 
$useremail=$_SESSION['email'];
$user="";
////////////find username from uid/////////////////

$find="SELECT * from userr_l1 where email='$useremail'";
$resu=$conn->query($find);
if (!$resu) die ("Database access failed: " . $conn->error);
else
{
  $rs = $resu->num_rows;
   $resu->data_seek(0);
    $rw = $resu->fetch_array(MYSQLI_NUM);

    $user=$rw[1];
}


//////////////////////////////////////////////////find available request from users//////////////


$seek="select * from request where usereid1='$useremail'||usereid2='$useremail'";
  $r=$conn->query($seek);
if (!$r) die ("Database access failed: " . $conn->error);
else
{



    $rowsss = $r->num_rows;

for ($k = 0 ; $k < $rowsss ; ++$k)
{
    $r->data_seek($k);
    $rowa = $r->fetch_array(MYSQLI_NUM);

   

    if($rowa[1]==$useremail and $rowa[4]==1 and $rowa[3]==0)

{       $find1="SELECT * from userr_l1 where email='$rowa[2]'";
        $resu1=$conn->query($find1);
      if (!$resu1) die ("Database access failed: " . $conn->error);
      else
      {
        
        $rw1 = $resu1->fetch_array(MYSQLI_NUM);

        $email1=$rw1[1];
      }

        echo<<<_END
      <div class="notice">
        <a href="reqlist.php"> Hi $user,match finder user $email1 has sent you a interest request.</a> 
      </div>
_END;
  

}


 //$rowa[2]== '$useremail' and $rowa[3]==1 and $rowa[4]==0
   if($rowa[2]==$useremail and $rowa[3]==1 and $rowa[4]==0)
{
	//echo "lol";
 $find2="SELECT * from userr_l1 where email='$rowa[1]'";
        $resu2=$conn->query($find2);
      if (!$resu2) die ("Database access failed: " . $conn->error);
      else
      {
        
        $rw2 = $resu2->fetch_array(MYSQLI_NUM);

        $email2=$rw2[1];
      }

	 echo<<<_END
      <div class="notice">
       <a href="reqlist.php">
          Hi $user,match finder user $email2 has sent you a interest request.</a>
      </div>
_END;


 }
}
      
    }

//////////////////////////////////////////////////

$notice="SELECT * FROM notify where userid='$userid' order by dnt desc";
$res=$conn->query($notice);
if (!$res) die ("Database access failed: " . $conn->error);
else
{

     
    $rows = $res->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $res->data_seek($j);
    $row = $res->fetch_array(MYSQLI_NUM);

   $senderid="";
   ////////////find sender name from senderid////////////


   $sender="";

   /////////////////////////////////////////
            //////////seek request table for users request/////////////


    /////////////////////////////////////////////////////////////////////////////////////


    if($row[0]=="Request_sent")
    {
      

    	 echo<<<_END
      <div class="notice">
        <a href="reqlist.php"> <h6>
          $row[1]
      </div>
_END;


    }

    if($row[0]=="Connected")
    {
    	 echo<<<_END
      <div class="notice">
        <a href="chatindex.php">
        $row[1]
        Start communicating now.</a>
      </div>
_END;

    }
  }
}

?>