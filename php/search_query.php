<?php
// ----------- INCLUDE HEADER ----------- //

include 'db.php';
include 'main_functions.php';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// ----------- STATEMENT ----------- //

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

if (isset($_POST['request'])) {

    $request = $_POST['request'];

    $query = "SELECT * FROM bcpa_powerlifting_database WHERE Sex = '$request' ORDER BY TotalKg DESC";

    $result = mysqli_query($connection, $query);

    $count = mysqli_num_rows($result);
    start_table();

    if ($count) {
        // Loop through results
        while ($row = mysqli_fetch_array($result)) {
            powerlifting_table("<a href=\"details.php?user_id={$row['Id']}\">$row[0]</a>", $row[1], $row[4], $row[3], $row[6], $row[7], $row[8], $row[9], $row[10], $row[12]);
        }
        end_table();
    } else {
        echo "No records found.";
    }
}
