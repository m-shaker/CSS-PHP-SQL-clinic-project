<!--This script retrieve all doctor licenses and saves them in one variable 
called $licenses -->

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

//Saving license numbers in a variable and make 
//the variable look like a Javascript array
$licenses = "[";
while ($row = mysqli_fetch_assoc($result)) {
     $licenses .= "'".$row["doctorlicensenumber"]."'".",";
}
$licenses .= "]";

//Free up memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
