<?php include('conxn.php');
   include('sanitize.php');

if(isset($_POST['okl'])&&isset($_POST['un'])&&isset($_POST['pw'])){
  $uname=get_post($conn, $_POST['un']);
  $pwd=get_post_pw(get_post($conn, $_POST['pw']));
  $uid=" ";
 // $pwd=get_post($conn, $_POST['pw']);

if(empty($uname)&&empty($pwd)){
  $login_status= "please enter the username and password";
}
else
{
$lsql="SELECT* FROM userr_l1 WHERE e-mail='$uname' and kadas='$pwd'";
$result = $conn->query($lsql);
if (!$result) die ("Database access failed:ohhhhshit " . $conn->error);
else{
$rows = $result->num_rows;
if($rows>0)
{
while($row=$result->fetch_assoc()) 
      { 
          $m=$row["e-mail"];
         $uid=$row["uid"];
      }
if($m==$uname){
 
session_start();

    $_SESSION['UNAME']=$uname;
    $_SESSION['IDDD']=$uid;
    
    header('location:index.php');
  }
}
  else $login_status='<span style="color:red">username or password mismatch</span>';
}
}
}


 if(isset($_POST["SignUp"]))
{
$usrname=get_post($conn,$_POST['txtUsername']);
$passwd1=get_post_pw(get_post($conn,$_POST['Zabivaka1']));
$passwd2=get_post_pw(get_post($conn,$_POST['Zabivaka2']));
$email=get_post($conn,$_POST['emailAddress']);
$phn=get_post($conn,$_POST['PhoneNumber']);
$terms=get_post($conn,$_POST['checkboxok']);
$gender=get_post($conn,$_POST['Gselect']);
$prpose=get_post($conn,$_POST['Pselect']);
//$genderF=get_post($conn,$_POST['F']);
//$DOB=get_post($conn,$_POST['dropdown']);


if(!empty($usrname)&&!empty($passwd1)&&!empty($passwd2)&&!empty($email)&&!empty($phn)){

$sqll="select * from userr_l1 where e-mail='$email' ";
$_SESSION['NEWTY']=$usrname;
$result = $conn->query($sqll);
$rows = $result->num_rows;
if($rows>0){ 
$signup_status='<span style="color:orange">User with same email already exists,try next one!</span>';
}
else{

if($passwd1==$passwd2){
   $sqlinsert="INSERT INTO userr_l1(uid,usrname,kadas,e-mail) VALUES('','$usrname','$passwd1','$email')";
   $insert_query= $conn->query($sqlinsert);
   if($insert_query)
    $signup_status='<span style="color:green">Account created,you can now login and get started </span>';
  }
  else
  $signup_status='<span style="color:red">Two entered passwords did not match up.Fill up again </span>';
}
    
 }
  else{$signup_status='<span style="color:red">Form cannot be blank!.Enter all details</span>'; }


}
 if(isset($signup_status)) echo $signup_status;
 if(isset($login_status)) echo $login_status;
echo <<<_END


<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>

<div id="content">
<body>
   <header>
       <nav>
        <h1><a class="Match" href="">&emsp;MATCH FINDER</a></h1>
         <form method="POST" action="">
            Email/Phoneno &nbsp;<input type="text" name="un" required>&emsp;
           
            Password &nbsp;<input type="password" name="pw" required>&ensp;
            
           <input type="submit" name="okl" value="LOGIN" ><br>
            <a href="#">Forgot Password?</a>
        </form>
        
       </nav>
       </header>


      
   
    <div id="body">
        <div class="body-text">Connect,Search and find your perfect match.</div>
        

<div class="form-style">
<h1>Sign Up Now!<span>Sign up and tell us what you think of the site!</span></h1>
<form method="POST" action="">
    
    <div class="inner-wrap">

        <input type="text"     name="txtUsername"  required  placeholder="Your Full Name"/><br>
        <input type="email"    name="emailAddress" required  placeholder="Email Address" /><br>
        <input type="text"     name="PhoneNumber"  required  placeholder="Phone Number"/><br>
                       Gender 
      <label> <select  name="Gselect">
            <option value="0">Male</option>
            <option value="1">Female</option>
            <option value="2">Other</option>
            </select>
         <br><br></label>
        
        
        Date of Birth &emsp;
        <select  name="dropdown">
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

        <select  name="dropdown">
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

        <select  name="dropdown">
            <option value="0">Year</option>
            <option value="1">2005</option>
            <option value="2">2004</option>
            <option value="3">2003</option>
            <option value="4">2002</option>
            <option value="5">2001</option>
            <option value="6">2000</option>
            <option value="7">1999</option>
            <option value="8">1998</option>
            <option value="9">1997</option>
            <option value="10">1996</option>
            <option value="11">1995</option>
            <option value="12">1994</option>
            <option value="13">1993</option>
            <option value="14">1992</option>
            <option value="15">1991</option>
            <option value="16">1990</option>
            <option value="17">1989</option>
            <option value="18">1988</option>
            <option value="19">1987</option>
            <option value="20">1986</option>
            <option value="21">1985</option>
            <option value="22">1984</option>
            <option value="23">1983</option>
            <option value="24">1982</option>
            <option value="25">1981</option>
            <option value="26">1980</option>
            <option value="27">1979</option>
            <option value="28">1978</option>
            <option value="29">1977</option>
            <option value="30">1976</option>
            <option value="31">1975</option>
            <option value="32">1974</option>
            <option value="33">1973</option>
            <option value="34">1972</option>
            <option value="35">1971</option>
            <option value="36">1970</option>
            <option value="37">1969</option>
            <option value="38">1968</option>
            <option value="39">1967</option>
            <option value="40">1966</option>
            <option value="41">1965</option>

        </select><br><br>

        <input type="password" name="Zabivaka1"     required  placeholder="New Password"/><br>
        <input type="password" name="Zabivaka2"     required  placeholder="Confirm Password"/><br>
        I am looking to  :
       <select  name="Pselect">
            <option value="0">male</option>
            <option value="1">female</option>
            <option value="2">others</option>
            </select>
         <br><br></label>
    </div>

    <br><div class="button-section">
     <input type="submit" name="SignUp" value="Sign up" />
     <span class="privacy-policy">
     <input type="checkbox" name="checkboxok" value="chk" checked>I agree to your Terms and Policies. 
     </span>
    </div>
</form>
</div>
    </div>
    




</body>
</div>
</html>






 
_END;

if(isset($lout_status))
{
  echo $lout_status;
}


  ?> 