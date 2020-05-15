<!-- The code in this file gets all the OHIP numbers of
patients in the database and store them in a variable -->


<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
$query = "SELECT * FROM patient";

$result = mysqli_query($connection,$query);

//Check for error
if (!$result) {
    die("databases query failed.");
}

//Save all patient OHIP numbers in a variable and 
//make it look like an array
$AllOHIP = "[";
while ($row = mysqli_fetch_assoc($result)) {
     $AllOHIP .= "'".$row["patientohipnumber"]."'".",";
}
$AllOHIP .= "]";

//Free up memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
