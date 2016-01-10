<?php
	
	include("connect.php");

	
	session_start();

	if(isset($_POST['Submit']))
	{
			
	}

?>



<!DOCTYPE html>

<html>

    <head>
    
        <title>Admin HomePage</title>
        
        <link type="text/css" rel="stylesheet" href="admin_Index.css">
		
		<style>
		
			
			.container
			{
				height:500px;
			}
			
			#dropdowns
			{
				margin-left:300px;
				padding-top:20px;
				height:300px;
				width:550px;
				text-align:center;
				border: 1px solid black;
				
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
        
            <div class="header">
            
                <h2>View/Modify TIMETABLE</h2>
                
            </div>
            
            <div id="dropdowns">
			
				<b>Subject_ID:</b><select name="subject_id">
							<option value="">Select anyone</option>
							
							
							
							</select><br><br>
							
				<b>Lecture_Type:</b><select name="lecture_type">
							<option value="">Select anyone</option><br>
							</select><br><br>
							
				<b>Start_time:</b><select name="start_time">
							<option value="">Select anyone</option>
							</select><br><br>
				
				<b>End_time:</b><select name="end_time">
							<option value="">Select anyone</option>
							</select><br><br>
							
				<b>Day:</b><select name="day">
							<option value="">Select anyone</option>
							</select><br><br>
				
				<b>Room:</b><select name="room">
							<option value="">Select anyone</option>
							</select><br><br>
				
				<input type="submit" value="Enter">
				
			</div>
            
        </div>
        
    </body>
    
</html>