<!-- The script in this file deletes a relation between a doctor treating a patient as selected 
by the user. In another words, it removes from the treats table a doctor license number and 
a patient OHIP number that the doctor treats  --> 

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>

<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">

</head>
<body>

<!-- Referencing the JavaScript file -->
<script src="validateEntries.js"></script>;

<h1>Welcome to OHIP</h1>

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php
//Getting the doctor license number and patient OHIP number 
//from the user selection
$whichRelation = $_POST["unassign"];

//Splitting the doctor license number and patient OHIP number in 
//two variables
$whichDoctor = substr($whichRelation, 0, 4);
$whichPatient = substr($whichRelation, 4, 13);

//Deleting the relationship from treats table
$query = "DELETE FROM treats WHERE doctorlicensenumber = '$whichDoctor' AND patientohipnumber = '$whichPatient'";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}
echo "<h2>"."The doctor was unassigned from treating the patient!"."</h2>";
?>


<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>

