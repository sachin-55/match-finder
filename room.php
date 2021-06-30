
<?php
include_once('conxn.php');
 

?>
    	
			<div>
				<div class="panel panel-default" style="height: 400px; background-color:#AED6F1;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;"></span><br>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
						<body >
<?php


if(isset($_POST['SB'])&&isset($_POST['MSG']))
{
	
  $msg=$_POST['MSG'];
	//$msg=get_post_pw2(get_post2($conn,$_POST['MSG']));


$cd=$_SESSION['pchat'];
$me=$_SESSION['name'];

//$dnt=date("h:i:sa").date("Y/m/d");
//date_default_timezone_set('kathmandu');whynot?
$dnt = date('h:i:s a m/d/Y  ', time());


$sql="insert into message(chatroomid,usereid,MSG,dnt) values ('$cd','$me','$msg','$dnt')";
$result = $conn->query($sql);
					if (!$result) die ("Database access failed: " . $conn->error);


}

?>

<?php
					include('conxn.php');
					//session_start();
					$me=$_SESSION['name'];

                    $cid=$_SESSION['pchat'];
                    echo
                    "  
                    	<div id='log'>
                    		MESSAGE LOG

                    	</div>
                    	
                     ";
                     

					$sl="SELECT  * from  message where chatroomid='$cid' order by msgid DESC";

					$result = $conn->query($sl);
					if (!$result) die ("Database access failed: " . $conn->error);

else{
   
 $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
	
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

echo "<br>"; 
  if($row[1]==$me ) 
   {
   	
 echo<<<_END
		<div id="sender">
	 		
 			<u>$row[1]</u><br>
 			<b>$row[2]                                                                
    		<br></b>
 			&emsp;&emsp;<i>$row[3]</i>
   	      	

	 	</div>

_END;
   }

   else
   {
 echo<<<_END
		<div id="receiver">
	 		<u>$row[1]</u><br>
 			<b>$row[2]</b><br>
 			&emsp;&emsp;<i>$row[3]</i><br>

	 	</div>
_END;

   } 
}

}


    ?>
</body>
					</div>
				</div>
				<form action="" method="POST"> 
				<div class="input-group">
					<input type="text" name="MSG" class="form-control" placeholder="Type message..." required autofocus id="chat_msg">
					<span class="input-group-btn">
					<button name="SB" class="btn btn-success" type="submit" id="send_msg" value="<?php echo $cid; ?>">
					<span class="glyphicon glyphicon-comment"></span> Send 
					</button>
					</span>
				</div>
				</form>
			</div>			
		</div>

		<style type="text/css">
			html, body{overflow:hidden;}

			#sender
			{
				max-height:auto;
				max-width: 42%;
				border: 1px solid gray;
				border-radius: 7px;
				float: right;
				display: inline;
				clear: both;
				padding: 1.5%;
				margin: 1%;
				background-color:#F4F6F6;
				
				color: #273746;

			}
			#sender i
			{
				float: right;
				font-size: 12px;
			}
			#sender u
			{
				float: left;
				font-size: 12px;
			}

			#receiver
			{
				max-height:auto;
				max-width: 42%;
				border: 1px solid gray;
				border-radius: 7px;
				float: left;
				display: inline;
				clear: both;
				padding: 1%;
				margin: 1%;
				background-color: #AEB6BF;
				color: #273746;

			}
			#receiver u
			{
				font-size: 12px;
				float: left;
			}
			#receiver i
			{
				float: right;
				font-size: 12px;
			}
			#chat_msg
			{
				margin: 5px;
			}
			#log
			{
				font-size: 20px;
				color: brown;
				text-align: center;
				clear: both;
				max-height: 10%;
				border: 1px solid white;
				padding: 2px;
				margin: 0px 4px 0px 0px;

			}

		</style>

<script>
	
var auto_refresh = setInterval(
function()
{
$('#chat_area').load(document.URL +  ' #chat_area');
}, 2000);


</script>


