<!-- The code in this file gets the license number of doctors who are treating patient 
and adds that license number to the patient OHIP number, then stores 
the value of the doctor license number and patient OHIP number in one variable -->


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

//Save doctor license number and patient OHIP in one variable and 
//make the variable look like an array
$TreatsPrimaryKey = "[";
while ($row = mysqli_fetch_assoc($result)) {
     $TreatsPrimaryKey .= "'".$row["doctorlicensenumber"];
     $TreatsPrimaryKey .= $row["patientohipnumber"]."'".",";
}
$TreatsPrimaryKey .= "]";

//Free up memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
