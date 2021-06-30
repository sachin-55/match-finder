<?php 

include('sanitize.php');
	include('conxn.php');

session_start();
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];
////////////////////////////////////////////////////////////////////////

	if(isset($_POST['interest']))
    {


          $my=$_SESSION['email'];
          $your=$_POST['hid'];

           $sqlpre="select * from request where usereid1='$my'||usereid2='$my' && usereid1='$your'||usereid2='$your'";
           $resultpre = $conn->query($sqlpre);
           if (!$resultpre) die ("Database access failed: " . $conn->error);
else{
   
    $rowspre = $resultpre->num_rows;

    $resultpre->data_seek(0);
    $rowpre = $resultpre->fetch_array(MYSQLI_NUM);
    
       if($rowpre[1]==$my && $rowpre[3]==1)
        {
            echo " you are already intrested with $rowspre[2] ...";//no need to insert the value to database
          
        }
        if($rowpre[1]==$my && $rowpre[4]==1)
        {
               echo"$rowspre[2] have already interest on u";

              $s="update request set statuseid2='1' where usereid1='$my'";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);



        }
        if($rowpre[2]==$my && $rowpre[3]==1)
        {
            
               echo"$rowpre[1] have already interest on u";
                $s="update request set statuseid2='1' where usereid2='$my' ";
               $result = $conn->query($s);
     if (!$result) die ("Database access failed: " . $conn->error);
 


        }
         
         if($rowpre[3]==1 && $rowpre[4]==1)
         {
            echo "both interested";
         }

         if($rowpre[1]!=$my && $rowpre[2]!=$your && $rowpre[2]!=$my && $rowspre[1]!=$your)//if nothinhg found in database...
         {
            echo "Your interest request have been sent successfully... ";
 $sql="insert into request(usereid1,usereid2,statuseid1) VALUES('$my','$your','1')";
          $result = $conn->query($sql);
     if (!$result) die ("Database access failed: " . $conn->error);


         }

    
    
    
    }

         
}

///////////////////////////////////////////////////////////////////////



$looking="";
	$sex="";

	$userid = array();
	$name=array();
	$age=array();
	$education=array();
	$occupation=array();
	$description=array();
	$path=array();
$emaile=array();

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


	if (isset($_POST['submitbtn1'])) {
		  $state=get_post($conn, $_POST['state1']);
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

				$sql_select="SELECT * FROM userr_l1
			JOIN personal_details ON userr_l1.uid=personal_details.uid
			JOIN profileimage ON userr_l1.uid=profileimage.iid
			JOIN family ON userr_l1.uid=family.fid
			WHERE gender='$looking' and lookfor='$sex'and status='1' and userr_l1.uid!='$uid' and state='$state' and district='$district'";

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
	<title>Search By Location</title>
	<link rel="stylesheet" type="text/css" href="CSS/location.css">
	<link rel="stylesheet" type="text/css" href="CSS/Mymatches.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Location Search</h1>

</head>
<body>
	<div class="body">
<form method="POST" action="">
	<table id="table">
		</select></td></tr>
			<tr><td>State No. &emsp;</td><td>
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
		
		<tr><td></td><td></td><td>
			<input id="btn" type="submit" name="submitbtn1" value="Search"></td></tr>
	</table>
</form>
</div>

<?php 
		if (isset($_POST["submitbtn1"])) {
			
			if (!empty($userid)) {
				foreach ($userid as $key) {
				
				
				echo <<<_END
				<div class="content">

		 			 <div class="body" >
		  
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