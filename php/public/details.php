<?php
require_once('../private/initialize.php');
// ----------- INCLUDE HEADER ----------- //
// include 'header.php';
include '../private/header.php';
include 'main_functions.php';
// session_start();

echo "<h1>Lifter Details</h1>";

// ----------- CONNECT TO DATABASE ----------- //

// include 'db.php';
// $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// }

// ----------- DISPLAY DETAILS ----------- //

// Get ID of lifter
$id = $_GET['user_id'];
$query_string = "SELECT * FROM bcpa_powerlifting_database 
WHERE Id = '$id'";

$query = mysqli_query($db, $query_string);

// start_table();

// Loop through results
while ($row = mysqli_fetch_assoc($query)) {
    details($row['Name'], $row['Sex'], $row['Division'], $row['Equipment'], $row['WeightClassKg'],  $row['Best3SquatKg'],  $row['Best3BenchKg'], $row['Best3DeadliftKg'], $row['Dots'], $row['TotalKg'],  $row['MeetName'],  $row['MeetTown'],  $row['Date']);
}

// end_table();


// ----------- INCLUDE FOOTER ----------- //
include 'footer.php';
