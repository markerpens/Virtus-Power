<?php


function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }


  function h($string="") {
    return htmlspecialchars($string);
  }

  function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
      $output .= "<div class=\"errors\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
  }

  function is_logged_in() {
    if(!isset($_SESSION['username'])) {redirect_to(url_for('/login.php'));}
  }

?>