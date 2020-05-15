<!--The script in this file arrange doctors in the database 
by either the first or last name and either ascendingly or 
descending as determined by the user -->

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>
<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">
</head>
<body>
<h1>Welcome to OHIP</h1>
<h2>Our doctors</h2>

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php
//Retrieve the options that the user entered and 
//store them in variables
$whichName= $_POST["name"];
$whichOrder = $_POST["nameordering"];


$query = "SELECT * FROM doctor ORDER BY $whichName $whichOrder";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}


//Adding a radio buttons to allow user to choose a doctor
echo '<form action="GetDocInfo.php" method="post">';
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo '<input type="radio" name="doctor" value="'.$row["doctorlicensenumber"].'" required>';
    echo $row["firstname"]." ".$row["lastname"];
    echo  "</li>";
}
echo "</ol>";
echo '<input type="submit" class="submit" value="Get Selected Doctor Information">';
echo "</form>";

//Free up the memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
