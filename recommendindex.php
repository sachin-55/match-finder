<?php
include('conxn.php');
session_start();
require_once("recommendfunc.php");
//require_once("datacoll.php");
include('datacoll.php');




$usernew=$_SESSION['UID']; 
 
 //$usernew="13";
 $usersex="";
 $useropposex="";
 $useremail=$_SESSION['email'];
 

  
$userindex="";
$total="";

//$your=$_POST['hid'];

///////////////////////////////////interested button functionality...../////////////////////////

if(isset($_POST['interest']))
    {



          $my=$_SESSION['email'];
          $your=$_POST['hid'];
          $user="";
          $you="";
          ////////////taking my names and id////////////////////
            $find="SELECT * from userr_l1 where email='$my'";
$resu=$conn->query($find);
if (!$resu) die ("Database access failed: " . $conn->error);
else
{
  $rs = $resu->num_rows;
   $resu->data_seek(0);
    $rw = $resu->fetch_array(MYSQLI_NUM);

    $user=$rw[1];
}

           ///////////////////taking your names and id////////////////////////

 $findu="SELECT * from userr_l1 where email='$your'";
$resuu=$conn->query($findu);
if (!$resuu) die ("Database access failed: " . $conn->error);
else
{
  $rsu = $resuu->num_rows;
   $resuu->data_seek(0);
    $rwu = $resuu->fetch_array(MYSQLI_NUM);

    $you=$rwu[1];
}



          ////////////////////////////////////////////

          $yourid="13";

           $sqlpre="select * from request where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my')";
           $resultpre = $conn->query($sqlpre);
           if (!$resultpre) die ("Database access failed: " . $conn->error);
else{
  // echo $your;

    $rowspre = $resultpre->num_rows;
   // echo $rowspre;
   if($rowspre==0)
   {
   

            echo <<<_END
            <span style="color:green"><b>Your interest request have been sent successfully...</b></span>
_END;
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);
     $dnt=$today = date('h:i:s a m/d/Y  ', time());
     $msg="Hi " .$user." your interest request have been successfully sent to  match finder user ".$you;
$sqlnotify="insert into notify(notice_type,MSG,userid,notifierid,dnt) VALUES ('Request_sent','$msg','$usernew','$yourid','$dnt')";
   $nresult = $conn->query($sqlnotify);
     if (!$nresult) die ("Database access failed: " . $conn->error);

       
   }

    $resultpre->data_seek(0);
    $rowpre = $resultpre->fetch_array(MYSQLI_NUM);
    
      
       if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[3]==1)
        {

            
             
    echo <<<_END
    <span style="color:green"><b>Dear user $user , you have already shown interest request to this user</b></span>  
_END;

        }

        if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[4]==1)
        {
             $s="update request set statuseid1='1' where usereid1='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo <<<_END
     <span style="color:green"><b>Now you have been successfully connected with $you <b> </span>
_END;

        $sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    echo $rowspre;
    if($rowsconn==0) //nothing in db
    {


        //insert into connected db
        $inconn="insert into connected(usereid1,usereid2) VALUES ('$my','$your')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);

     $dnt=$today = date('h:i:s a m/d/Y  ', time());
     $msg="Hi " .$user. ",your  have been successfully connected to match finder user " .$you;
$sqlnotify="insert into notify(notice_type,MSG,userid,notifierid,dnt) VALUES ('Connected','$msg','$usernew','$yourid','$dnt')";
   $nresult = $conn->query($sqlnotify);
     if (!$nresult) die ("Database access failed: " . $conn->error);





    }


}


        }

        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[3]==1)
        {
            
             $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo<<<_END
     <span style="color:green"><b> Now you have been successfully connected with $you </b></span>
_END;

$sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    echo $rowspre;
    if($rowsconn==0) //nothing in db
    {

        //insert into connected db

        $today = date('h:i:s a m/d/Y  ', time());
        $inconn="insert into connected(usereid1,usereid2,date_created) VALUES ('$my','$your','$today')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);


     $dnt=$today = date('h:i:s a m/d/Y  ', time());
     $msg="Hi " .$user. ", your  have been successfully connected to  match finder user ".$you;
$sqlnotify="insert into notify(notice_type,MSG,userid,notifierid,dnt) VALUES ('Connected','$msg','$usernew','$yourid','$dnt')";
   $nresult = $conn->query($sqlnotify);
     if (!$nresult) die ("Database access failed: " . $conn->error);


    }
}



        }
        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[4]==1)
        {
            
              
          echo <<<_END
          <span style="color:green"><b>Dear user $user , you have already shown interest request to this user</b></span>
_END;
        }

         
       


    }

   

        
       
         
    
    
      


         
}








