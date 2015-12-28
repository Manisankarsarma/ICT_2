<?php
	
	include("connect.php");
	
	
	if(isset($_POST['Submit']))
	{
//        var_dump($_POST);
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username=='')
        {
            echo "<script>alert('Please enter your Username!')</script>";
            
        }
		
        if($password=='')
        {
            echo "<script>alert('Please enter the Password')</script>";
        }
		
        if ($username != "" && $password != "") {
            $check_email = "SELECT * FROM registration WHERE email='$username'";
        
            $run = mysqli_query($con, $check_email);
        
            $num = mysqli_num_rows($run);
        
            if($num>0)
            {
                echo "<script>alert('Username $username is already exist, please try another one')</script>";
        
            } else {
                $query = "insert into registration(email, password) values('$username','$password')";
                var_dump($query);
                if(mysqli_query($con, $query))
                {
                    echo "<script>alert('Registration Successful')</script>";
                }
            }
        }
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
            <div id="top_nav">
            
                <ul>
                
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#">Instructions</a></li>
                    <li><a href="#">Contact Us</a></li>
                    
                </ul>
                
            </div>
            
        </div>
        
        <div class="container">
        
        
             <div class="login-card">
                 
                 <h2 style="text-align:center">SIGNUP</h2>
                 
                 <form name = "myform" id="login_form" method="POST" action="Register.php">
                     
                     
                     
                     <label>UserName:</label><br>
                     <input type="text" name="username" style="height:20px; width:200px" placeholder="Enter Your JCU ID"> <br>
                     
                     
                     <label>Password:</label><br>
                     <input type="password" name="password"  style="height:20px; width:200px" placeholder="Enter Your Password"><br><br>

                    <input type="submit" value="Submit" name="Submit" style="height:30px; width:100px; margin-left:100px; font-weight:bold"><br><br>
                     

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