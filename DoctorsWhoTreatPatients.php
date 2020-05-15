<!--
The script in this file is to save the the license number 
of all  doctors who treat a patient in one variable
-->


<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
$query = "SELECT * FROM treats";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
    die("databases query failed.");
}

//Save output in a variable and make it look 
//like an array
$treatingpatient = "[";
while ($row = mysqli_fetch_assoc($result)) {
       $treatingpatient .= "'".$row["doctorlicensenumber"]."'".",";
}
$treatingpatient .= "]";

//Free up memory associated with test
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
