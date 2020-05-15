<!-- The script in this file updates the docimage column in the doctor table with the url 
that the user entered for the doctor that the user selected -->

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

//Getting the values from the form 
$whichDoc = $_POST["DocLicense"];
$whichUrl = $_POST["url"];


$query = 'UPDATE doctor SET docimage = "'.$whichUrl.'" WHERE doctorlicensenumber = "'.$whichDoc.'"';

//Checking for error
if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
}

//Displaying message to let the user know that 
//the image was added successfully
echo "<h2>"."The doctor image was added to the database!"."</h2>";
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>

