<?php
require_once('../private/initialize.php');
// ----------- INCLUDE HEADER ----------- //
// include 'header.php';
include '../private/header.php';
include 'main_functions.php';
?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Virtus Power</h1>
        <p class="lead">Lifter Details</p>
    </div>
</div>

<?php
// session_start();

// echo "<h1>Lifter Details</h1>";

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
$query2 = mysqli_query($db, $query_string);

start_details_table();

// Loop through results
while ($row = mysqli_fetch_assoc($query)) {
    details($row['Name'], $row['Sex'], $row['Division'], $row['Equipment'], $row['WeightClassKg'],  $row['Best3SquatKg'],  $row['Best3BenchKg'], $row['Best3DeadliftKg'], $row['TotalKg'], $row['Dots']);
}

end_table();

// Meet Details
start_meet_table();
echo "<h2>Competition Details</h2>";
while ($row = mysqli_fetch_assoc($query2)) {
    meet_details($row['MeetName'],  $row['MeetTown'],  $row['Date']);
}
end_table();


// ----------- INCLUDE FOOTER ----------- //
include 'footer.php';
