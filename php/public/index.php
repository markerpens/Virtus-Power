<?php
require_once('../private/initialize.php');
include '../private/header.php';
include 'main_functions.php';
?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4">Virtus Power</h1>
        <p class="lead">Powerlifing Data at a Glance.</p>
    </div>
</div>

<?php
// require_once('../private/initialize.php');
// // ----------- INCLUDE ESSENTIALS ----------- //

// include '../private/header.php';
// include 'main_functions.php';
// include 'search_query.php';
// session_start();

// ----------- CONNECT TO DATABASE ----------- //

// include 'db.php';
// $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// }

// ----------- DISPLAY POWERLIFTING TABLE ----------- //

$query = "SELECT * FROM bcpa_powerlifting_database 
ORDER BY TotalKg DESC";

$result = mysqli_query($db, $query);

// echo "<h1>Virtus Power</h1>";

// Filter queries
echo "<form name='search-filter' method='POST' action='index.php'>";
echo "<select name=fetchval id=fetchval>";

echo "
<option hidden disabled selected value value=''>--- Filter Sex Division ---</option>;
<option value: M> M </option>
<option value: F> F </option>
";

// echo "<input type='submit' name='submit'>";
echo "</select>";
echo "</form>";

echo "<div class=main-container>";
start_table();

// Loop through results
while ($row = mysqli_fetch_array($result)) {

    powerlifting_table("<a href=\"details.php?user_id={$row['Id']}\">$row[0]</a>", $row[1], $row[4], $row[3], $row[6], $row[7], $row[8], $row[9], $row[10], $row[12]);
}
end_table();
echo "</div>";

// Make sure to close out the database connection
mysqli_close($db);

// include 'ajax.php';

// ----------- INCLUDE FOOTER ----------- //
include 'footer.php';
