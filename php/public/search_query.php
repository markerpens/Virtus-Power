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
    // $request = $_POST['request'];
    // $request2 = $_POST['equipment'];

    $query = "SELECT * FROM bcpa_powerlifting_database WHERE Sex = '$request' BY TotalKg DESC";


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

// if (isset($_POST["request"])) {
//     $query = "
//     SELECT * FROM bcpa_powerlifting_database ORDER BY TotalKg DESC";

//     if (isset($_POST["sexdivision"])) {
//         $seggs_filter = implode("','", $_POST["sexdivision"]);
//         $query .= "
//    WHERE Sex=('" . $seggs_filter . "')
//   ";
//     }
//     if (isset($_POST["equipment"])) {
//         $equipment_filter = implode("','", $_POST["equipment"]);
//         $query .= " AND Equipment=('" . $equipment_filter . "')
//   ";
//     }
//     if (isset($_POST["division"])) {
//         $division_filter = implode("','", $_POST["division"]);
//         $query .= "AND Division=('" . $division_filter . "')";
//     }

//     if (isset($_POST["weightclass"])) {
//         $weightclass_filter = implode("','", $_POST["weightclass"]);
//         $query .= "AND WeightClassKg=('" . $weightclass_filter . "')";
//     }

//     $statement = $connection->prepare($query);
//     $statement->execute();
//     $result = $statement->fetchAll();
//     $total_row = $statement->rowCount();
//     $output = '';
//     if ($total_row > 0) {
//         foreach ($result as $row) {
//             $output .= '
//             powerlifting_table("<a href=\"details.php?user_id={$row["Id"]}\">$row[0]</a>", $row["sexdivision"], $row["division"], $row["equipment"], $row["weightclass"], $row[7], $row[8], $row[9], $row[10], $row[12]);
//    ';
//         }
//     } else {
//         // $output = 'Please User Filters to Search for Parts';
//         $output = "No records found.";
//     }
//     echo $output;
// }


//             powerlifting_table("<a href=\"details.php?user_id={$row["Id"]}\">$row[0]</a>", $row[1], $row[4], $row[3], $row[6], $row[7], $row[8], $row[9], $row[10], $row[12]);