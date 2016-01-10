<<<<<<< HEAD
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


=======
<?php
//var_dump($_POST);
if (!empty($_POST)) {
    $sel_course = $_POST['sel_course'];
} else {
    $sel_course = 1;
}
echo "<select name='sel_disc' onchange='disciplineChange()'>";
    include "connect.php";
    $sql = "SELECT * FROM discipline_table WHERE course_id = ".$sel_course;
    var_dump($sql);
    $query = mysqli_query($con, $sql);
        echo "<option value='0'>-- Select Discipline --</option>";
    while($row = $query->fetch_assoc()) {
        echo "<option value=".$row['discipline_id'].">".$row['discipline_name']."</option>";
    }
echo "</select>";
>>>>>>> a6d7089301d0182504668962b1572fe48b9c9e17
?>