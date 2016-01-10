<?php session_start();
include "connect.php"; 
//connects to the database

	if (isset($_POST['username']))
	{
		$username = $_POST['username'];
		$query="select * from registration where email='$username'";
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
    
        <title>JCU Online Timetable</title>
        
        <link type="text/css" rel="stylesheet" href="Index.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
        <style>
        
            .container
            {
                height: 420px;
            }
            
            
        </style>
        
        
        
    </head>
    
    <body>
    
        <div class="wrapper">
        
            <div id="logo">
                
                <a href="Index.php"><img src="Images/JCUSColourLogo.png"></a>
            
            </div>
			
			<div id="main_title">
            
                ONLINE TIMETABLE SYSTEM
                
            </div>
			
		</div>

		
            <div class="top_nav">
            
                <ul>
                
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="Instructions.html">Instructions</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                    
                </ul>
                
            </div>
            
        
        
        <div class="container">
        
        
             <div class="login-card">
                 
                 <h3 style="text-align:center; margin-top:70px">Forgot Password</h3>
                 
                 <form name = "myform" id="login_form" method="post">
                     
                     
                     
                     <label> Enter your JCU Mail ID : </label>
		<input id="username" type="text" name="username" style="height:20px; width:200px"/><br><br>
		<input id="button" type="submit" name="button" value="Submit" style="height:30px; font-weight:bold; margin-left:140px;"/>

                 </form>
                
                
	
            </div>
 
            
        </div>
        
        <div class="footer">
            
            <div id="foot1">
            
                <div id="logo2">
                
                    <a href="#"><img src="Images/JCU%20Australia.png"></a>
                    
                </div>
                
                <div id="right_panel">
                
                    <li>1 University</li>
                    <li>2 Countries</li>
                    <li>3 Tropical locations</li><br><br>
                    <p>Creating a brighter future for life in the tropics world-wide through graduates and discoveries that make a difference.</p>
                
                </div>
                
            </div>
            
            <div id="foot2">
            
                <div id="left_panel">
                    
                    <ul>
                
                        <li><a href="#"><img src="Images/Youtube.png"></a></li>
                        <li><a href="#"><img src="Images/Twitter.png"></a></li>
                        <li><a href="#"><img src="Images/Facebook.png"></a></li>
                        <li><a href="#"><img src="Images/Instagram.png"></a></li>
                
                    </ul>
                    
                </div>
                
                <div id="right_panel">
                
                    <ul>
                    
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Site map</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Email for Staff</a></li>

                    </ul>
                
                </div>
                
            </div>
            
            <div id="foot3">
                
                <div id="copyright">&copy; All copyrights Reserved.
            
                </div>
            
            </div>
        
        </div>
        
    </body>
    
</html>