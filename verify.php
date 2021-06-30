<?php 
include('conxn.php');
    include('sanitize.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

    
     $email = get_post($conn, str_replace("'", "", $_GET['email'])); // Set email variable
    $hash = get_post($conn, str_replace("'", "", $_GET['hash'])); // Set hash variable

   

    $search ="SELECT email, status, hash FROM userr_l1 WHERE email='$email' AND hash='$hash' AND status='0'";
    $result=$conn->query($search);
    if (!$result) die("Database access failed: " .$conn->error); 
    $match  =$result->num_rows;


    if($match > 0){
        // We have a match, activate the account
        $update="UPDATE userr_l1 SET status='1' WHERE email='$email' AND hash='$hash' AND status='0'";
        $result=$conn->query($update);
          if (!$result) die("Database access failed: " .$conn->error);
        echo 'Your account has been activated, you can now login';

       



    }else{
        // No match -> invalid url or account has already been activated.
        echo 'The url is either invalid or you already have activated your account.';
    }
      



}else{
     echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}

 if(isset($_POST['goto'])){
    session_start();
     session_unset();
session_destroy();
            header('location:index.php?registered_and_activation_complete');
        }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title></title>
 </head>
 <body>

<form method="POST" action="">
<input type="submit" name="goto" value="Go for Login">
</form>

 </body>
 </html>