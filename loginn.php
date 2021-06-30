<?php 
include('conxn.php');
   include('sanitize.php');
   session_start();
if(!empty($_SESSION['UID']) and $_SESSION['status']){
  header('location:home.php');
}




if(isset($_POST['ok'])&&isset($_POST['email'])&&isset($_POST['pw'])){
  $email=get_post($conn, $_POST['email']);
  $pwd=get_post_pw(get_post($conn, $_POST['pw']));
$flag=0;
  $lsql="SELECT* FROM userr_l1 WHERE email='$email' and kadas='$pwd'";
$result = $conn->query($lsql);
if (!$result) die ("Database access failed:Oops Sorry!!! " . $conn->error);
else{
  $rows = $result->num_rows;
if($rows>0)
{
  while($row=$result->fetch_assoc()) 
      { 
          $m=$row["email"];
         $uid=$row["uid"];
          $status=$row['status'];
          $name=explode(" ", $row['usrname']);;
          
      }
     
     if($status=='0'){

       $_SESSION['status']=$status;
   $_SESSION['email']=$email;
    $_SESSION['UID']=$uid;
       // echo "jjjjjjjjjjjjj";
        header('location:success2nd.php');
      }
else{
 if($m==$email){

   $_SESSION['status']=$status;
   $_SESSION['email']=$email;
    $_SESSION['UID']=$uid;
   
       
$_SESSION['name']=ucfirst($name[0]);
 $_SESSION['logged']=true;
$_SESSION['track']='8';
  header('location:home.php');

  }
}
}
}



}
 if(isset($_POST['SignUp']))
{
  if($_POST['checkboxok']===""){
    header('location:agreement.php');
  }
$usrname=get_post($conn,$_POST['txtUsername']);
$passwd1=get_post_pw(get_post($conn,$_POST['zabivaka1']));
$passwd2=get_post_pw(get_post($conn,$_POST['zabivaka2']));
$email=get_post($conn,$_POST['emailAddress']);
$phn=get_post($conn,$_POST['P']);
$terms=get_post($conn,$_POST['checkboxok']);
$gender=get_post($conn,$_POST['gender']);
$prpose=get_post($conn,$_POST['lookfor']);
$month=get_post($conn,$_POST['mdropdown']);
$day=get_post($conn,$_POST['ddropdown']);
$year=get_post($conn,$_POST['ydropdown']);


    $now=time();
    $dob=strtotime("$year-$month-$day");
    $difference=$now-$dob;
    $age=floor($difference/31556926);

//$genderF=get_post($conn,$_POST['F']);
//$DOB=get_post($conn,$_POST['dropdown']);
if(!empty($usrname)&&!empty($passwd1)&&!empty($passwd2)&&!empty($email)&&!empty($phn)&&!empty($prpose)){

$sqll="select * from userr_l1 where email='$email' ";
$_SESSION['NEWTY']=$usrname;
$result = $conn->query($sqll);
$rows = $result->num_rows;
if($rows>0){ 
$signup_status='<span style="color:orange">User with same Email already exists,Please try next !!!</span>';
}
else{

if($passwd1==$passwd2){
   $sqlinsert="INSERT INTO userr_l1(usrname,kadas,email,phno,gender,month,day,year,lookfor,age) VALUES('$usrname','$passwd1','$email','$phn','$gender','$month','$day','$year','$prpose','$age')";
   $insert_query= $conn->query($sqlinsert);
   if($insert_query){

   // $signup_status='<span style="color:green">Account created,you can now login and get started </span>';
      $lsql="SELECT* FROM userr_l1 WHERE email='$email' and kadas='$passwd1'";
$result = $conn->query($lsql);
if (!$result) die ("Database access failed:OOPs!!! " . $conn->error);
else{
$rows = $result->num_rows;
if($rows>0)
{
while($row=$result->fetch_assoc()) 
      { 
          $m=$row["email"];
         $uid=$row["uid"];
      }



if($m==$email){
 
session_start();

    $_SESSION['email']=$email;
    $_SESSION['UID']=$uid;
$_SESSION['track']="1";
$_SESSION['logged']=true;
$_SESSION['status']=0;
    header('location:success1st.php');
        }
      } 
    } 
  }
}

  else
  $signup_status='<span style="color:red">Two entered passwords did not matched. Please Fill up again!!! </span>';

 }
  
}
  else{$signup_status='<span style="color:red">Sorry!!! Form cannot be blank.Please Enter all details.</span>'; }



 if(isset($signup_status)) echo $signup_status;
 if(isset($login_status)) echo $login_status;

}




echo <<<_END

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div id="content">
<body>
    <div id="wholepage">
      <header>
       <nav id="nav">
        <h1><a class="Match" href="index.php">&emsp;MATCH FINDER <sub>Find Me</sub></a></h1>
         <div id="usrpsw">
          <form method="POST" action="">
            Email &nbsp;<input type="text" name="email" required>&emsp;
            Password &nbsp;<input type="password" name="pw" required>&ensp;
  
             <input class="btn" type="submit" name="ok" value="Login"><br>
            <a href="forgot.php">Forgot Password?</a>
          </form>
        </div>
       </nav>
       </header>
    <div class="body-text"> </div>     
    <div id="body">
          <div class="form-style">
           <h1>Sign Up Now!<span>Sign up and tell us what you think of the site!</span></h1>

            <form method="POST" action="">

             <div class="inner-wrap">
              <input type="text"     name="txtUsername"  required  placeholder="Your Full Name"/><br>
               <input type="email"    name="emailAddress" required  placeholder="Email Address" /><br>
                <input type="text"     name="P"  required  placeholder="Phone Number"/><br>
                
                    Date of Birth &emsp;
                     <select  name="mdropdown">
                        <option value="0">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                     </select>
                    <select  name="ddropdown">
                            <option value="0">Day</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                        </select>

                        <select  name="ydropdown">
                            <option value="0">Year</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                    </select><br><br>
              <input type="password" name="zabivaka1"  required  placeholder="New Password"/><br>
               <input type="password" name="zabivaka2"  required  placeholder="Confirm Password"/><br>
                I am &ensp;
                <select name="gender">
                  
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>&emsp;
                Seeking for :&ensp;
                <select name="lookfor">
                  <option value="">--Select--</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
               <br><div class="button-section">
                
                  <span class="privacy-policy">
                   <input type="hidden" name="checkboxok" value=""> 
                   <input type="checkbox" name="checkboxok" value="ok">I agree to your 
                                  <a href="privacypolicy.php">Terms and Policies</a>. 
                  </span>
                  <br><br>
                  <input type="submit" name="SignUp" value="Sign up" />
                 </div>

                </form>
               
               </div>
             </div>
           </div>
         
       </div>

<div id="footer">
    <footer>
        <a href="contactus.php">Contact us</a>&ensp;&ensp;&ensp; 
        <a href="aboutus.php">About us</a> 
        <br><br>
        <div id="copy">Copyright &copy MatchFinder 2018</div>
    </footer>

</body>
</div>

</html>




 
_END;

if(isset($lout_status))
{
  echo $lout_status;
}


  ?> 