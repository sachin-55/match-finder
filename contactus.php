<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
</head>
<style type="text/css">
	body
	{
		float: left;
		padding: 30px 10px 10px 20%;
		font-size: 20px;
		
		
	}
	#p
	{
		background-color: lightblue;
		
		padding: 10px;
	}
	#back
	{
		float: right;
		padding: 3px;
		border: 1px solid gray;
		border-radius: 10px;
		cursor: pointer;
		text-decoration: none;

	}
	#back:hover
	{
		padding: 4px;
		background-color: gray;
	}

</style>
<body>
	<div id="p">
		<p>Contact Person  : Matchfinder Team</p>
		<p>Address         : Himalaya College Of Engineering (HCOE), Chyasal, Lalitpur</p>
    	<p>Phone Number    : 9862043408, 01-5540555</p>
    	<p>E-mail          : Matchfinder1234@gmail.com</p>	 
	</div>
	<br>
	<button id="back" onclick="goBack()">Back</button>

	<script>
	function goBack() 
		{
    		window.history.back();
		}
</script>
</body>
</html>