<!-- The code in this  page retrieve patient first name and last name and puts them 
in a drop down menu -->

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php
$query = "SELECT * FROM patient";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//Adding patient first name and last name in a drop down menu
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["patientohipnumber"].'">';
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

