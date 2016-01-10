<?php
	
	include("connect.php");

	
	session_start();

	if(isset($_POST['Submit']))
	{
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
	
	}

?>

<!DOCTYPE HTML>

	<head>
	
		<title>radio</title>
	</head>
	
	<body>
	<tr>
		<input type="radio" name="subject" value="<?php echo $row['Subject_name']?>">MIT
		
		<td><?php echo $row['Subject_code']?></td>
		
		</tr>
		
		<input type="radio" name="subject" value="mba">MBA
		
		<input type="radio" name="subject" value="mpa">MPA
		
		<input type="radio" name="subject" value="psych">Psychology
	
	</body>


</html>