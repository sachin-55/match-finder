
<!DOCTYPE html>
<html>
<head>
	<body>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        


</body>
</html>


<?php     include_once('conxn.php');

include('chatassossaries.php');

session_start();
$myid=$_SESSION['email'];

//echo $myid;
$sql="SELECT *  from request where usereid1 ='$myid' || usereid2='$myid' ";
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

        $m1="&#10006;";//cross
        $m2="&#10006;";
        $d=$row[2];
        if($row[3]==1&&$row[4]==0){

$m1="&#10004;";
 $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$d'";

      $select_result2=$conn->query($sql_select);
    $row24 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result2) die("Database Access Failed:".$conn->error);
      else{ $e=$row24[1]; }
   echo<<<_END

         <br><b><i>
        
         $e  </b></i> <t><t><br><b>STATUS: <pre></b>    
         Request sent status:$m1
         Request receive status:$m2 

  
        
      <br></pre>

_END;


}




 
        if($row[4]==1&&$row[3]==0){ 

$m2="&#10004;";

if(isset($_POST['raccept']))
{

    /////////////




          $my=$_SESSION['email'];
          $your=$_POST['hid'];

           $sqlpre="select * from request where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my')";
           $resultpre = $conn->query($sqlpre);
           if (!$resultpre) die ("Database access failed: " . $conn->error);
else{
   echo $your;

    $rowspre = $resultpre->num_rows;
   // echo $rowspre;
   if($rowspre==0)
   {
   

            echo "Your interest request have been sent successfully.";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);
       
   }

    $resultpre->data_seek(0);
    $rowpre = $resultpre->fetch_array(MYSQLI_NUM);
    
      /* if($rowpre[1]==$my && $rowpre[3]==1)
        {
            echo " you are already intrested with $rowspre[2] ...";//no need to insert the value to database
          
        }*/
       if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[3]==1)
        {

            
              // echo"$rowspre[2] have already interest on u";

            /*  $s="update request set statuseid2='1' where usereid1='$my'";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);*/
     //echo "haha";
     echo "already requested";

        }

        if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[4]==1)
        {
             $s="update request set statuseid1='1' where usereid1='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo"NOW YOU HAVE BEEN CONNECTED WITH $rowpre[2]";

        $sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    
    if($rowsconn==0) //nothing in db
    {


        //insert into connected db
        $inconn="insert into connected(usereid1,usereid2) VALUES ('$my','$your')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);


/* /// finding chatroomid
      $take="select * from connected where(usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my')";

  $rt = $conn->query($take);
     if (!$rt) die ("Database access failed: " . $conn->error);

      $rt->data_seek(0);
    $rowrt = $rt->fetch_array(MYSQLI_NUM);

    $chatroomid=$rowrt[0];


/////////////////////////////////
  //creating chatroom after detecting connected
    $chatroom=$your;
       //check in to chatroom before inserting..necessary
    $prensql="select * from chatroom where chatroomid='$chatroomid'";
    $resultpresql = $conn->query($prensql);
if (!$resultpresql) die ("Database access failed: " . $conn->error);
else{
  
    $re = $resultpresql->num_rows;
   // echo $re;

    if($re==0) //if not present inside chatroom
    {

        $today = date('h:i:s a m/d/Y  ', time());
        //echo "There exists no chatroom:So  its created ";

          $nosql="insert into chatroom(chatroomid,chat_name,chatuser,date_created)VALUES('$chatroomid','$chatroom','$useremail', '$today') ";
         $resulltnosql = $conn->query($nosql);
if (!$resulltnosql) die ("Database access failed: " . $conn->error);

}
}

        
////////////////////////// */

    }


}


        }

        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[3]==1)
        {
            //echo "i am hereo";
             $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo"NOW YOU HAVE BEEN CONNECTED WITH $rowpre[1]";

$sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    //echo $rowspre;
    if($rowsconn==0) //nothing in db
    {

        //insert into connected db

        $today = date('h:i:s a m/d/Y  ', time());
        $inconn="insert into connected(usereid1,usereid2,date_created) VALUES ('$my','$your','$today')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);


    }
}



        }
        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[4]==1)
        {
            
              // echo"$rowpre[1] have already interest on u";
           /*     $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo "haha";*/
          echo "already requested";

        }

         
        /* if($rowpre[3]==1 && $rowpre[4]==1)
         {
            echo "both interested";
         }*/
