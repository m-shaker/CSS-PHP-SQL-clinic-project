<!-- The script in this file updates the treats table based on the user assignment of a doctor 
to a patient -->

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
//Getting the values the user entered and saving them 
//in a variable
$PatientOHIP = $_POST["SelectedPatient"];
$DoctorLicenseNumber = $_POST["SelectedDocToAssign"];

$query = 'INSERT INTO treats (doctorlicensenumber, patientohipnumber) VALUES ("'.$DoctorLicenseNumber.'","'.$PatientOHIP.'")';

//Display error if query fail
$result = mysqli_query($connection,$query);
if (!$result) {
     die("Insert query failed.");
}
echo "<h2>"."Update was done successfully!"."</h2>";
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>

