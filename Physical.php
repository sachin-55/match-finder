<!DOCTYPE html>
<html>
<head>
    <title>Physical Attributes</title>
    <link rel="stylesheet" type="text/css" href="CSS/Physical.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Physical Attributes</h1>
</head>

<body>
<div class="body">
<form method="POST" action="">
    <table id="table">
        <tr><td>Height </td><td>
            <select name="dropdown1">
                 <option value="">--Feet--</option>
                <option value="8">Above 7</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">Below 4</option>
            </select>
            <select name="dropdown2">
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

        <tr><td><br>Weight</td><td>
            <br><input type="text" name="weight" placeholder=" Enter weight in KG">
        </td></tr>
        <br>
        <tr><td><br>Body Type</td><td><br>
           <label><input type="hidden" name="Body" value=""></label>

           <label><input type="radio" name="Body" value="average">Average</label>
           <label><input type="radio" name="Body" value="athletic">Athletic</label>
           <label><input type="radio" name="Body" value="slim">Slim</label>
           <label><input type="radio" name="Body" value="heavy">Heavy</label>
           
        </td></tr>
        <tr><td><br>Complexion</td><td>
            <br><select name="dropdown3">
                <option value="">--Select--</option>
                <option value="veryfair">Very Fair</option>
                <option value="fair">Fair</option>
                <option value="normal">Normal</option>
                <option value="dark">Dark</option>
                <option value="brown">Brown</option><option></option>
            </select></td></tr>

        <tr><td><br>Physical Status &emsp;</td><td><br>
           <label> <input type="hidden" name="status" value=""></label>

           <label> <input type="radio" name="status" value="normal">Normal</label>
           <label> <input type="radio" name="status" value="physically_challenged">Physically Challenged</label></td></tr>

        <tr><td><br>Blood Group</td><td><br>
            <select name="dropdown4">
            <option value="">--Group--</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
        </select>
        <select name="dropdown5">
            <option value="">+/-</option>
            <option value="+ve">+ve</option>
            <option value="-ve">-ve</option>

        </select>
    </td></tr>
     <tr><td><br>Hobby</td><td><br>
        <input id="Hobby" type="textarea" name="hobby"  placeholder="eg.football,singing"></td></tr>

     <tr><td></td><td><br>
        
            <input id="btn" type="submit" name="pdbtn2" value="Next >>">
      
     </td><td></td></tr>
    
    </table>
</form>
</div>
</body>
</html>

<?php 
include('conxn.php');
   include_once('sanitize.php');
session_start();
if ($_SESSION['logged']==false) {
    header('location:index.php');
}
if ($_SESSION['logged']==true and $_SESSION['track']=="8") {
    header('location:home.php');
}
$email=$_SESSION['email'];
$uid=$_SESSION['UID'];


        $name=$email2=$year=$month=$gender=$day=$lookfor=$phno="";

    $sql_select="SELECT * FROM userr_l1 WHERE email='$email' and uid='$uid'";
    $result=$conn->query($sql_select);
    if (!$result) die("Database Access Failed:".$conn->error);
     else {
    
        $rows = $result->num_rows;
        if($rows>0)
    {
    while($row=$result->fetch_assoc()) 
      { 
          $name=$row["usrname"];
          $gender=$row['gender'];

      }

    }
    
}
$name2=explode(" ", $name);

$sign="";

if($gender=="male"){
    $sign="Mr.";
}
else
{
    $sign="Ms.";
}




if (isset($_POST['pdbtn2'])) {

    $height1=get_post($conn,$_POST['dropdown1']);
    $height2=get_post($conn,$_POST['dropdown2']);
    $weight=get_post($conn,$_POST['weight']);

    $body=get_post($conn,$_POST['Body']);
    $complexion=get_post($conn,$_POST['dropdown3']);
    $physical=get_post($conn,$_POST['status']);
    $bloodg=get_post($conn,$_POST['dropdown4']);
    $bloods=get_post($conn,$_POST['dropdown5']);
    $hobby=get_post($conn,$_POST['hobby']);

    if ($height1!=""&&$height2!=""&&$weight!=""&&$body!=""&&$complexion!=""&&$physical!=""&&$bloods!=""&&$bloodg!=""&&$hobby!="") {

         $sqlinsert="INSERT INTO physical(pid,height1,height2,body,complexion,physical,bloodg,bloods,hobby,weight)VALUES('$uid','$height1','$height2','$body','$complexion','$physical','$bloodg','$bloods','$hobby','$weight')";
   $insert_query= $conn->query($sqlinsert);

   if(!$insert_query) die("Database access failed:" . $conn->error);
   else{
    echo "Successfull";
            $_SESSION['track']="4";

           

    header('location:familytype.php');
   }




        
    } else {
        echo "Some field is empty . Check and resubmit";
    }
    


} 





 ?>


