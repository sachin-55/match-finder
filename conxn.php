<?php
$conn = new mysqli('localhost','root', '', 'partsdb');
//session_start();
//ini_set('session.gc_maxlifetime', 60 * 60 * 24);
if ($conn->connect_error)  {
  die($conn->connect_error);
}
?>
