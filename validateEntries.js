//Function to validate the entering a new doctor form
function validateForm(license_numbers) { 
  var x = document.forms["NewDoctor"]["licensenumber"].value;
  if (x == "") {
    alert("You must enter a license number");
    return false;
  } else if (license_numbers.includes(x)) {
      alert("This license number already exist");
      return false;
  }
}



//Function to check whether the doctor the user selected to 
//delete is currently treating a patient or not
function validateDeletedDoc(DocsTreatingPatients, DocsHeadofHosp) { 
  var x = document.forms["DeletingDoc"]["SelectedDoc"].value;
  if (DocsHeadofHosp.includes(x)){
    alert("The doctor you selected is a head of hospital and can't be deleted. The assignment specified to do a cascade delete for doctors who treat patients but didn't specify a cascade delete for doctors who are a head of hospital. Select another doctor to delete who is not a head of a hospital"); 
    return false; 
  }
  else if (DocsTreatingPatients.includes(x)) {
    var user_response = confirm("The doctor you selected to delete is treating at least one patient. If you delete the doctor, then all the patients that the doctor is treating will also be deleted from the database. If you still want to delete the doctor press OK. Otherwise, press Cancel");
    return user_response;
  } 
}




//Function to validate whether the OHIP number that the 
//user entered exist in the database or not
function validateOHIP(AllOHIP) {
  var x = document.forms["GetOHIPnumber"]["OHIP"].value;
  if (!AllOHIP.includes(x)){
    alert("The OHIP number you entered is incorrect!");
    return false;
  }
}



//Function to check whether the doctor that the user is trying 
//to assign to a patient is already treating that patient or not. 
function validateTreats(TreatsPrimaryKeys) {
  var doc = document.forms["AssignDocToPatient"]["SelectedDocToAssign"].value;
  var patient = document.forms["AssignDocToPatient"]["SelectedPatient"].value;
  key = doc + patient;
  if (TreatsPrimaryKeys.includes(key)){
    alert("The doctor you selected is already treating that patient!");
    return false;
  }
}