/*
         if(($rowpre[1]!=$my && $rowpre[2]!=$your ))//if nothinhg found in database...
         {
            echo "Your interest request have been sent successfully... ";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);


         }
        if( ($rowpre[1]!=$your && $rowspre[2]!=$your))
         {
            
            echo "Your interest request have been sent successfully... ";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);

         }






    
    */


    }


    ////////////
}
   
 $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[2]'";

      $select_result1=$conn->query($sql_select);
    $row1 = $select_result1->fetch_array(MYSQLI_NUM);

      if(!$select_result1) die("Database Access Failed:".$conn->error);
      else{ $d=$row1[1]; }

echo<<<_END
<form action="" method="POST">
         <br><b><i>
        
         $d  </b></i> <t><t><br><b> STATUS: <pre></b>    
         Request sent status:$m1                           <input type="submit" name="raccept" value="ACCEPT REQUEST">
         Request receive status:$m2                        <input type="hidden" name="hid" value="$row[2]">

  
        <a href= "viewprofile.php?pid=$row[2]" target="frame">VIEW PROFILE</a>    
      <br></pre>
 </form>

_END;

//////////////request accept button necessary////////////



}
if($row[4]==1&&$row[3]==1)
{
    $m1="&#10004;";
    $m2="&#10004;";
     $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[2]'";

      $select_result1=$conn->query($sql_select);
    $row11 = $select_result1->fetch_array(MYSQLI_NUM);

      if(!$select_result1) die("Database Access Failed:".$conn->error);
      else{ $d=$row11[1]; }
    echo<<<_END

         <br><b><i>
        
         $d </b></i> <t><t><br><b>STATUS: <pre></b>    
         Request sent status:$m1
         Request receive status:$m2 

  
        <a href= "viewprofile.php?pid=$row[2]" target="frame">VIEW PROFILE</a>
      <br></pre>

_END;




}

}



    else  
{
    	  $m2="&#10006;";
          $m1="&#10006;";

        if($row[4]==1&&$row[3]==0){
            $m1="&#10004;"; 
 $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[1]'";

      $select_result2=$conn->query($sql_select);
    $row2 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result2) die("Database Access Failed:".$conn->error);
      else{ $e=$row2[1]; }
  echo<<<_END

         <br><b><i>
        
         $e  </b></i> <t><t><br><b>STATUS: <pre></b>    
         Request sent status:$m1
         Request receive status:$m2 


      <br></pre>

_END;
  }


        
         if($row[3]==1&&$row[4]==0){

            $m2="&#10004;";
            if(isset($_POST['raccept']))
{

               /////////////////truti/////

         // echo "ulalalalalalal";

               
          $my=$_SESSION['email'];
          $your=$_POST['hid'];

           $sqlpre="select * from request where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my')";
           $resultpre = $conn->query($sqlpre);
           if (!$resultpre) die ("Database access failed: " . $conn->error);
else{
   //echo $your;

    $rowspre = $resultpre->num_rows;
    //echo $rowspre;
   if($rowspre==0)
   {
   

            echo "Your interest request have been sent successfully.";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);
       
   }

    $resultpre->data_seek(0);
    $rowpre = $resultpre->fetch_array(MYSQLI_NUM);
    
      /* if($rowpre[1]==$my && $rowpre[3]==1)
        {
            echo " you are already intrested with $rowspre[2] ...";//no need to insert the value to database
          
        }*/
       if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[3]==1)
        {

            
              // echo"$rowspre[2] have already interest on u";

            /*  $s="update request set statuseid2='1' where usereid1='$my'";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);*/
     //echo "haha";
     echo "already requested";

        }

        if($rowpre[1]==$my&&$rowpre[2]==$your&&$rowpre[4]==1)
        {
             $s="update request set statuseid1='1' where usereid1='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo"NOW YOU HAVE BEEN CONNECTED WITH $rowpre[2]";

        $sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    //echo $rowspre;
    if($rowsconn==0) //nothing in db
    {


        //insert into connected db
        $inconn="insert into connected(usereid1,usereid2) VALUES ('$my','$your')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);


/* /// finding chatroomid
      $take="select * from connected where(usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my')";

  $rt = $conn->query($take);
     if (!$rt) die ("Database access failed: " . $conn->error);

      $rt->data_seek(0);
    $rowrt = $rt->fetch_array(MYSQLI_NUM);

    $chatroomid=$rowrt[0];


/////////////////////////////////
  //creating chatroom after detecting connected
    $chatroom=$your;
       //check in to chatroom before inserting..necessary
    $prensql="select * from chatroom where chatroomid='$chatroomid'";
    $resultpresql = $conn->query($prensql);
if (!$resultpresql) die ("Database access failed: " . $conn->error);
else{
  
    $re = $resultpresql->num_rows;
   // echo $re;

    if($re==0) //if not present inside chatroom
    {

        $today = date('h:i:s a m/d/Y  ', time());
        //echo "There exists no chatroom:So  its created ";

          $nosql="insert into chatroom(chatroomid,chat_name,chatuser,date_created)VALUES('$chatroomid','$chatroom','$useremail', '$today') ";
         $resulltnosql = $conn->query($nosql);
if (!$resulltnosql) die ("Database access failed: " . $conn->error);

}
}

        
////////////////////////// */

    }


}


        }

        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[3]==1)
        {
            //echo "i am hereo";
             $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo"NOW YOU HAVE BEEN CONNECTED WITH $rowpre[1]";

$sqlconn="select * from connected where (usereid1='$my'and usereid2='$your') || (usereid1='$your'and usereid2='$my') ";

         $resultconn = $conn->query($sqlconn);
           if (!$resultconn) die ("Database access failed: " . $conn->error);
else{
   

    $rowsconn = $resultconn->num_rows;
    //echo $rowspre;
    if($rowsconn==0) //nothing in db
    {

        //insert into connected db

        $today = date('h:i:s a m/d/Y  ', time());
        $inconn="insert into connected(usereid1,usereid2,date_created) VALUES ('$my','$your','$today')";
         $resultin = $conn->query($inconn);
     if (!$resultin) die ("Database access failed: " . $conn->error);


    }
}



        }
        if($rowpre[2]==$my&&$rowpre[1]==$your&&$rowpre[4]==1)
        {
            
              // echo"$rowpre[1] have already interest on u";
           /*     $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
     echo "haha";*/
          echo "already requested";

        }

         
        /* if($rowpre[3]==1 && $rowpre[4]==1)
         {
            echo "both interested";
         }*/
