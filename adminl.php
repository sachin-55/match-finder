
<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
/*---------------------------inside functions-------------------------

-----------------------------------------------------------------------*/
$conn->close();

function mysql_fix_string($conn, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $conn->real_escape_string($string);
}
function get_post($conn, $string)
{
return htmlentities(mysql_fix_string($conn, $string));
}

   ?>