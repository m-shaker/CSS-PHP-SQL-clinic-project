<!-- This script fetch and output the first name and last name of 
all doctors who do not treat any patients --> 

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php

$query = "SELECT firstname,lastname FROM doctor WHERE doctorlicensenumber NOT IN (SELECT doctorlicensenumber FROM treats)";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//Output first name and last name of doctors not treating patients
//in an ordered list
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["firstname"]." ".$row["lastname"];
    echo  "</li>";
}
echo "</ol>";

//Free up memory associated with result
mysqli_free_result($result);
?>


<?php
//Closing connection
mysqli_close($connection);
?>
