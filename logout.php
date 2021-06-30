<?php
include('conxn.php');
//$conn->close();
session_start();

$uemail=$_SESSION['email'];
 $dql="delete  from matches where userid='$uemail'";
     $re = $conn->query($dql);
if (!$re) die ("Database access failed: " . $conn->error);


$conn->close();
session_start();
session_unset();
session_destroy();

//$_SESSION['logged']=false;
header('location:index.php');


?>