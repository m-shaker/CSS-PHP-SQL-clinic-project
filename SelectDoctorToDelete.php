<!-- The script in this file adds doctor's first name and last name in a drop down menu 
so that the user can choose which doctor to delete -->

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
$query = "SELECT * FROM doctor";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//Adding doctors to the drop down menu
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["doctorlicensenumber"].'">';
    echo $row["firstname"]." ".$row["lastname"];
    echo '</option>';
}

//Free up memory associated with result
mysqli_free_result($result);
?>


<?php
//Closing connection
mysqli_close($connection);
?>