////////////////////////////////////////

$sql="SELECT * from user_views";  ////finding user index and views 
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);
else{
   
   
    $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
   
if($row[0]==$useremail)
{   $userindex=$j;


}



}

}
//echo "<br>-----";
//echo $userindex;
//echo "<br>-----:<br>";
$re = new Recommend();//

/////filling up  the holes if available !! /preprocessing starts../////



$ho=0;
$hp=0;

$seeql="SELECT * from user_views where userid='$useremail'";
$fill = $conn->query($seeql);
if (!$fill) die ("Database access failed: " . $conn->error);
else{
   
   
    $rowss = $fill->num_rows;
   // echo $rowss;
     $fill->data_seek(0);
 $ro = $fill->fetch_array(MYSQLI_NUM);

$p1=$ro[1];$p2=$ro[2];$p3=$ro[3];$p4=$ro[4];$p5=$ro[5];
$o6=$ro[6];$o7=$ro[7];$o8=$ro[8];$o9=$ro[9];$o10=$ro[10];
$o11=$ro[11];$o12=$ro[12];$o13=$ro[13];$o14=$ro[14];$o15=$ro[15];


        if($ro[6]==0||$ro[7]==0||$ro[8]==0||$ro[9]==0||$ro[10]==0||$ro[11]==0||$ro[12]==0||$ro[13]==0||$ro[14]==0||$ro[15]==0)
        {
           
    $oprecommend=$re->getRecommendations($opvalue,$userindex);
     if($ro[6]==0){ $o6=$oprecommend[6];} 
     if($ro[7]==0){ $o7=$oprecommend[7];}
     if($ro[8]==0){ $o8=$oprecommend[8];}
     if($ro[9]==0){ $o9=$oprecommend[9];}
     if($ro[10]==0){ $o10=$oprecommend[10];}
     if($ro[11]==0){ $o11=$oprecommend[11];}
     if($ro[12]==0){ $o12=$oprecommend[12];}
    if($ro[13]==0){ $o13=$oprecommend[13];}  
    if($ro[14]==0){ $o14=$oprecommend[14];} 
    if($ro[15]==0){ $o15=$oprecommend[15];} 

            //updating user_view..

    $recommends="update user_views set T1='$p1',T2='$p2',T3='$p3',T4='$p4',T5='$p5',O1='$o6',O2='$o7',O3='$o8',O4='$o9',O5='$o10',O6='$o11',O7='$o12',O8='$o13',O9='$o14',O10='$o15' wHERE userid='$useremail' ";
    $fillrecommendo = $conn->query($recommends);
if (!$fillrecommendo) die ("Database access failed: " . $conn->error);



            
        }
        if($ro[1]==0||$ro[2]==0||$ro[3]==0||$ro[4]==0||$ro[5]==0)
        {
    $prirecommend=$re->getRecommendations($privalue,$userindex);
        if($ro[1]==0){ $p1=$prirecommend[1];} 
     if($ro[2]==0){ $p2=$prirecommend[2];}
     if($ro[3]==0){ $p3=$prirecommend[3];}
     if($ro[4]==0){ $p4=$prirecommend[4];}
     if($ro[5]==0){ $p5=$prirecommend[5];}
     $recommendsp="update user_views set T1='$p1',T2='$p2',T3='$p3',T4='$p4',T5='$p5' WHERE userid='$useremail'";

$fillrecommendp = $conn->query($recommendsp);
if (!$fillrecommendp) die ("Database access failed: " . $conn->error);
   
        }


}





















/////////////////////////////////////////////////////













/*-------------see this-------------------
echo "<br>RECOMMENDED(if not filled all opinions):\r\n";

print_r($re->getRecommendations($opvalue,$userindex));

//
*/





//check if user have filled all necessary details 
/*if(!is_null($re->getRecommendations($opvalue,$userindex)))
{

	echo "<br>this user havent filled all details<br>"; ///goto see this
}
else
{
	echo "<br>this user has filled all details<br>";
}
*/
////////////////////////////////////////////////////////////////////
//base requirement identify:

$seql="SELECT * FROM lookingfor where lid='$usernew'";
$age1="";
$age2="";
$interest="";
$physical="";
$religion="";
$eating="";
$education="";
$occupation="";
$income="";
$state="";
$district="";
$resident="";
$hf1="";
$hf2="";
$hi1="";
$hi2="";
$mcount="";
$oppoindex="";
$psimilarity="";
$osimilarity="";


