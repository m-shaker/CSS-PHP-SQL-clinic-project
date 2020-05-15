<!-- The script in this file is for the bonus question. It lists doctor's first name and 
last name next to a radio button to enable to the user to choose a doctor to see the doctor's 
information and image if it exists -->

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php
$query = "SELECT firstname, lastname, doctorlicensenumber FROM doctor";
$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//Adding a radio button to allow user to choose a doctor and listing all 
//the doctors in the database
echo '<form action="DocInfoBonus.php" method="post">';
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

//Free up memory associated with result
mysqli_free_result($result);
?>


<?php
//Closing connection
mysqli_close($connection);
?>
