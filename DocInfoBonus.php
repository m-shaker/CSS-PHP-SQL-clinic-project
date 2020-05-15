<!-- The script in this file is for the bonus question. It 
will list the selected doctor's information and image if 
exists. It also Give the user the option to add an image 
url if a doctor image does not exist in the table --> 

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

//Get the selected doctor license number
$whichDoctor= $_POST["doctor"];

$query = "SELECT d.docimage, d.doctorlicensenumber, d.licensedsince, d.speciality, d.firstname, d.lastname, h.name FROM
doctor d, hospital h WHERE d.doctorlicensenumber = '$whichDoctor' AND d.hospitalcode = h.hospitalcode";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}

//List doctors information
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
    echo $row["name"]."<br>";    
    echo "<b>"."Doctor image: "."</b>";
    //Check if an image exist or not
    if(!$row["docimage"]){
        echo "There are no image for this doctor. If you want to add an image, then enter the image url and click on the Add Image button below";
        echo "<form action='AddDocImage.php' method='post'>";
        echo "<br>"."<b>"."Enter the image url here: "."</b>";
        echo "<input type='text' name='url'>"."<br>";
        echo '<input type="hidden" name="DocLicense" value="'.$row["doctorlicensenumber"].'">';
        echo "<br>"."<input type='submit' class='submit' value='Add Image'>";
        echo "</form>";        
    }
    else{        
        echo "<br>";
        echo '<img src="' . $row["docimage"] . '" height="300" width="300">';
    }
}

//Free up the memory associated with result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
