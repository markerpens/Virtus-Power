<?php
if (!isset($page_title)) {
  $page_title = 'Virtus Power';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtus Power</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../../css/main.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Welcome <?php
                                  // checks if session is set, if it is then display the username
                                  echo $_SESSION['username'] ?? '';
                                  ?> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo url_for('index.php'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo url_for('register.php'); ?>">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo url_for('login.php'); ?>">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo url_for('logout.php'); ?>">Logout</a>
      </li>


    </ul>
    <!-- <span class="navbar-text">
      User:
    </span> -->
  </div>
</nav>

<body>