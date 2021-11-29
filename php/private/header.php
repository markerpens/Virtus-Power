<?php
if(!isset($page_title)) { $page_title = 'Header Area'; }
?>

<!doctype html>

<html lang="en">

<head>
    <title>Virtus Power - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    
    <!-- look into umcommenting later -->
    <!-- <link rel="stylesheet" media="all" href=" -->
    <?php 
    // echo url_for('/stylesheets/staff.css'); 
    ?>
    <!-- " /> -->


</head>

<body>
    <header>
        <h1>Header Area</h1>
    </header>

    <navigation>
      <ul>
        <li>User: 
          <?php
            // checks if session is set, if is, display the username
            echo $_SESSION['username'] ?? '';
          ?>

        </li>
        <li><a href="<?php echo url_for('main.php'); ?>">Main</a></li>
        <li><a href="<?php echo url_for('register.php'); ?>">Register</a></li>
        <li><a href="<?php echo url_for('logout.php'); ?>">Logout</a></li>
      </ul>
    </navigation>

    
