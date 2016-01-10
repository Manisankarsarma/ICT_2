<<<<<<< HEAD
<?php session_start();
include "connect.php"; 
//connects to the database

	if (isset($_POST['username']))
	{
		$username = $_POST['username'];
		$query="select * from admin where email='$username'";
		$result   = mysqli_query($con, $query);
		
		$count=mysqli_num_rows($result);
		// If the count is equal to one, we will send message other wise display an error message.
		
		
			if ($_POST ['username'] != "") 
			{
				echo "Not found your email in our database";
			}
		
		//If the message is sent successfully, display sucess message otherwise display an error message.
		
			
	}
?>



<!DOCTYPE html>

<html>

    <head>
    
        <title>Admin HomePage</title>
        
        <link type="text/css" rel="stylesheet" href="admin_Index.css">
        
        <style>
		
			.container form
			{
				height:300px;
				width:400px;
				margin-left:400px;
				margin-top:50px;
			}
		
		</style>
		
		
    </head>
    
    <body>
    
        <div class="wrapper">
        
            <div id="logo">
                
                <a href="#"><img src="Images\JCUSColourLogo.png"></a>
            
            </div>
            
            <div id="main_title">
            
                ONLINE TIMETABLE SYSTEM
                
            </div>
                    
        </div>
        
        <div class="container">
        
            
            
            <div class="password_form">
				
				
                
                <form name = "myform" id="login_form" method="post">
                     
                     <h2>Change Admin Password</h2>
                     
                     <label> Enter your JCU Mail ID: </label></br></br>
		<input id="username" type="text" name="username" style="height:20px; width:200px"/><br><br>
		<input id="button" type="submit" name="button" value="Submit" style="height:30px; font-weight:bold; margin-left:140px;"/>

                 </form>

            
            </div>
            
            
        </div>
        
    </body>
    
=======
<!DOCTYPE html>

<html>

    <head>
    
        <title>Admin HomePage</title>
        
        <link type="text/css" rel="stylesheet" href="admin_Index.css">
        
        
    </head>
    
    <body>
    
        <div class="wrapper">
        
            <div id="logo">
                
                <a href="#"><img src="Images\JCUSColourLogo.png"></a>
            
            </div>
            
            <div id="main_title">
            
                ONLINE TIMETABLE SYSTEM
                
            </div>
                    
        </div>
        
        <div class="container">
        
            <div class="header">
            
                <h1>Change Admin Password</h1>
                
            </div>
            
            <div class="password_form">
                
                <fieldset>
                    
                    <label for="old_password">Old Password:</label>
                    <input type="password" name="Old_password" size="20"><br><br>
                    
                    <label for="new_password">New Password:</label>
                    <input type="password" name="txtSchoolName" size="20"><br><br>
                    
                    <label for="confirm_password">Confirm New Password:</label>                             <input type="password" name="confirm_password" size="20"><br><br>
                    
                    
                    <button type="submit" style="height:30px; width:100px; margin-left:300px">SUBMIT</button>

                </fieldset>

            
            </div>
            
            
        </div>
        
    </body>
    
>>>>>>> a6d7089301d0182504668962b1572fe48b9c9e17
</html>