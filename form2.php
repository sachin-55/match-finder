<?php


echo <<<_END



<!DOCTYPE html>
<html>
<head>
	<title> registration details	</title>
	<style>
	input{
		color:#34ff32;
		padding:5px;
		width:50%;
		background-color:#fff;
		height:20px;
		margin:5px;

	}
input[type=submit ]{
	width: 8%;
	background-color:#ab0045	;
	height:50px;
	float:centre;
	margin-left:150px;
	border:solid blue;
	border-radius:50%;
	cursor:pointer;

}

	#eform{
		text-alignment:centre;
	}
	</style>
</head>
<body >
<span id="eform">
<input type="text" name="etext1" placeholder="Higher Education level"></br>
<input type="text" name="etext2" placeholder="Field"></br>
<input type="text" name="etext3" placeholder="Work Area"></br>
<input type="text" name="etext4" placeholder="Annual Income"></br>
&emsp;&emsp;&emsp;<input type="submit" name="etext5" value="Submit"></br>
</span>






</body>
</html>













_END;













?>