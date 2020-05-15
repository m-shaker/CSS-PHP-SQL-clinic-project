<!--
The purpose of the code in this file is to list the hospitals 
stored in the database and list information about their 
head doctor
-->


<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
//Getting data stored  in the hospital table and ordering 
//them alphabetically by the hospital name
$query = "SELECT h.name, h.startingdateasheadofhospital, h.doctorlicensenumber, d.doctorlicensenumber , 
d.firstname, d.lastname FROM hospital h, doctor d WHERE h.doctorlicensenumber = d.doctorlicensenumber ORDER BY h.name ASC";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
    die("databases query failed.");
}

//Printing the results in an ordered list
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
       echo "<li>";
       echo "<b>"."Hospital Name: "."</b>";
       echo $row["name"]."<br>";
       echo "<b>"."Head Doctor First Name: "."</b>";
       echo $row["firstname"]."<br>";
       echo "<b>"."Head Doctor Last Name: "."</b>";
       echo $row["lastname"]."<br>";
       echo "<b>"."Doctor's Start date as head: "."</b>";
       echo $row["startingdateasheadofhospital"];
       echo "</li>";
}
echo "</ol>";

//Free up the memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>
