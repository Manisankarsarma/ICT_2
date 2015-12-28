
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
        
        <style type="text/css">
        
            .container
            {
                height: 500px;
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
            
            <h2 style="text-align:center">Add/Edit Subjects</h2>
        
            <form method="post" name="subject_details" action="">
            
                <div id="term">
                        <b>Term</b> : 
                        <select name="sel_term">
                            <?php 
                                $sql = "SELECT * FROM term";
                                $query = mysqli_query($con, $sql);

                                while($row = $query->fetch_assoc()) {
                                    echo "<option value=".$row['ID'].">".$row['TERM']."</option>";
                                }
                            ?>
                        </select>
                </div>
                
                <div id="radio1">
                
                    <b>Major:</b>
                    
                    <input type="radio" name="major">YES
                    <input type="radio" name="major">NO
                
                </div>
                
                <div id="radio2">
                
                    <b>Core:</b>
                    
                    <input type="radio" name="core">YES
                    <input type="radio" name="core">NO
                
                </div>
                
                <div id="radio3">
                
                    <b>Elective:</b>
                    
                    <input type="radio" name="elective">YES
                    <input type="radio" name="elective">NO
                
                </div>
                
                <br>
                
                <div id="discipline">
                    
                    <b>Discipline</b> : 
                    
                        <?php
                            include_once "fetch_discipline.php";
                        ?>
                </div>
                
                <br>
                <div id="code">
                
                    <b>Subject Code:</b>
                    
                    <input type="text" name="subject_code" style="height:30px; width:150px">
                
                </div>
                
                <br>
                <div id="code">
                
                    <b>Subject Name:</b>
                    
                    <input type="text" name="subject_name" style="height:30px; width:150px">
                
                </div>
                
                <div id="checkbox">
                
                    <input type="checkbox" name="lecture">Lecture
                    <input type="checkbox" name="workshop">Workshop
                    <input type="checkbox" name="Tutorial">Tutorial
                    <input type="checkbox" name="lab">Lab
                    
                </div>
                
                <button type="submit" name="submit" style="height:30px; width:100px; font-size:15px; margin-top:20px; margin-left:100px; font-weight:bold">SUBMIT</button>
            
            
            </form>
            
            
        </div>
        
    </body>
    
</html>