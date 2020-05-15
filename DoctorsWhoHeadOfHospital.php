<!--
The script in this file saves the the license number
of all doctors who are head of hospital in one variable
-->


<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
$query = "SELECT * FROM hospital";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
    die("databases query failed.");
}

//Save output in a variable and make it look like 
//a Javascript array
$HospHead = "[";
while ($row = mysqli_fetch_assoc($result)) {
       $HospHead .= "'".$row["doctorlicensenumber"]."'".",";
}
$HospHead .= "]";

//Free up memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
