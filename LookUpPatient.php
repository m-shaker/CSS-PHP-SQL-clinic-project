<!--
The purpose of the code in this file is to retrive and list patient first name, 
last name based on the OHIP number that the user entered. The code will also output the
first name and last name of the doctor who treats that patient
-->

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>
<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">
</head>
<body>
<h1>Welcome to OHIP</h1>
<h2>Here are the patient information you requested</h2>


<?php
//Establishing a connection to the database
include 'connectdb.php';
?>


<?php
//Getting patient OHIP number that the user entered
$PatientOHIP = $_POST["OHIP"];

$query = "SELECT p.firstname AS 'PatientFirstName', p.lastname AS 'PatientLastName', p.patientohipnumber, t.patientohipnumber, 
t.doctorlicensenumber, d.doctorlicensenumber, d.doctorlicensenumber, d.firstname AS 'DoctorFirstName', 
d.lastname AS 'DoctorLastName' FROM patient p, treats t, doctor d  WHERE p.patientohipnumber = '$PatientOHIP' AND
p.patientohipnumber = t.patientohipnumber AND t.doctorlicensenumber = d.doctorlicensenumber";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
    die("databases query failed.");
}


//Declaring the variable i to keep track of iterations 
$i=0;

while ($row = mysqli_fetch_assoc($result)) {
       //The if statement is written so that we print the patient name only once but 
       //print all the doctors first name and last names who are treating that patient
       //since a patient can has multiple doctors treating him. 
       if ($i<1){
          echo "<b>"."Patient First Name: "."</b>";
          echo $row["PatientFirstName"]."<br>";
          echo "<b>"."Patient Last Name: "."</b>";
          echo $row["PatientLastName"];
          echo "<h2>"."Here are the doctor(s) names who are treating that patient:"."</h2>";
          $i=$i+1;    
       }
       echo "<b>"."Doctor First Name: "."</b>";
       echo $row["DoctorFirstName"]."<br>";
       echo "<b>"."Doctor Last Name: "."</b>";
       echo $row["DoctorLastName"]."<br>"."<br>";
}


//Free up memory associated with the result
mysqli_free_result($result);
?>

<?php
//Closing connection
mysqli_close($connection);
?>

</body>
</html>