$result = $conn->query($seql);
if (!$result) die ("Database access failed: " . $conn->error);
else{

   
    $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    $age1=$row[1]; 
     $age2=$row[2]; 
     //slight change
     if($row[3]=='unmarried') 
     {
         $interest="nevermarried";
     }
     else $interest=$row[3];
    
     $physical=$row[4];
     $religion=$row[5];
     $eating=$row[6];
     $education=$row[7];
     $occupation=$row[8];
     $income=$row[9];
     $state=$row[10];

  //  echo "&&&&&&&&&&&&&&"; echo $row[11];echo "2222&&&&&&&&&&&&&&";
     $district=$row[11];
     $resident=$row[12];
     $hf1=$row[14];
     $hf2=$row[15];
     $hi1=$row[16];
     $hi2=$row[17];

}

}

//checking personal details:

//filtering base reqiurement

//persuit of opposite sexxzxzx only  

$s="SELECT * from userr_l1 where uid='$usernew'";

$result = $conn->query($s);
if (!$result) die ("Database access failed: " . $conn->error);
else{
   $result->data_seek($usernew);
    $row = $result->fetch_array(MYSQLI_NUM);
    //echo $row[5];
    $usersex=$row[5];
    // echo $usersex;echo "<br>";
    if($usersex=="male"){ $useropposex="female";} 
    if($usersex=="female") { $useropposex="male";}

  //echo $useropposex;echo "<br>";
 //echo $interest;

}


$seql2="SELECT * FROM userr_l1 ,personal_details WHERE userr_l1.uid=personal_details.uid 
        and  userr_l1.uid !='$usernew' and  age >= '$age1' and age <= '$age2'  and marital='$interest' and gender='$useropposex'";

$res = $conn->query($seql2);
if (!$res) die ("Database access failed: " . $conn->error);
else{

   
    $ro = $res->num_rows;
    $total=$ro;
    echo "<br><i>Total match found:</i>";
    echo $total;
   // echo "YO TORI LAY";

for ($j = 0 ; $j < $ro ; ++$j)
{
    $res->data_seek($j);
    $rom= $res->fetch_array(MYSQLI_NUM);
    
 /*    echo "-------------------------starting --------------------<br>";
     echo $rom[0]; echo "<br>";
     echo $rom[4]; echo "<br>";
     echo $rom[3]; echo "//////////////////<br>";
      echo $rom[5]; echo "<br>";
       echo $rom[6]; echo "<br>";
        echo $rom[7]; echo "<br>";
         echo $rom[8]; echo "<br>";
          echo $rom[9]; echo "<br>";
           echo $rom[10]; echo "<br>";
            echo $rom[11]; echo "<br>";
            
            echo $rom[12]; echo "*-*-*-*<br>";
            echo $rom[13]; echo "<br>";
            echo $rom[14]; echo "<br>";echo "******<=yetaaaaaaaaaaaaaaaaaaaaaaaaaaaaheraaaaaaaaaaaaaaaaaaaaaa******************<br>";//married unmarried
            echo $rom[15]; echo "<br>";//religion
            echo $rom[16]; echo "<br>";//state
            echo $rom[17]; echo "<br>";
            echo $rom[18]; echo "<br>";
            echo $rom[21]; echo "<br>";

echo"01010101010110";echo $district;echo"9991010101010110";*/

 //echo $rom[3]; echo "//////////////////<br>";
 
    $mcount=0;

    if($rom[14]==$interest)
    {
        $mcount+=1;
    }

    if($rom[15]==$religion)
    {
    	$mcount+=1;
    }
    if($rom[16]==$state)
    {
    	$mcount+=1;
    }
    if($rom[17]==$district)
    {
    	$mcount+=1;
    }

    if($rom[20]==$education)
    {
    	$mcount+=1;
    }

    if($rom[21]==$occupation)
    {
    	$mcount+=1;
        
    }

//echo $mcount;

   //$re->similarityDistance($privalue, "6", "7");
    //finding similarity in priority and opinions

    $sql22="SELECT * from user_views";
    $result22 = $conn->query($sql22);
if (!$result22) die ("Database access failed: " . $conn->error);
else{
  
    $rowss22 = $result22->num_rows;
   //echo $rowss22;

 
   

for ($k = 0 ; $k< $rowss22 ; ++$k)   //finding each opposite index user
{


    $result22->data_seek($k);
    $rowa22 = $result22->fetch_array(MYSQLI_NUM);

if($rowa22[0]==$rom[3])
{   

  
   
	$oppoindex=$k;

	
}
   

}





}

/*
echo "<br>///////<br>";
echo $oppoindex;
echo "<br>///////<br>";
echo "--------------------<br>";
echo $userindex;
echo "<br>--------------------<br>";
*/


//calculating similarity..
//echo $userindex;echo "<br>ullalalala";
//echo $oppoindex;echo "<br>";

$psimilarity=$re->similarityDistance($privalue,$userindex ,$oppoindex);
$osimilarity=$re->similarityDistance($opvalue, $userindex,$oppoindex);
//echo $osimilarity;
/*echo "lololol";
echo $oppoindex;
echo "mololol";*/
/*
echo "<br>";
echo $psimilarity;
echo "<br>";
echo $osimilarity;
echo "<br>";
//echo $row[14];
*/

//echo "<br>here-----------------------------------------<br>";
//echo $mcount;
//echo "<br>hereby-------------------------------------<br>";

///inserting info into table:only once....careful 

$checksql="SELECT * FROM matches where userid='$useremail'";

 $resultcheck = $conn->query($checksql);
if (!$resultcheck) die ("Database access failed: " . $conn->error);
else{
  
    $rowscheck = $resultcheck->num_rows;
if($rowscheck!=$total)
{

   // echo "there is nothing related to this user in database in database ";

$in="insert into matches (userid,matchuserid,match_count,psimilarity,osimilarity) VALUES ('$useremail','$rom[3]','$mcount','$psimilarity','$osimilarity')";
    $r = $conn->query($in);
if (!$r) die ("Database access failed: " . $conn->error);

}

/*elseif($rowscheck==$total) { echo "hshshshsh"; }*/

/***for new incoming user..
elseif ($rowscheck<$total) {
   //delete the old matching and insert new ones...

    $dql="delete  from matches where userid='$useremail'";
     $re = $conn->query($dql);
if (!$re) die ("Database access failed: " . $conn->error);

// echo "there is nothing related to this user in database in database ";

$in="insert into matches (userid,matchuserid,match_count,psimilarity,osimilarity) VALUES ('$useremail','$rom[3]','$mcount','$psimilarity','$osimilarity')";
    $r = $conn->query($in);
if (!$r) die ("Database access failed: " . $conn->error);

}
*/

}


	}

}

