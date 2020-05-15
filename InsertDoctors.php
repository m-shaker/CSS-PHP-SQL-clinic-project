<!-- The script in this file enable the user to add a new doctor to the database -->

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>
<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">
</head>
<body>
<h1>Welcome to OHIP</h1>



<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
//Getting the information that the user entered and saving it
//in variables
$FirstName = $_POST["firstname"];
$LastName = $_POST["lastname"];
$LicenseNumber = $_POST["licensenumber"];
$Speciality = $_POST["speciality"];
$Hospital = $_POST["hospitalcode"];
$LicenseDate = $_POST["licensedsince"];


$query = 'INSERT INTO doctor(doctorlicensenumber, licensedsince, speciality, firstname, lastname, hospitalcode) 
VALUES("' . $LicenseNumber . '","' . $LicenseDate . '","' . $Speciality . '","' . $FirstName . '",
"' . $LastName . '","' . $Hospital . '")';

//Checking for errors
if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
}

echo "<h2>"."The doctor was added to the database!"."</h2>";
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>

