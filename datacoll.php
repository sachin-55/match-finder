
<?php
include('conxn.php');
//vitra vitrai hune kura hun
$opvalue = array( array());
$privalue=  array( array());
$user=array();

$sql="SELECT * from user_views ";
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);
/*
else{
   
    $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

$user[$j]=$row[0];//for user

  }
}
*/

$rows=$result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
  
  for($i=1;$i<=5;$i++)
  {
$privalue[$j][$i]=$row[$i]; //for priority
}  
}



for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
  
  for($i=6;$i<=15;$i++)
  {
$opvalue[$j][$i]=$row[$i];  //for opinions
}  
}



//var_dump($user);
//echo "<br>-----------------------------------------------------------------";
/*

//var_dump($opvalue);
echo "<br>";
var_dump($privalue);




 //list of users:-
$a="sakar";
$b="sachin";
$c="utsab";
$d="sandesh";
$e="newuser";
$f="sahil";
$g="testuser";

//list of opinion topics:-
$O1="I am at ease talking to people";
$O2="I make plans and stick to them";
$O3="I like this period of my life";
$O4="I get upset easily";
$O5="I am not interested in abstract ideas";
$O6="I do not hurt people I love";
$O7="I am willing to compromise";
$O8="I carry the conversation to a higher level";
$O9="I share a lot moments with closed ones";
$O10="I argue with people I care about";



//list of preference priority:-
$T1="Better physical outlook ";
$T2="Good family and cultural backgrounds";
$T3="Successful in carrier and jobs";
$T4="Common interest and hobbies";
$T5="Good lifestyle and habits";


$t=array( 

   '1' =>'Better physical outlook' ,
   '2' => 'Good family and cultural backgrounds',
   '3' => 'Successful in carrier and jobs' ,
   '4' => 'Common interest and hobbies' ,
   '5' => 'Good lifestyle and habits'

);
















$opinions =  array(
                
    $a => array(              $O1 => 2, 
                                $O2 => 3,
                                 $O3 => 3, 
                                 $O4 => 4,
                               $O5 => 2,
                               $O6 => 3,  
                               $O7 => 3,    
                               $O8 => 5,
                               $O9 => 4, 
                               $O10 => 5),



    $b => array(              $O1 => 2, 
                                $O2 => 4,
                                 $O3 => 3, 
                                 $O4 => 4,
                               $O5 => 5,
                               $O6 => 3,  
                               $O7 => 2,    
                               $O8 => 5,
                               $O9 => 3, 
                               $O10 => 5),

    
    $c => array(             $O1 => 2, 
                                $O2 => 3,
                                 $O3 => 2, 
                                 $O4 => 4,
                               $O5 => 2,
                               $O6 => 3,  
                               $O7 =>2,    
                               $O8 => 5,
                               $O9 => 2, 
                               $O10 => 5),
    
    $d => array(              $O1 => 2, 
                                $O2 => 3,
                                 $O3 => 3, 
                                 $O4 => 4,
                               $O5 => 3,
                               $O6 => 3,  
                               $O7 => 3,    
                               $O8 => 3,
                               $O9 => 4, 
                               $O10 => 4),

    
    $e =>array(               $O1 => 2, 
                               // $O2 => 3,
                                 $O3 => 3, 
                                 $O4 => 4,
                               //$O5 => 1,
                               $O6 => 3,  
                             //  $O7 => 2,    
                               $O8 => 5,
                               //$O9 => 1, 
                               $O10 => 5),

    $f => array(              $O1 => 2, 
                                $O2 => 1,
                                 $O3 => 3, 
                                 $O4 => 4,
                               $O5 => 2,
                               $O6 => 3,  
                               $O7 => 4,    
                               $O8 => 5,
                               $O9 => 3, 
                               $O10 => 1),
    
    $g => array(              $O1 => 2, 
                                $O2 => 3,
                                 $O3 => 1, 
                                 $O4 => 3,
                               $O5 => 2,
                               $O6 => 3,  
                               $O7 => 2,    
                               $O8 => 5,
                               $O9 => 2, 
                               $O10 => 5 )

  );
echo "<br>";
var_dump($opinions);
//////////////////////////////////////////////////////////////////////////////////////////////////
$priority =  array(
                
    $a => array(              $T1 => 2, 
                                $T2 => 3,
                                 $T3 => 4, 
                                 $T4 => 5,
                               $T5 => 1),



    $b => array(               $T1 => 4, 
                                $T2 => 3,
                                 $T3 => 2, 
                                 $T4 => 1,
                               $T5 => 5),

    
    $c => array(             $T1 => 5, 
                                $T2 => 4,
                                 $T3 => 3, 
                                 $T4 => 2,
                               $T5 => 1),

    
    $d => array(              $T1 => 3, 
                                $T2 => 4,
                                 $T3 => 5, 
                                 $T4 => 1,
                               $T5 => 2),


    
    $e =>array(               $T1 => 1, 
                                $T2 => 2,
                                 $T3 => 3, 
                                 $T4 => 4,
                               $T5 => 5),


    $f => array(              $T1 => 5, 
                                $T2 => 4,
                                 $T3 => 3, 
                                 $T4 => 2,
                               $T5 => 1),

    $g => array(             $T1 =>5, 
                                $T2 =>4,
                                 $T3 =>3, 
                                 $T4 =>2,
                               $T5 =>1)

  );
echo "<br>lllllllllllllllllllllllllllollllllllllllllllllllollllllllllllllllllllllllll";
var_dump($priority);
*/

?>