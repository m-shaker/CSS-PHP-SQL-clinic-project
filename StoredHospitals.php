<!--
The purpose of the code in this file is to retrive the hospitals 
stored in the database and list them in radio buttons
-->

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
$query = "SELECT * FROM hospital";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
    die("databases query failed.");
}

//List hospitals in the database in radio buttons
while ($row = mysqli_fetch_assoc($result)) {
       echo '<input type="radio" name="hospitalcode" value="'.$row["hospitalcode"].'" required>';
       echo $row["name"];
}

//Free up memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

