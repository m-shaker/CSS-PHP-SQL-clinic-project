<!-- The script in this file lists the first name and last name of doctors who are treating a patient right 
next to the first and last name of the patient that they are treating. This information is listed next 
to a radio button to enable the user to select a relationship(a doctor treating a patient) so that they 
can unassign the doctor from treating that patient -->

<?php
//Establishing a connection to the database
include 'connectdb.php';
?>

<?php

$query = "SELECT t.doctorlicensenumber AS 'DoctorLicense', t.patientohipnumber AS 'PatientOHIP', d.doctorlicensenumber,
d.firstname AS 'DoctorFirstName', d.lastname AS 'DoctorLastName', p.firstname AS 'PatientFirstName',
p.lastname AS 'PatientLastName', p.patientohipnumber FROM treats t, doctor d, patient p WHERE
d.doctorlicensenumber = t.doctorlicensenumber AND p.patientohipnumber = t.patientohipnumber";

$result = mysqli_query($connection,$query);

//Check for errors
if (!$result) {
     die("databases query failed.");
}


//Printing results next to a radio button
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo '<input type="radio" name="unassign" value="'.$row["DoctorLicense"].$row["PatientOHIP"].'" required>';
    echo "Doctor ";
    echo $row["DoctorFirstName"]." ".$row["DoctorLastName"];
    echo " is currently treating ";
    echo $row["PatientFirstName"]." ".$row["PatientLastName"];
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

