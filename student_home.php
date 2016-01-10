

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
			
			.header
			{
				margin-top: 50px;
				margin-left:430px;
			}

			
			.modules
			{
				height: 200px;
				width: 100%;
				text-align: center;
				padding-top: 50px;
    
			}

			button
			{
				font-size: 20px;
				margin-left: 50px;
				height: 100px;
				width: 140px;
			}
			button a
			{
				text-decoration: none;
				color: black;
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
                    <li><a href="#">Logged in as..</a></li>
                    <li><a href="login.php">Logout</a></li>
                    
                    
                </ul>
                
            </div>
            
        
        
        <div class="container">
        
        
             <div class="header">
            
                <h1>STUDENT HOMEPAGE</h1>
                
            </div>
			
		
            
            <div class="modules">
            
                <button type="submit" name="edit" style="background-color:RGB(85,107,47)"><a href="subjects_display.php">Select Subjects</a></button>
                
                <button type="submit" name="view" style="background-color:RGB(201,103,92)"><a href="#">View Timetable</a></button>
                
               
            
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