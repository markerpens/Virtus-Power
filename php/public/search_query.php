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
if (($_POST['equipment']) == "All Equipment") {
    $equipment = "";
} else if ($_POST['equipment'] == "Raw") {
    $equipment = "AND Equipment='Raw'";
} else if ($_POST['equipment'] == "Single-ply") {
    $equipment = "AND Equipment='Single-ply'";
} else {
    $equipment = '';
}

// Seggs
if ($_POST['seggs'] == "All Sexes") {
    $seggs = "";
} else if ($_POST['seggs']  == "M") {
    $seggs = "AND Sex='M'";
} else if ($_POST['seggs']  == "F") {
    $seggs = "AND Sex='F'";
} else {
    $seggs = '';
}

// Weight Class
if ($_POST['weightclass'] == "All Weight Classes") {
    $wc = "";
}

// Women's Weight Class
else if ($_POST['weightclass']  == "47") {
    $wc = "AND WeightClassKg='47'";
} else if ($_POST['weightclass']  == "52") {
    $wc = "AND WeightClassKg='52'";
} else if ($_POST['weightclass']  == "57") {
    $wc = "AND WeightClassKg='57'";
} else if ($_POST['weightclass']  == "63") {
    $wc = "AND WeightClassKg='63'";
} else if ($_POST['weightclass']  == "69") {
    $wc = "AND WeightClassKg='69'";
} else if ($_POST['weightclass']  == "76") {
    $wc = "AND WeightClassKg='76'";
} else if ($_POST['weightclass']  == "84") {
    $wc = "AND WeightClassKg='84'";
} else if ($_POST['weightclass']  == "84+") {
    $wc = "AND WeightClassKg='84+'";
}

// Men's Weight Class
else if ($_POST['weightclass']  == "59") {
    $wc = "AND WeightClassKg='59'";
} else if ($_POST['weightclass']  == "66") {
    $wc = "AND WeightClassKg='66'";
} else if ($_POST['weightclass']  == "74") {
    $wc = "AND WeightClassKg='74'";
} else if ($_POST['weightclass']  == "83") {
    $wc = "AND WeightClassKg='83'";
} else if ($_POST['weightclass']  == "93") {
    $wc = "AND WeightClassKg='93'";
} else if ($_POST['weightclass']  == "105") {
    $wc = "AND WeightClassKg='105'";
} else if ($_POST['weightclass']  == "120") {
    $wc = "AND WeightClassKg='120'";
} else if ($_POST['weightclass']  == "120+") {
    $wc = "AND WeightClassKg='120+'";
} else {
    $wc = '';
}

// Divisions
if ($_POST['division'] == "All Divisions") {
    $division = "";
} else if ($_POST['division'] == "Sub-Juniors") {
    $division = "AND Division='Sub-Juniors'";
} else if ($_POST['division'] == "Juniors") {
    $division = "AND Division='Juniors'";
} else if ($_POST['division'] == "Open") {
    $division = "AND Division='Open'";
} else if ($_POST['division'] == "Masters 1") {
    $division = "AND Division='Masters 1'";
} else if ($_POST['division'] == "Masters 2") {
    $division = "AND Division='Masters 2'";
} else if ($_POST['division'] == "Masters 3") {
    $division = "AND Division='Masters 3'";
} else if ($_POST['division'] == "Masters 4") {
    $division = "AND Division='Masters 4'";
} else {
    $division = '';
}

// Paginate results per page
$results_per_page = 35;

// $query = "SELECT * FROM bcpa_powerlifting_database 
// ";

$orderBy = 'ORDER BY Dots DESC';

$query = "SELECT * FROM bcpa_powerlifting_database WHERE 1 " . $equipment . " " . $seggs . "  " . $wc . " " . $division . " " . $orderBy . "";

$result = mysqli_query($connection, $query);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;
$result = mysqli_query($connection, $query);

if ($result === FALSE) {
    die(mysqli_error($connection)); // TODO: better error handling
}

// 


// $query = "SELECT * FROM bcpa_powerlifting_database WHERE 1 " . $equipment . " " . $seggs . "  " . $wc . " " . $division . " " . $orderBy . "";

$query = "SELECT * FROM bcpa_powerlifting_database WHERE 1 " . $equipment . " " . $seggs . "  " . $wc . " " . $division . " " . $orderBy . " LIMIT $this_page_first_result, $results_per_page ";

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
