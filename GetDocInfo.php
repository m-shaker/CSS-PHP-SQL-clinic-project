<!-- The script in this file outputs doctor's, that the user selected, information including
the hospital that the doctor works at -->

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>
<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">
</head>
<body>
<h1>Welcome to OHIP</h1>
<h2>Here are the doctor information</h2>

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php
//Getting the license number of the doctor that 
//the user selected 
$whichDoctor= $_POST["doctor"];

$query = "SELECT d.doctorlicensenumber, d.licensedsince, d.speciality, d.firstname, d.lastname, h.name FROM 
doctor d, hospital h WHERE d.doctorlicensenumber = '$whichDoctor' AND d.hospitalcode = h.hospitalcode";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//Output the doctor's information 
while ($row = mysqli_fetch_assoc($result)) {
    echo "<b>"."First name:  "."</b>";
    echo $row["firstname"]."<br>";
    echo "<b>"."Last name:  "."</b>";
    echo $row["lastname"]."<br>";
    echo "<b>"."License number: "."</b>";
    echo $row["doctorlicensenumber"]."<br>";
    echo "<b>"."Licensed since:  "."</b>";
    echo $row["licensedsince"]."<br>";
    echo "<b>"."Speciality:  "."</b>";
    echo $row["speciality"]."<br>";
    echo "<b>"."Hospital name:  "."</b>";
    echo $row["name"];
}

//Free memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
