<!-- The script in this file is to connect to 
the database -->

<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "777";
$dbname = "melbadryassign2db";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