///to display to home page ..........
$mymatchpartners=array();
$sqlhome="select * from matches where userid='$useremail'";
$resulttohome = $conn->query($sqlhome);
if (!$resulttohome) die ("Database access failed: " . $conn->error);
else{

   
    $rs = $resulttohome->num_rows;
for ($j = 0 ; $j < $rs; ++$j)
{

    $resulttohome->data_seek($i);
    $rowtohome = $resulttohome->fetch_array(MYSQLI_NUM);

    //echo $rowtohome[1];echo"<br>";


       $mymatchpartners[$j]= $rowtohome[1];





}

}




//print_r($mymatchpartners);








//print_r($re->getRecommendations($privalue,$ul));

/*
echo "<br>[MATCHED:]\r\n";
echo "<br>OPINIONS->";
$var2=$re->matchItems($opinions, "newuser");
print_r($var2);
echo " <br> PRIORITY->";
$va=$re->matchItems($priority, "newuser");
print_r($va);
echo "<br>[SIMILARITY MEASURE:]<br>";
echo "<br>OPINIONS-><br>";
print_r($re->similarityDistance($opinions, "newuser", "testuser"));
echo "<br>PRIORITY-><br>";*/
//print_r($re->similarityDistance($privalue, "6", "7"));




///////////////////////now UI PART/////////////////////////////////////////////

   
for($p=0;$p<$total;$p++)
{

    

    $hql="select * from userr_l1,personal_details where userr_l1.uid=personal_details.uid and userr_l1.email!='$useremail' and userr_l1.email='$mymatchpartners[$p]'";
    $resulthql = $conn->query($hql);
if (!$resulthql) die ("Database access failed: " . $conn->error);
else{

   
    $rhql = $resulthql->num_rows;
     $resulthql->data_seek(0);
    $rowhql = $resulthql->fetch_array(MYSQLI_NUM);

//$img=$mymatchpartners[$p]+".jpg";

    echo <<<_END

<html>
<head>
    <title>Quick Search</title>
  
    <link rel="stylesheet" type="text/css" href="CSS/Mymatches.css"> 
    
</head>
<body>

                <div class="content">

                     <div class="body" style="">
          
                            Name &emsp;&emsp;: $rowhql[1]<br><br>
                            Age&emsp;&emsp;&emsp;: $rowhql[10] <br><br>
                            Education &ensp;: $rowhql[20]  <br><br>
                            Occupation :  $rowhql[21]  <br><br>
                         
                     </div>
                    <div class="img" style="">
                     <img src="./Upload/$rowhql[3].jpg">
                    </div><br>
                    <form action="" method="POST">
                    <div class="btn">
                        <input type="submit" name="interest" value="Show Interest">
                        <input type="hidden" name="hid" value="$rowhql[3]">
                    </div>
                    </form>
              </div>

              </body>
              </html>

_END;













}
}






?>