<!--The script in this file retrieve doctor information 
that who recieved their license before  a date that the 
user entered ->

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>
<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">
</head>
<body>
<h1>Welcome to OHIP</h1>
<h2>Here are the doctors licenses before the selected date</h2>

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php

//Getting the date that the user entered
//and storing it in a variable
$whichDate= $_POST["licensedate"];

$query = "SELECT firstname,lastname,speciality,licensedsince FROM doctor WHERE licensedsince < '$whichDate' ";
$result = mysqli_query($connection,$query);

//Checking for erros
if (!$result) {
     die("databases query failed.");
}

//Lisitng information using a while loop
//and an ordered html list
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo "<b>"."First Name: "."</b>";
    echo $row["firstname"]."<br>";
    echo "<b>"."Last Name: "."</b>";
    echo $row["lastname"]."<br>";
    echo "<b>"."Speciality: "."</b>";
    echo $row["speciality"]."<br>";
    echo "<b>"."Licensed Since: "."</b>";
    echo $row["licensedsince"];
    echo  "</li>";
}
echo "</ol>";

//Free the memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
