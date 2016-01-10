

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
            var count = 2;
			function validate() 
			{
				var un = document.myform.username.value;
				var pw = document.myform.pword.value;
				var valid = false;

				var unArray = ["admin"];  // as many as you like - no comma after final entry
				var pwArray = ["admin123"];  // the corresponding passwords;

				for (var i=0; i <unArray.length; i++) 
				{
					if ((un == unArray[i]) && (pw == pwArray[i])) 
					{
						valid = true;
						break;
					}
				}

				if (valid) 
				{
					alert ("Login was successful");
					window.location = "admin_home.php";
					return false;
				}

				var t = " tries";
				if (count == 1) 
				{
					t = " try"
					
				}

				if (count >= 1) 
				{
					alert ("Invalid username and/or password.  You have " + count + t + " left.");
					document.myform.username.value = "";
					document.myform.pword.value = "";
					setTimeout("document.myform.username.focus()", 25);
					setTimeout("document.myform.username.select()", 25);
					count --;
				}

				else 
				{
					alert ("Still incorrect! You have no more tries left!");
					document.myform.username.value = "No more tries allowed!";
					document.myform.pword.value = "";
					document.myform.username.disabled = true;
					document.myform.pword.disabled = true;
					return false;
				}

			}

		</script>
        
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
        
        <div class="container">
        
        
             <div class="login-card">
                 
                 <h2 style="text-align:center">Admin Login</h2>
                 
                 <form name = "myform" id="login_form" onclick="validate()">
                     
                     
                     
                     <label>UserName:</label><br>
                     <input type="text" name="username" style="height:20px; width:200px" placeholder="Enter Admin ID"> <br>
                     
                     
                     <label>Password:</label><br>
                     <input type="password" name="pword"  style="height:20px; width:200px" placeholder="Enter Admin Password"><br><br>

                    <input type="button" value="Login" name="submit" style="height:30px; width:100px; margin-left:100px; font-weight:bold"><br><br>
                     

                 </form>
                
                
            </div>
 
            
        </div>
        
        
        
    </body>
    
</html>