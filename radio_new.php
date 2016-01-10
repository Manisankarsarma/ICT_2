
<body>

<table border="1">
    <th></th>
    <th>Subject_code</th>
    <th>Subject_name</th>

        <?php
            include('connect.php');
            $qry = $con->prepare('SELECT * FROM subject_table');
            $qry->execute();
            $row = $qry->rowCount();

            while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['subject_id'];
                $code = $row['subject_code'];
                $name = $row['Subject_name'];                      
        ?>
        <?php echo "

        <tr title='Click to edit or delete record'>
           <td><input type = 'radio' name = 'radio' class ='radio' value = $row[subject_id]></td>
           <td>$code</td>
           <td>$name</td>                            
        </tr>

        "; ?>
        <?php } ?>      
</table>
<input type="button" value="Delete Selected Fee" style="width:250px; height:40px;font-weight:bold;" onclick="delete();"><br><br>

</body>