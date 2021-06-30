<div class="col-lg-12">
    <div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-list"></span> CHAT LISTS</strong></span>
		
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="chatRoom">
        <thead>
            <tr>
                <th><span style="color:#000000"><i><b>Conversations</b></i></span></th>
				<th><span style="color:#000000"><i><b>Date Created</b></i></th>
			</tr>
		</thead>
		<tbody>
		<?php
		//session_start();

		$email=$_SESSION['email'];

 
               
			$query=mysqli_query($conn,"select * from connected where usereid1='$email'||usereid2='$email' order by date_created desc");
			while($row=mysqli_fetch_array($query)){
				$num=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'");

	$sql_select="SELECT * FROM userr_l1
      WHERE email='$row[usereid1]'";

      $select_result1=$conn->query($sql_select);
    $row1 = $select_result1->fetch_array(MYSQLI_NUM);

      if(!$select_result1) die("Database Access Failed:".$conn->error);
      else{ $d=$row1[1]; }


      $sql_select="SELECT * FROM userr_l1
      WHERE email='$row[usereid2]'";

      $select_result2=$conn->query($sql_select);
    $row2 = $select_result2->fetch_array(MYSQLI_NUM);

      if(!$select_result1) die("Database Access Failed:".$conn->error);
      else{ $e=$row2[1]; }
			?>
			<tr>
				
				<td><span class="glyphicon glyphicon-user"></span> 
					<input type="hidden" id="name<?php echo $row['chatroomid']; ?>" value="<?php echo $row['usereid2']; ?>">
					<span style="color:blue">
					<?php if($row['usereid1']==$email){echo $e;} else echo $d; ?></span></td>
				<input type="hidden" id="pass<?php echo $row['chatroomid']; ?>" >
				<td><span style="color:blue"><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></span></td>
				<td><a href="chatroom.php?id=<?php echo $row['chatroomid']; echo "%J";?>" class="btn btn-info">
					<span class="glyphicon glyphicon-comment"></span><span style="color:green"> <b>JOIN</b></span></a></td>
				
			</tr>
			<?php
				}
			?>
	    </tbody>
    </table>                     
</div>