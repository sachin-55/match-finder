<?php
include("conxn.php");

if($_SESSION["email"]==""||$_SESSION['NEW']=""||$_SESSION['UID']=""){
	header("location:loginn.php");
}

?>