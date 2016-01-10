<?php

	$con = mysqli_connect("localhost","root","","ict_2");
	if(mysqli_connect_errno())
	{
		echo "Error Occured while connecting to the database".mysqli_connect_errno();
	}


?>