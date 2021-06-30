
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

/////////////////////////////////////////////////////////////////////////////

	
	$user_id = array();
	$userid = array();
	$name=array();
	$age=array();
	$education=array();
	$occupation=array();
	$description=array();
	$path=array();
    $emaile=array();

	$looking="";
	$sex="";

	$i=0;
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


	if (isset($_POST['submitbtn'])) {
		
 		$heightf1=get_post($conn, $_POST['feet1']);
		$heightf2=get_post($conn, $_POST['feet2']);

		$heighti1=get_post($conn, $_POST['inch1']);
		$heighti2=get_post($conn, $_POST['inch2']);

		$age1=get_post($conn, $_POST['age2']);
		$age2=get_post($conn, $_POST['age3']);
		$interest=get_post($conn, $_POST['interests']);
		$physical=get_post($conn, $_POST['pstatus']);
		$religion=get_post($conn, $_POST['religion1']);
		$eating=get_post($conn, $_POST['ehabit']);
		$education=get_post($conn, $_POST['highest_education']);
		$occupation=get_post($conn, $_POST['Occupation']);
		$income=get_post($conn, $_POST['Annual_income']);
		$state=get_post($conn, $_POST['state1']);

		if($interest=='unmarried'){
			$interest='nevermarried';
		}

$district="";
		if ($_POST['district1']!="") {
		$district=get_post($conn, $_POST['district1']);
		}
		else if ($_POST['district2']!="") {
		$district=get_post($conn, $_POST['district2']);
			
		}
		else if ($_POST['district3']!="") {
		$district=get_post($conn, $_POST['district3']);
			
		}
		else if ($_POST['district4']!="") {
		$district=get_post($conn, $_POST['district4']);
			
		}
		else if ($_POST['district5']!="") {
		$district=get_post($conn, $_POST['district5']);
			
		}
		else if ($_POST['district6']!="") {
		$district=get_post($conn, $_POST['district6']);
			
		}
		else if ($_POST['district7']!="") {
		$district=get_post($conn, $_POST['district7']);
			
		}


	if($heightf1!="" and $heighti1!="" and $heightf2!="" and $heighti2!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN physical ON userr_l1.uid=physical.pid
			WHERE gender='$looking' and lookfor='$sex' and status='1' and userr_l1.uid!='$uid' and (height1>='$heightf1' AND height1<='$heightf2')AND (height2>='$heighti1' AND height2<='$heighti2')";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     		$userid[++$i]=$row['uid'];
				     }
					

				}
				
				}
	}

	if($age1!="" and $age2!="")
	{
		$sql_select="SELECT * FROM userr_l1
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	 $year=$row['year'];
				        $month=$row['month'];
				        $day=$row['day'];

				        $ag=floor((time()-strtotime("$year-$month-$day"))/31556926);
				        	if ($ag>=$age1 and $ag<=$age2) {
				     		$userid[++$i]=$row['uid'];
				     }
					}

				}
				
				}
	}

	if($interest!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and marital='$interest'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($physical!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN physical ON userr_l1.uid=physical.pid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and physical='$physical'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($religion!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and religion='$religion'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($eating!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and eating='$eating'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($education!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and education='$education'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	
if($occupation!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and occupation='$occupation'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($income!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and annualincome='$income'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($state!="" )
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and state='$state'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}

	if($district!="")
	{
		$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and district='$district'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				$rows = $select_result->num_rows;
				if($rows>0){
					while($row=$select_result->fetch_assoc()) 
				     { 
				     	
				     		$userid[++$i]=$row['uid'];
				    
					}

				}
				
				}
	}
		if(empty($userid)){
			echo '<b>'.'<font color="red">'."NO SEARCH RESULT!!!".'</font>'.'</b>';	
		}
	

	
	$user_id=array_count_values($userid);
	

		foreach ($user_id as $key => $value) {
			
			$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			JOIN profileimage ON userr_l1.uid=profileimage.iid
			JOIN family ON userr_l1.uid=family.fid
			WHERE userr_l1.uid='$key'";

			$select_result=$conn->query($sql_select);

			if(!$select_result) die("Database Access Failed:".$conn->error);

			else{
				
				
					while($row=$select_result->fetch_assoc()) 
				     { 
				        $year=$row['year'];
				        $month=$row['month'];
				        $day=$row['day'];

				        $ag=floor((time()-strtotime("$year-$month-$day"))/31556926);
				       
				       		$userid[$key]=$row['uid'];
				       		$name[$userid[$key]]=ucfirst(($row['usrname']));
					

				       		$age[$userid[$key]]=$ag;
				       		$education[$userid[$key]]=$row['education'];
				       		$occupation[$userid[$key]]=$row['occupation'];
				       		$description[$userid[$key]]=$row['description'];
				       		$path[$userid[$key]]="upload/".$row['filename'];
                            $emaile[$userid[$key]]=$row['email'];

				         	
				      }
				

			}

		}

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>CustomizeSearch</title>
	<link rel="stylesheet" type="text/css" href="CSS/customizesearch.css">
	<link rel="stylesheet" type="text/css" href="CSS/Mymatches.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="h1"><h1>Customize Search</h1></div>
	<div class="body">
    <p>Fill the desired fields to search accordingly.</p><br>
<div id="table">
<form method="POST" action="">
	<table>
		<tr><td>Age</td><td><label>From</label>
			<input type="hidden" name="age2" value="">
			<input type="text" name="age2"><label> to</label>
			<input type="hidden" name="age3" value="">
			<input type="text" name="age3"></td></tr>
		<tr><td><br>Interests</td><td><br>
			<input type="hidden" class="radio" name="interests" value="">

			<input type="radio" class="radio" name="interests" value="unmarried"> Unmarried
  			<input type="radio" class="radio" name="interests" value="widow"> Widow
  			<input type="radio" class="radio" name="interests" value="divorced"> Divorced</td>
  		</tr> 
  			<tr><td><br>Height</td>
  				<td ><br>From 
            <select name="feet1">
                <option value="">--Feet--</option>
                <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="inch1">
                <option value="">--Inches--</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select><br>
            to&emsp;&ensp;&nbsp;
            <select name="feet2">
                <option value="">--Feet--</option>
                <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="inch2">
                <option value="">--Inches--</option>
                 <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>
      
  			</td></tr>
  			<tr><td><br>Physical Status</td><td><br>
  				<input type="hidden" name="pstatus" value="">

  				<input type="radio" name="pstatus" value="normal"> Normal
				<input type="radio" name="pstatus" value="physically_challenged">Physically Challenged</td>
			</tr>
			<tr><td><br>Religion</td><td><br>
			<select name="religion1">
			<option value="">--select--</option>
			<option value="hindu">Hindu</option>
			<option value="christain">Christain</option>
			<option value="muslin">Muslim</option>
			<option value="buddhist">Buddhist</option>
			<option value="sikh">Others</option>

		</select></td></tr>

			
			<tr><td><br>Eating Habit</td><td><br>
				<input type="hidden" name="ehabit" value="">

				<input type="radio" name="ehabit" value="veg"> Veg
				<input type="radio" name="ehabit" value="non-veg"> Non-Veg</td></tr>
			
		<tr><td><br>Education level</td><td><br>
			<select name="highest_education">
				<option value="">--Select--</option>
				<option value="any">Doesn't matter</option>
				<option value="Secondary">Secondary Level </option>
				<option value="Higher Secondary">Higher Secondary</option>
				<option value="Bachelor">Bachelor</option>
				<option value="Master">Master</option>
				<option value="P.HD">P.HD</option>
				<option value="diploma">Diploma</option>
				<option value="others">Others</option>
			</select></td></tr>
		
		
		
		<tr><td><br>Occupation</td><td><br>
		
		<select name="Occupation">
			<option value="">--Select--</option>
			<option value="looking for a job">looking for a job </option>
			<option value="not working">not working</option>
			<option value="actor/model">actor/model</option>
			<option value="agent">agent</option>
			<option value="air hostess">air hostess</option>
			<option value="architech">architech</option>
			<option value="banking professional">banking professional</option>
			<option value="beautician">beautician</option>
			<option value="businessperson">businessperson</option>
			<option value="CA">CA</option>
			<option value="civil services">civil services</option>
			<option value="consultant">consultant</option>
			<option value="corporate communication">corporate communication</option>
			<option value="network security">network security</option>
			<option value="doctor">doctor</option>
			<option value="engineer">engineer</option>
			<option value="farming">farming</option>
			<option value="fashon designer">fashon designer</option>
			<option value="accountant">accountant</option>
			<option value="govt. services">govt.services</option>
			<option value="telecome">telecome</option>
			<option value="healthcare professional">healthcare professional</option>
			<option value="hotel">hotel</option>
			<option value="journalist">journalist</option>
			<option value="layer">layer</option>
			<option value="manager">manager</option>
			<option value="marketing professional">marketing professional</option>
			<option value="media professional">media professional</option>
			<option value="social services">social services</option>
			<option value="nurse">nurse</option>
			<option value="technician">technician</option>
			<option value="pilot">pilot</option>
			<option value="police">police</option>
			<option value="private security">private security</option>
			<option value="professor">professor</option>
			<option value="program manager">program manager</option>
			<option value="psychologist">psychologist</option>
			<option value="physiotherapist">physiotherapist</option>
			<option value="research professional">research professional</option>
			<option value="scientist">scientist</option>
			<option value="security professional">security professional</option>
			<option value="self employed">self employed</option>
			<option value="sports person">sports person</option>
			<option value="student">student</option>
			<option value="teacher">teacher</option>
			<option value="others">others</option>
	
		</select></td></tr>
		

	
	
		<tr><td><br>Annual Income&nbsp;</td><td><br>
		
		<select name="Annual income">
			<option value="">--select--</option>	
			<option value="no">No income</option>
			<option value="-250k">Under Rs.250,000</option>
			<option value="250-500k">Rs.250,000-500,000</option>
			<option value="500-1000k">Rs.500,000-1,000,000</option>
			<option value="10lc-20lc">Rs.1,000,000-2,000,000</option>
			<option value="20lc-30lc">Rs.2,000,000-3,000,000</option>
			<option value="30lc-40lc">Rs.3,000,000-4,000,000</option>
			<option value="40lc-50lc">Rs.4,000,000-5,000,000</option>
			<option value="+50lc">Above Rs.5,000,000</option>
			
		</select></td></tr>
		<tr><td><br>Resident State</td><td><br>
			<select name="state1" id="stateno" onchange="stateSelectHandler(this)">
			<option value="">--select--</option>	
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>

		</select></td></tr>

		<tr><td ><br>District</td><td  id="dist"><br>
			<select name="district1" style="display: none;" id="state1">
			<option value="">--select--</option>
			<option value="taplejung">Taplejung</option>
			<option value="panchthar">Panchthar</option>
			<option value="ilam">Ilam</option>
			<option value="jhapa">Jhapa</option>
			<option value="sankhuwasava">Sankhuwasava</option>
			<option value="solukhumbhu">Solukhumbhu</option>
			<option value="bhojpur">Bhojpur</option>
			<option value="terathum">Terathum</option>
			<option value="sunsari">Sunsari</option>
			<option value="morang">Morang</option>
			<option value="udaypur">Udaypur</option>
			<option value="khotang">Khotang</option>
			<option value="okhaldhunga">Okhaldhunga</option>
			<option value="dhankuta">Dhankuta</option>

		</select>
		
			<select name="district2" style="display: none;" id="state2">
				<option value="">--select--</option>
				<option value="saptari">Saptari</option>
				<option value="siraha">Siraha</option>
				<option value="mahottari">Mahottari</option>
				<option value="sarlahi">Sarlahi</option>
				<option value="dhanusa">Dhanusa</option>
				<option value="parsa">Parsa</option>
				<option value="bara">Bara</option>
				<option value="rautahat">Rautahat</option>
		    </select>


			<select name="district3" style="display: none;" id="state3">
			<option value="">--select--</option>
			<option value="kathmandu">Kathmandu</option>
			<option value="lalitpur">Lalitpur</option>
			<option value="bhaktapur">Bhaktapur</option>
			<option value="kavrepalanchok">Kavrepalanchok</option>
			<option value="makwanpur">Makwanpur</option>
			<option value="nuwakot">Nuwakot</option>
			<option value="ramechhap">Ramechhap</option>
			<option value="rasuwa">Rasuwa</option>
			<option value="sindhuli">Sindhuli</option>
			<option value="sindhupalchowk">Sindhupalchowk</option>
			<option value="chitwan">Chitwan</option>
			<option value="dhading">Dhading</option>
			<option value="dolakha">Dolakha</option>
		</select>

			<select name="district4" style="display: none;" id="state4" >
			<option value="">--select--</option>
			<option value="kaski">Kaski</option>
			<option value="gorkha">Gorkha</option>
			<option value="baglung">Baglung</option>
			<option value="lamjung">Lamjung</option>
			<option value="manang">Manang</option>
			<option value="mustang">Mustang</option>
			<option value="mayagdi">Mayagdi</option>
			<option value="parbat">Parbat</option>
			<option value="syangja">Syangja</option>
			<option value="tanahun">Tanahun</option>
			<option value="nawalpur">Nawalpur</option>
			
		</select>

			<select name="district5" style="display: none;" id="state5">
			<option value="">--select--</option>
			<option value="palpa">Palpa</option>
			<option value="banke">Banke</option>
			<option value="bardiya">Bardiya</option>
			<option value="dang">Dang</option>
			<option value="east rukum">East Rukum</option>
			<option value="gulmi">Gulmi</option>
			<option value="kapilvastu">Kapilvastu</option>
			<option value="nawalparasi">Nawalparasi</option>
			<option value="arghakhanchi">Arghakhanchi</option>
			<option value="pyuthan">Pyuthan</option>
			<option value="rolpa">Rolpa</option>
			<option value="rupandehi">Rupandehi</option>
			
		</select>
		
			<select name="district6" style="display: none;" id="state6">
			<option value="">--select--</option>
			<option value="dolpa">Dolpa</option>
			<option value="dailekh">Dailekh</option>
			<option value="humla">Humla</option>
			<option value="jajarkot">Jajarkot</option>
			<option value="jumla">Jumla</option>
			<option value="kalikot">Kalikot</option>
			<option value="mugu">Mugu</option>
			<option value="salyan">Salyan</option>
			<option value="surkhet">Surkhet</option>
			<option value="west rukum">West Rukum</option>

			</select>

			<select name="district7" style="display: none;" id="state7" >
			<option value="">--select--</option>
			<option value="achham">Achham</option>
			<option value="baitadi">Baitadi</option>
			<option value="bajhang">Bajhang</option>
			<option value="bajura">Bajura</option>
			<option value="dadeldhura">Dadeldhura</option>
			<option value="darchula">Darchula</option>
			<option value="doti">Doti</option>
			<option value="kailali">Kailali</option>
			<option value="kanchanpur">Kanchanpur</option>

		</select></td></tr>

			<tr><td></td><td>
			</td><td>
			<input id="btn" type="submit" name="submitbtn" value="Search">
				</td></tr>



	</table>
	
</form>
</div>
</div>

<?php 
		if (isset($_POST["submitbtn"])) {
			
			if (!empty($user_id)) {
				
				foreach ($user_id as $key=>$value) {
				
				
				echo <<<_END
				<div class="content">

		 			 <div class="body" >
		  					<p>$user_id[$key] fields result matched among 11 fields.</p>
							Name &emsp;&emsp;: $sign$name[$key]<br><br>
							Age&emsp;&emsp;&emsp;: $age[$key] <br><br>
							Education &ensp;: $education[$key]<br><br>
							Occupation : $occupation[$key] <br><br>
							Description : $description[$key]<br><br>
							</div>
					<div class="img" >
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

<script type="text/javascript">
		function hide1(){
          var elem = document.getElementById('state1');
          elem.style.display = 'none';
        }
        function show1(){
			var elem = document.getElementById('state1');
			elem.style.display = 'inline';
		}
		function hide2(){
          var elem = document.getElementById('state2');
          elem.style.display = 'none';
        }
        function show2(){
			var elem = document.getElementById('state2');
			elem.style.display = 'inline';
		}
		function hide3(){
          var elem = document.getElementById('state3');
          elem.style.display = 'none';
        }
        function show3(){
			var elem = document.getElementById('state3');
			elem.style.display = 'inline';
		}
		function hide4(){
          var elem = document.getElementById('state4');
          elem.style.display = 'none';
        }
        function show4(){
			var elem = document.getElementById('state4');
			elem.style.display = 'inline';
		}
		function hide5(){
          var elem = document.getElementById('state5');
          elem.style.display = 'none';
        }
        function show5(){
			var elem = document.getElementById('state5');
			elem.style.display = 'inline';
		}
		function hide6(){
          var elem = document.getElementById('state6');
          elem.style.display = 'none';
        }
        function show6(){
			var elem = document.getElementById('state6');
			elem.style.display = 'inline';
		}
		function hide7(){
          var elem = document.getElementById('state7');
          elem.style.display = 'none';
        }
        function show7(){
			var elem = document.getElementById('state7');
			elem.style.display = 'inline';
		}
		

		function stateSelectHandler(select){
			if(select.value == '1'){
			show1();
			}else{
			hide1();
			}

			if(select.value == '2'){
			show2();
			}else{
			hide2();
			}
			if(select.value == '3'){
			show3();
			}else{
			hide3();
			}
			if(select.value == '4'){
			show4();
			}else{
			hide4();
			}
			if(select.value == '5'){
			show5();
			}else{
			hide5();
			}
			if(select.value == '6'){
			show6();
			}else{
			hide6();
			}
			if(select.value == '7'){
			show7();
			}else{
			hide7();
			}

		}
</script>
</body>
</html>