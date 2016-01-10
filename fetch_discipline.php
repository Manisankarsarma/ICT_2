<?php

if (isset($post_discipline_id) && $post_discipline_id != "") {
    $discipline_selected = ($post_discipline_id == $row['discipline_id']) ? "selected" : "";
} 

if (!empty($_POST)) {
    $sel_course = $_POST['sel_course'];
} else {
    $sel_course = 1;
}
echo "<select name='sel_disc' onchange='disciplineChange()'>";
    include "connect.php";
    $sql = "SELECT * FROM discipline_table WHERE course_id = ".$sel_course;
    $query = mysqli_query($con, $sql);
        echo "<option value='0'>-- Select Discipline --</option>";
    while($row = $query->fetch_assoc()) {
        $discipline_selected = ($post_discipline_id == $row['discipline_id']) ? "selected" : "";
        echo "<option value=".$row['discipline_id']." $discipline_selected>".$row['discipline_name']."</option>";
    }
echo "</select>";


?>