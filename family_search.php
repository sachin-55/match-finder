<?php 
	include('sanitize.php');
	include('conxn.php');

session_start();
$email=$_SESSION['email'];
	$uid=$_SESSION['UID'];

	////////////////////////////////////////////////////////////////////////////


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

	////////////////////////////////////////////////////////////////////////////

	$userid = array();
	$name=array();
	$age=array();
	$emaile=array();
	$education=array();
	$occupation=array();
	$description=array();
	$path=array();

	
	$looking="";
	$sex="";


			$sql_select="SELECT * FROM userr_l1
			WHERE uid='$uid'";
 
			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{

				$rows = $select_result->num_rows;

				if($rows>0)
				{
					while($row=$select_result->fetch_assoc()) 
				     { 
				        $looking=$row['lookfor'];
				        $sex=$row['gender'];
				         	
				         	
				      }
				}

			}

$sign="";

if($looking=="male"){
	$sign=" Mr.";
}
else
{
	$sign=" Ms.";
}


	if (isset($_POST['submitbtn3'])) {
		
  $fvalue=get_post($conn, $_POST['family1']);
  $ftype=get_post($conn, $_POST['family2']);
  $fstatus=get_post($conn, $_POST['family3']);
  

			$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			JOIN profileimage ON userr_l1.uid=profileimage.iid
			JOIN family ON userr_l1.uid=family.fid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and (familyvalue='$fvalue' and familystatus='$fstatus' and familytype='$ftype')";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{

				$rows = $select_result->num_rows;
				
				if($rows>0)
				{	$i=0;
					while($row=$select_result->fetch_assoc()) 
				     { 
				        $year=$row['year'];
				        $month=$row['month'];
				        $day=$row['day'];

				        $ag=floor((time()-strtotime("$year-$month-$day"))/31556926);
				       
				       

				       		$userid[$i]=$row['uid'];
				       		$name[$userid[$i]]=ucfirst(($row['usrname']));
				       		$age[$userid[$i]]=$ag;
				       		$education[$userid[$i]]=$row['education'];
				       		$occupation[$userid[$i]]=$row['occupation'];
				       		$description[$userid[$i]]=$row['description'];
				       		$path[$userid[$i]]="upload/".$row['filename'];

                            $emaile[$userid[$i]]=$row['email'];
				       	
				       
				     		$i++;
				         	
				      }
				}
				else{
					echo '<b>'.'<font color="red">'."NO SEARCH RESULT!!!".'</font>'.'</b>';
				}

			}
			
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Search By Family Details</title>
	<link rel="stylesheet" type="text/css" href="CSS/family_search.css">
	<link rel="stylesheet" type="text/css" href="CSS/Mymatches.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<h1>Family Details Search</h1>

</head>
<body>
	<div class="body">
	<form method="POST" action="">
		<table id="table">
			<tr><td><br>Family Value &ensp;:</td><td><br>
			<input type="hidden" name="family1" value="">
			<input type="radio" name="family1" value="Orthodox"> Orthodox
			<input type="radio" name="family1" value="Traditional"> Traditional
			<input type="radio" name="family1" value="Moderate"> Moderate
			<input type="radio" name="family1" value="Liberal"> Liberal</td></tr>

		<tr><td><br>Family Type&emsp;:</td><td><br>
			<input type="hidden" name="family2" value="">

			<input type="radio" name="family2" value="Joint Family"> Joint Family
			<input type="radio" name="family2" value="Nuclear family"> Nuclear Family
			<input type="radio" name="family2" value="Others"> Others</td></tr>

		<tr><td><br>Family Status :</td><td><br>
			<input type="hidden" name="family3" value="">

			<input type="radio" name="family3" value="Lower Class"> Lower Class
			<input type="radio" name="family3" value="Middle Class"> Middle Class
			<input type="radio" name="family3" value="Upper Middle"> High Class</td></tr>

		
			<!--<tr><td><br>Gotra</td><td><br>
			<input type="text" name="family6" placeholder="Gotra"></td></tr>
		-->
	
		<tr><td></td><td></td><td></td></tr>
		</table>
		<br><br><input id="btn" type="submit" name="submitbtn3" value="Search">
	</form>
</div>

<?php 
		if (isset($_POST["submitbtn3"])) {
			
			if (!empty($userid)) {
				
				foreach ($userid as $key) {
				
				
				echo <<<_END
				<div class="content">

		 			 <div class="body" style="">
		  
							Name &emsp;&emsp;: $sign$name[$key]<br><br>
							Age&emsp;&emsp;&emsp;: $age[$key] <br><br>
							Education &ensp;: $education[$key]<br><br>
							Occupation : $occupation[$key] <br><br>
							Description : $description[$key]<br><br>
							</div>
					<div class="img" style="">
							<img src=$path[$key]>
					</div><br>
					<form action="" method="POST">
					<div class="btn">
						<input type="submit" name="interest" value="Show Interest">
						<input type="hidden" name="hid" value="$emaile[$key]">
					</div>
	                </form>
	  
				</div>

_END;
				}
			}

		}

 ?>

</body>
</html>