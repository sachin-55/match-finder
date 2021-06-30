
<!DOCTYPE html>
<html>
<head>
	<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</body>
</html>




<?php include_once('conxn.php');

include('chatassossaries.php');

session_start();

//echo "hahah";
$myid=$_SESSION['email'];

//showing profile of connected users...

$sql="SELECT *  from connected where usereid1 ='$myid' || usereid2='$myid' ";
$result = $conn->query($sql);

if (!$result) die ("Database access failed: " . $conn->error);

else{
   
    $rows = $result->num_rows;
    
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
   
if($row[1]==$myid)
{   
    if(isset($_POST['btn']))
    {


    $d="delete from connected where usereid1='$row[1]' and usereid2='$row[2]'";
    $dresult = $conn->query($d);

if (!$dresult) die ("Database access failed: " . $conn->error);

   $u1="update request set statuseid1='0' where usereid1='$row[1]'and usereid2='$row[2]'";
   $u2="update request set statuseid2='0' where usereid1='$row[2]'and usereid2='$row[1]'";


    $u1result = $conn->query($u1);
if (!$u1result) die ("Database access failed: " . $conn->error);

     $u2result = $conn->query($u2);
if (!$u2result) die ("Database access failed: " . $conn->error);





    }

  $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[2]'";

      $select_result1=$conn->query($sql_select);
    $row2 = $select_result1->fetch_array(MYSQLI_NUM);

      if(!$select_result1) die("Database Access Failed:".$conn->error);
      else{ $d=$row2[1]; }
    echo<<<_END
       
       <form method="POST" action=""> 
  <pre><b>
   
 <a href= "viewprofile.php?pid=$row[2]" target='frame'> $d</a>                                           <input type="submit" name="btn" value="&#10060;DISCONNECT ">  
 
                                                
               


   </b><br></pre>
</form>

_END;
}
else 
{

if(isset($_POST['btn']))
    {


    $d="delete from connected where usereid1='$row[2]' and usereid2='$row[1]'";
    $dresult = $conn->query($d);

if (!$dresult) die ("Database access failed: " . $conn->error);

   $u1="update request set statuseid1='0' where usereid1='$row[2]'and usereid2='$row[1]'";
   $u2="update request set statuseid2='0' where usereid1='$row[1]'and usereid2='$row[2]'";


    $u1result = $conn->query($u1);
if (!$u1result) die ("Database access failed: " . $conn->error);

     $u2result = $conn->query($u2);
if (!$u2result) die ("Database access failed: " . $conn->error);
     




    }

  $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[1]'";

      $select_result2=$conn->query($sql_select);
    $row1 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result2) die("Database Access Failed:".$conn->error);
      else{ $e=$row1[1]; }


    echo<<<_END
<form method="POST" apache_child_terminate(oid)ion=""> 
    <pre><b>
   
 <a href= "viewprofile.php?pid=$row[1]" target='frame'> $e</a>                                            <input type="submit" name="btn" value="&#10060;DISCONNECT">


   </b><br></pre>
</form>

_END;

}


}







}


?>


