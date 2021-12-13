<?php
require_once('../private/initialize.php');
include '../private/header.php';
include 'main_functions.php';
?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container-fluid">
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
include 'db.php';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Paginate results per page
$results_per_page = 50;

$orderBy = 'ORDER BY Dots DESC';

$query = "SELECT * FROM bcpa_powerlifting_database WHERE 1 "  . $orderBy . "";

$result = mysqli_query($db, $query);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);



if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

// $query = "SELECT * FROM bcpa_powerlifting_database LIMIT" . $this_page_first_result . ',' . $results_per_page;
$query = "SELECT * FROM bcpa_powerlifting_database "  . $orderBy . " LIMIT $this_page_first_result, $results_per_page";
$result = mysqli_query($db, $query);

if ($result === FALSE) {
    die(mysqli_error($db)); // TODO: better error handling
}

?>
<!-- Dropdown Filters -->
<div class="jumbotron jumbotron-fluid text-center">

    <h1>Filters</h1>

    <div class=col-lg-12>

        <!-- Equipment  -->
        <select name="equipment" id="equipment" class="select-filter">
            <option selected> All Equipment </option>
            <option name> Raw </option>
            <option name> Single-ply </option>
        </select>

        <!-- Seggs -->
        <select name="seggs" id="seggs" class="select-filter">
            <option selected> All Sexes </option>
            <option name> M </option>
            <option name> F </option>
        </select>

        <!-- Weight Class -->
        <select name="weightclass" id="weightclass" class="select-filter">

            <option selected> All Weight Classes </option>

            <optgroup label="Womens's Weight Classes">
                <option name> 47 </option>
                <option name> 52 </option>
                <option name> 57 </option>
                <option name> 63 </option>
                <option name> 69 </option>
                <option name> 76 </option>
                <option name> 84 </option>
                <option name> 84+ </option>
            </optgroup>

            <optgroup label="Men's Weight Classes">
                <option name> 59 </option>
                <option name> 66 </option>
                <option name> 74 </option>
                <option name> 83 </option>
                <option name> 93 </option>
                <option name> 105 </option>
                <option name> 120 </option>
                <option name> 120+ </option>
            </optgroup>
        </select>

        <!-- Division -->
        <select name="division" id="division" class="select-filter">
            <option selected> All Divisions </option>
            <option name> Sub-Juniors </option>
            <option name> Juniors </option>
            <option name> Open </option>
            <option name> Masters 1 </option>
            <option name> Masters 2 </option>
            <option name> Masters 3 </option>
            <option name> Masters 4 </option>
        </select>

        </form>

    </div>
</div>

<!--  -->
<nav aria-label="Pagination">
    <ul class="pagination" id="pagination-change">
        <!-- <li class="page-item">
            <a href="index.php?page=<?= $Previous; ?>" aria-label="Previous" class="page-link">
                <span aria-hidden="true">Previous</span>
            </a>
        </li class="page-item"> -->
        <?php for ($page = 1; $page <= $number_of_pages; $page++) : ?>
            <li><a href="index.php?page=<?= $page; ?>" class="page-link"><?= $page; ?></a></li>
        <?php endfor; ?>
        <!-- <li class="page-item">
            <a href="index.php?page=<?= $Next; ?>" aria-label="Next" class="page-link">
                <span aria-hidden="true">Next</span>
            </a>
        </li> -->
    </ul>
</nav>

<?php

// for ($i = $startPage; $i < $endPage; $i++) {
//     //     // write out the link to the page
//     // }
echo "<div class=main-container container-fluid col-lg-12>";

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