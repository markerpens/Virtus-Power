<?php
// ----------- INCLUDE HEADER ----------- //

include 'db.php';
include 'main_functions.php';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// ----------- STATEMENT ----------- //

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}


// Equipment
if (($_POST['equipment']) == "All-Equipment") {
    $equipment = "";
} else if ($_POST['equipment'] == "Raw") {
    $equipment = "AND Equipment='Raw'";
} else if ($_POST['equipment'] == "Single-ply") {
    $equipment = "AND Equipment='Single-ply'";
} else {
    $equipment = '';
}

// Seggs
if ($_POST['seggs'] == "All-Sexes") {
    $seggs = "";
} else if ($_POST['seggs']  == "M") {
    $seggs = "AND Sex='M'";
} else if ($_POST['seggs']  == "F") {
    $seggs = "AND Sex='F'";
} else {
    $seggs = '';
}

// Division
if ($_POST['division'] == "All-Divisions") {
    $division = "";
}
// Men's Division
else if ($_POST['division']  == "59") {
    $division = "AND WeightClassKg='59'";
} else if ($_POST['division']  == "66") {
    $division = "AND WeightClassKg='66'";
} else if ($_POST['division']  == "74") {
    $division = "AND WeightClassKg='74'";
} else if ($_POST['division']  == "83") {
    $division = "AND WeightClassKg='83'";
} else if ($_POST['division']  == "93") {
    $division = "AND WeightClassKg='93'";
} else if ($_POST['division']  == "105") {
    $division = "AND WeightClassKg='105'";
} else if ($_POST['division']  == "120") {
    $division = "AND WeightClassKg='120'";
} else if ($_POST['division']  == "120+") {
    $division = "AND WeightClassKg='120+'";
} else {
    $division = '';
}


$orderBy = 'ORDER BY Dots DESC';

$query = "SELECT * FROM bcpa_powerlifting_database WHERE 1 " . $equipment . " " . $seggs . "  " . $division . " " . $orderBy . " ";



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
