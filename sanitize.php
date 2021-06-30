<?php
$conn = new mysqli('localhost','root', '', 'partsdb');
function mysql_fix_string($conn, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $conn->real_escape_string($string);
}


function get_post($conn, $string)
{
return htmlentities(mysql_fix_string($conn, $string));
}

function get_post_pw($string)
{
	$salt1='1#@#$%3';
	$salt2='#@!~5sa';

   return hash('ripemd128', "$salt1$string$salt2");

}
?>