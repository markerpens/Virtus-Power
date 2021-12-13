<?php
if(!isset($page_title)) { $page_title = 'Virtus Power'; }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtus Power</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../../css/main.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


<navigation>
  <ul>
    <li>User:
      <?php
            // checks if session is set, if it is then display the username
            echo $_SESSION['username'] ?? '';
          ?>
    </li>
    <!-- link to the other pages that are used for login/register and logout  -->
    <li><a href="<?php echo url_for('index.php'); ?>">Main</a></li>
    <li><a href="<?php echo url_for('register.php'); ?>">Register</a></li>
    <li><a href="<?php echo url_for('logout.php'); ?>">Logout</a></li>
    <li><a href="<?php echo url_for('login.php'); ?>">Login</a></li>
    <li><a href="<?php echo url_for('comments.php'); ?>">Comments Page</a></li>

  </ul>
</navigation>

<body>