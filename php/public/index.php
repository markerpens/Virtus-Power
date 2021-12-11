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
ORDER BY Dots DESC";

$result = mysqli_query($db, $query);

?>


<select name="equipment" id="equipment" class="select-filter">

    <option selected name="All-Equipment"> All-Equipment </option>
    <option name="Raw"> Raw </option>
    <option name="Single-ply"> Single-ply </option>

</select>

<select name="seggs" id="seggs" class="select-filter">

    <option selected name="All-Sexes"> All-Sexes </option>
    <option name="M"> M </option>
    <option name="F"> F </option>


</select>

<select name="division" id="division" class="select-filter">

    <option selected name="All-Divisions"> All-Divisions </option>
    <option name="59"> 59 </option>
    <option name="66"> 66 </option>
    <option name="74"> 74 </option>
    <option name="83"> 83 </option>
    <option name="93"> 93 </option>
    <option name="105"> 105 </option>
    <option name="120"> 120 </option>
    <option name="120+"> 120+ </option>


</select>

</form>

<?php
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
?>