/*
         if(($rowpre[1]!=$my && $rowpre[2]!=$your ))//if nothinhg found in database...
         {
            echo "Your interest request have been sent successfully... ";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);


         }
        if( ($rowpre[1]!=$your && $rowspre[2]!=$your))
         {
            
            echo "Your interest request have been sent successfully... ";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);

         }






    
    */


    }



                /////////////////

            }
             $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[1]'";

      $select_result2=$conn->query($sql_select);
    $row22 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result2) die("Database Access Failed:".$conn->error);
      else{ $e=$row22[1]; }
            echo<<<_END

<form action="" method="POST">
         <br><b><i>
        
         $e  </b></i> <t><t><br><b>STATUS: <pre></b>    
         Request sent status:$m1                            <input type="submit" name="raccept" value="ACCEPT REQUEST">
         Request receive status:$m2                          <input type="hidden" name="hid" value="$row[1]">
         
  
        <a href= "viewprofile.php?pid=$row[1]" target="frame">VIEW PROFILE</a>
      <br></pre>
      </form>

_END;





        }

        if($row[3]==1&&$row[4]==1)
        {
             $m2="&#10004;";
               $m1="&#10004;";
                $sql_select="SELECT * FROM userr_l1
      
      WHERE email='$row[1]'";

      $select_result2=$conn->query($sql_select);
    $row23 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result2) die("Database Access Failed:".$conn->error);
      else{ $e=$row23[1]; } 
               echo<<<_END

         <br><b><i>
        
         $e  </b></i> <t><t><br><b>STATUS: <pre></b>    
         Request sent status:$m1
         Request receive status:$m2 

  
        <a href= "viewprofile.php?pid=$row[1]" target="frame">VIEW PROFILE</a>
      <br></pre>

_END;



        }
         
        

    }



}
}


?>


