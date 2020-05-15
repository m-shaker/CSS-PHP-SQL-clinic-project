<!-- The script in this document builds the home page of the website and give the user 
access to its functionalities --> 

<!DOCTYPE html>
<html>
<head>
<title>OHIP Database</title>

<!-- Referencing the CSS styling sheet -->
<link rel="stylesheet" type="text/css" href="StylingWithCSS.css">

</head>
<body>

<!-- Referencing the JavaScript file --> 
<script src="validateEntries.js"></script>;

<h1>Welcome to OHIP</h1>

<!-- A form with radio buttons for the the user to choose how they want the doctor 
names arranged -->
<h2>Select how you want to order the doctor's list</h2> 
<form action="ArrangeDoc.php" method="post">
<b><i>  By  </b></i>
<input type="radio" name="name" value="firstname" required> First Name 
<b><i>or</i></b> 
<input type="radio" name="name" value="lastname">Last Name, <b><i>  and </b></i>
<input type="radio" name="nameordering" value="ASC" required>Ascendingly  
<b><i>  or  </b></i>
<input type="radio" name="nameordering" value="DESC">Descendingly
<br><br><input type="submit" value="Get Doctor Names" class="submit">
</form>


<!--A form to enable the user to enter a date to search for all doctors 
who were licensed before that date --> 
<h2>List all doctors licensed before a given date</h2>
<form action="ListDocsLicensedBeforeDate.php" method="post">
<p>Enter a date to search for doctors who were licensed before that date:
<input type="date" name="licensedate"></p>
<input type="submit" class="submit" value="Get Doctors Information">
</form>


<!-- Running the php code in DoctroLicenses.php that saves all doctor
license numbers in a variable called licenses to be able to access that 
variable -->
<?php 
include 'DoctorLicenses.php';
?>

<!-- A form to enable the user to enter a new doctor to the database -->
<h2>Enter a new doctor to the database</h2>
<form name="NewDoctor" action="InsertDoctors.php" onsubmit="return validateForm(<?php echo $licenses; ?>)" method="post">
<p>Enter doctor first name(Up to 20 characters):
<input type="text" name="firstname" maxlength="20"></p>
<p>Enter doctor last name(Up to 20 characters):
<input type="text" name="lastname" maxlength="20"></p>
<p>Doctor is licensed since:
<input type="date" name="licensedsince"></p>
<p>License number(Enter 4 characters):
<input type="text" name="licensenumber" minlength="4" maxlength="4"></p>
<p>Speciality(Up to 30 characters):
<input type="text" name="speciality" maxlength="30"></p>
<p>Hospital(Required):
<!-- Radio buttons with hospital names to enable the user to choose a hospital --> 
<?php
include 'StoredHospitals.php';
?>
</p>
<input type="submit" class="submit" value="Save New Doctor Information">
</form>

<!-- Getting license numbers of all doctors who are head of hospitals --> 
<?php 
include 'DoctorsWhoHeadOfHospital.php';
?>

<!-- Getting license numbers of all doctors who treat patient in a variable -->
<?php
include 'DoctorsWhoTreatPatients.php';
?>

<h2>Select a doctor that you want to delete:</h2>
<!-- Drop-down list to select a doctor to delete -->
<form name="DeletingDoc" action="DeleteDoctor.php" onsubmit="return validateDeletedDoc(<?php echo $treatingpatient; ?>,<?php echo $HospHead; ?>)" method="post">
<select name="SelectedDoc">
<!-- Importing the script to populate the drop-down list -->
<?php 
include 'SelectDoctorToDelete.php';
?>
</select>
<br><br><input type="submit" class="submit" value="Delete Doctor">
</form>

<h2>Update a hospital name</h2>
<p>Select the hospital you want to update its name:</p>
<form name="UpdatingHosp" action="UpdateHospitals.php" method="post">
<!-- Getting a radio button with all hospital names -->
<?php
include 'StoredHospitals.php';
?>
<p>Enter the new name: <input type="text" name="newname" maxlength="20"></p>
<input type="submit" class="submit" value="Update Hospital Name">
</form>

<h2>Listing all hospitals and their head doctor in alphabetical order by hospital name</h2>
<!-- Importing script to list hospitals and their head doctor -->
<?php
include 'HospitalAndHeadDoc.php';
?>

<!-- Running the page that will return a variable $AllOHIP that has all OHIP numbers stored in it -->
<?php
include 'GetOHIPforAllPatients.php';
?>

<!-- Form to enable the user to enter OHIP to look up a patient -->
<h2>Select a patient by entering the OHIP number</h2>
<form name="GetOHIPnumber" action="LookUpPatient.php" onsubmit="return validateOHIP(<?php echo $AllOHIP; ?>)" method="post">
<p>Enter OHIP number of the patient that you want to get his/her information:</p>
<input type="text" name="OHIP" maxlength="9">
<br><br><input type="submit" class="submit" value="Look Up Patient">
</form>

<!-- Get a variable with all of doctor license numbers and patient OHIP 
as one string from treats table -->
<?php
include 'GetPatientDocMatch.php';
?>

<!-- Building a form to enable the user to assign a doctor to a patient -->
<h2>Assign a doctor to a patient</h2> 
<form name="AssignDocToPatient" action="UpdateTreats.php" onsubmit="return validateTreats(<?php echo $TreatsPrimaryKey; ?>)" method="post"> 
<p>Choose a doctor:</p>
<select name="SelectedDocToAssign">
<!-- Importing script to populate the dropdown list with doctor names -->
<?php 
include 'SelectDoctorToDelete.php';
?>
</select><br>

<p>Select a patient:</p>
<select name="SelectedPatient">
<!-- Importing script to populate the drop-down list with patient names -->
<?php
include 'PatientDropDownList.php';
?>
</select>
<br><br><input type="submit" class="submit" value="Assign Selected Doctor to Treat Selected Patient">
</form>


<!-- Building a form to enable the user to unassign a doctor from treating a patient -->
<h2>Unassign a doctor from treating a patient</h2>
<form name="UnAssignDoc" action="UnAssignDocFromPatient.php" method="post"> 
<!-- Importing script to list all the doctors and the patients they are treating with radio 
buttons to enable the user to make a selection -->
<?php 
include 'ListDocTreatingPatient.php';
?>
<input type="submit" class="submit" value="Delete Relationship">
</form>


<!-- Listing all doctors who are not treating any patients -->
<h2>Doctors who are not treating any patients</h2>
<?php 
include 'DoctorsNotTreatingPatients.php';
?>

<!-- Enabling the user to select a doctor to list his/her information along with the doctor image if
an image exist. If an image does not exist then the user will have a text box where they can add an url 
to add an image for the doctor -->
<h2>Bonus Question</h2>
<p>Choose any of the doctors below to display his/her information and add an image if an image does not exit</p>
<!-- Importing script to list doctors next to radio button to enable the user to make a selection -->
<?php 
include 'ListDocsForBonus.php';
?>

</body>
</html>
