<<<<<<< HEAD
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
				height: 450px;
				background-color:white;
			}
			
			#subject
			{
				margin-top:10px;
			}
			
		</style>
		
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

			function formStudent() {
				var data = $("form[name=form_studentsubject]").serialize();
				console.log(data);
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
		
			<div class="top_nav">
			
				<ul>
                
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="#">Logged in as..</a></li>
                    <li><a href="login.php">Logout</a></li>
                    
                    
                </ul>
				
			</div>
			
		
		
		<div class="container">
			<div id="left_panel">
				<form method="post" name="form_studentsubject" action="subject_display_confirm.php" onsubmit="formStudent();">
					
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
					
					<br><br>
									
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
					
					<br><br>
										
					<b>Discipline</b> :
					<div id="discipline">
						
						<?php
							include_once "fetch_discipline.php";
						?>
					</div>
			</div>
			
			<div id="right_panel">
				<div id="subject">
					<?php
						include_once "fetch_subject.php";
					?>
				</div>

				<div id="hidden_id">
					<input type="hidden" name="hidden_input_major" value="0">
					<input type="hidden" name="hidden_input_core" value="0">
					<input type="hidden" name="hidden_input_elective" value="0">

					<input type="hidden" name="hidden_label_major" value="0">
					<input type="hidden" name="hidden_label_core" value="0">
					<input type="hidden" name="hidden_label_elective" value="0">
				</div>
			
				<input type="submit" value="Submit" style="font-weight:bolder; margin-left:210px; height:40px; width:100px; margin-top:30px; margin-bottom:20px"/>
			</div>
			
			</form>
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
	
=======
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
            
            <div id="left_panel">
                <form method="post" name="form_dropdown" action="">
                    
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
                    
                    <br><br>
                                    
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
                    
                    <br><br>
                                        
                    <div id="discipline">
                        <b>Discipline</b> :
                        
                        <?php
                            include_once "fetch_discipline.php";
                        ?>
                    </div>
                </form>
            </div>
            
            <div id="right_panel">
                <div id="subject">
                    <?php
                        include_once "fetch_subject.php";
                    ?>
                </div>
            
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
    
>>>>>>> a6d7089301d0182504668962b1572fe48b9c9e17
</html>