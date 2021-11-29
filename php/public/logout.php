<?php
require_once('../private/initialize.php');

// removes the username form the session 
unset($_SESSION['username']);

// redirect to the login page
redirect_to(url_for('login.php'));

?>