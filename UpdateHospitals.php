<!--
The purpose of the code in this file is to update the name 
of the hospital that the user selected based on the value 
that the user entered
-->

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
//Getting the values that the user entered and 
//saving them in variables
$NewHospName = $_POST["newname"];
$OldHospCode = $_POST["hospitalcode"];

$query = "UPDATE hospital SET name = '$NewHospName' WHERE hospitalcode = '$OldHospCode'";

//Check for errors
if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
}

echo "<h2>"."The hospital name was updated!"."</h2>";
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
