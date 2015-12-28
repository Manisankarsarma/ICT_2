<?php
	
	include("connect.php");

    
	session_start();

	if(isset($_POST['Submit']))
	{
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
	
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
        
        <script>
            $(document).ready(function() {
                $("input[name=Submit]").click(function() {
                    var link = "login_action.php";
                    var data = $("#login_form").serialize();
                    var success = function(response) {
                        if(response == "0") {
                            alert("Username or Password did not match!");
                        } else {
                            alert("Successfully logged in!");
                            setTimeout(function(){
                                window.location.href = "subjects_display.php";
                            }, 1000);
                        }
                    }
                    $.post(link, data, success, "html");
                });         
            });
        </script>
        
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
                 
                 <h2 style="text-align:center">LOGIN</h2>
                 
                 <form name = "myform" id="login_form" method="post">
                     
                     
                     
                     <label>UserName:</label><br>
                     <input type="text" name="username" style="height:20px; width:200px" placeholder="Enter Your JCU ID"> <br>
                     
                     
                     <label>Password:</label><br>
                     <input type="password" name="password"  style="height:20px; width:200px" placeholder="Enter Your Password"><br><br>

                    <input type="button" value="Submit" name="Submit" style="height:30px; width:100px; margin-left:100px; font-weight:bold"><br><br>
                     

                 </form>
                
                 <a href="#">Forgot Password?</a>
                 <a href="Register.php">Create Account</a>
	
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