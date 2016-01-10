<<<<<<< HEAD

<?php
	
	include("connect.php");

	
	session_start();

	if(isset($_POST['Submit']))
	{
			
	}

?>



<!DOCTYPE html>

		<script type="text/javascript" src="js/jquery.min.js"></script>

<script>
			$(document).ready(function() {
				$("select[name=sel_course]").change(function() {
					var sel  = $("select[name=sel_course]").val();
					var disc = $("select[name=sel_disc]").val();
					//alert(sel);

					var link = "fetch_subject.php";
					var data = {
							sel_course: sel,
							sel_discipline: disc
						};
					var success = function(response) {
						$("#subject").html(response);
					}
					$.post(link, data, success, "html");
				})
				
				$("select[name=sel_disc]").change(function() {
					var sel = $(this).val();
					var disc = $("select[name=sel_disc]").val();
					//alert(sel);
					
					var link    = "fetch_discipline.php";
					var link_2  = "fetch_subject.php";
					var data = {
						sel_course: sel,
						sel_discipline: disc
					};
					
					var success = function(response) {
						$("#discipline").html(response);
					}
					
					var success_2 = function(response) {
						$("#subject").html(response);
					}
					$.post(link, data, success, "html");
					$.post(link_2, data, success_2, "html");
				})
				
				$("input[name=Submit]").click(function() {
					var link = "login_action.php";
					var data = $("#login_form").serialize();
					var success = function(response) {
						if(response == "0") {
							alert("Username or Password did not match!");
						} else {
							alert("Successfully logged in!");
							setTimeout(function(){
								window.location.href = "Index.php";
							}, 1000);
						}
					}
					$.post(link, data, success, "html");
				});         
			});
			
			function courseChange() {
				var sel  = $("select[name=sel_course]").val();
				var disc = $("select[name=sel_disc]").val();
				//alert(sel);

				var link    = "fetch_discipline.php";
				var link_2  = "fetch_subject.php";
				var data = {
					sel_course: sel,
					sel_discipline: disc
				};

				var success = function(response) {
					$("#discipline").html(response);
				}

				var success_2 = function(response) {
					$("#subject").html(response);
				}
				$.post(link, data, success, "html");
				$.post(link_2, data, success_2, "html");
			}
			
			function disciplineChange() {
				var sel  = $("select[name=sel_course]").val();
				var disc = $("select[name=sel_disc]").val();
				//alert(sel);

				var link = "fetch_subject.php";
				var data = {
						sel_course: sel,
						sel_discipline: disc
					};
				var success = function(response) {
					$("#subject").html(response);
				}
				$.post(link, data, success, "html");
			}

			function subjectPost() {
				var form_data = $("form[name=subject_details]").serialize();
				var link = "admin_enter_subject_action.php?p=new";
				var success = function(response) {
					alert(response);
					setTimeout(function(){
								window.location.href = "admin_enter_subjects.php";
							}, 2000);
				}
				$.post(link, form_data, success, "html");
			}
		</script>

<html>

	<head>
	
		<title>Admin HomePage</title>
		
		<link type="text/css" rel="stylesheet" href="admin_Index.css">
		
		<style type="text/css">
		
			.container
			{
				height: 600px;
			}
			
			form #left_panel
			{
				float:left;
				height:370px;
				width:500px;
			
			}
			form #right_panel
			{
				float:left;
				height:340px;
				width:400px;
				padding-top:40px;
				
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
		
			<form method="post" name="subject_details" action="admin_enter_subject_action.php?p=new" onsubmit="subjectPost(); return false;">
			
				<div id="left_panel">
				
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
					
					<input type="radio" value="1" name="major" checked=checked>YES
					<input type="radio" value="0" name="major">NO
				
				</div>
				
				<div id="radio2">
				
					<b>Core:</b>
					
					<input type="radio" value="1" name="core" checked=checked>YES
					<input type="radio" value="0" name="core">NO
				
				</div>
				
				<div id="radio3">
				
					<b>Elective:</b>
					
					<input type="radio" value="1" name="elective" checked=checked>YES
					<input type="radio" value="0" name="elective">NO
					
					
				</div>
				
				<br>

				<div id="course">
						
						<b>Course</b> :
						<select name="sel_course" onchange="courseChange()">
							<?php 
								$sql = "SELECT * FROM course_table";
								$query = mysqli_query($con, $sql);
								echo "<option value='0'>-- Select Course--</option>";
								while($row = $query->fetch_assoc()) {
									echo "<option value=".$row['course_id'].">".$row['course_desc']."</option>";
								}
							?>
						</select>
					</div>

				<br>
				
				<b>Discipline</b> : 
				<div id="discipline">
					
					
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
				
				</div>
				
				<div id="right_panel">
				
				<div id="code">
				
					<b>Day:</b>
					
					<input type="text" name="day" style="height:30px; width:150px; margin-left:30px" placeholder="E.g: Monday">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Start Time:</b>
					
					<input type="text" name="start_time" style="height:30px; width:150px" placeholder="HH:MM:SS">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>End Time:</b>
					
					<input type="text" name="end_time" style="height:30px; width:150px" placeholder="HH:MM:SS">
				
				</div>
				
				<br>
				
				<div id="code">
				
					<b>Room No:</b>
					
					<input type="text" name="room_no" style="height:30px; width:150px" placeholder="E.g: A1-01">
				
				</div>
				
				<div id="checkbox">
				
					<input type="checkbox" name="lecture">Lecture
					<input type="checkbox" name="workshop">Workshop
					<input type="checkbox" name="Tutorial">Tutorial
					<input type="checkbox" name="lab">Lab
					
				</div>
				
				</div>
				
				<button type="submit" name="submit" style="height:30px; width:100px; font-size:15px; margin-top:20px; margin-left:100px; font-weight:bold">SUBMIT</button>
			
			
			</form>
			
			
		</div>
		
	</body>
	
=======

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
    
>>>>>>> a6d7089301d0182504668962b1572fe48b9c9e17
</html>