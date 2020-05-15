<!--The script in this file to delete a doctor that the user selected 
from a dropdown menu on the home page --> 

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
//Getting the selected doctor license number
$DocLicense = $_POST["SelectedDoc"];

//Note that the way the doctor table is set-up in the database will lead
//to a cascading delete for the treats table without additional steps
$query = "DELETE FROM doctor WHERE doctorlicensenumber = '$DocLicense'";

//Check for errors
if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
}

echo "<h2>"."The doctor and any patient the doctor treats were deleted from the database. If the doctor 
was treating any patient you would have seen an alert pop up to let you know and asks if you want to continue 
with deleting the doctor. If you didn't see any alerts, then the doctor was not treating any 
patients"."</h2>";
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
