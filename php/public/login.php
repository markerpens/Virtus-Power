<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

// redirect to desired page if a session is detected
if(isset($_SESSION['username'])) {redirect_to(url_for('/main.php'));}

if(is_post_request()){
    // if username and passoword fields are not empty proceed 
    if(!empty($_POST['username']) && !empty($_POST['password'])){

        // write querry to retrive hashed password/ 
        $user_query = "SELECT hashed_password FROM admins WHERE username = '" . $_POST['username'] . "'";
        $user_res = mysqli_query($db, $user_query);

        // if no record display error message
        if(mysqli_num_rows($user_res) !=0){
            // save hashed password form db into a variable 
            $hashed_password = mysqli_fetch_assoc($user_res)['hashed_password'];
            
            // use password to check if entered password matches
            if (password_verify($_POST['password'], $hashed_password)){

                //store session and redirect
                $_SESSION['username'] = $_POST['username'];
                redirect_to(url_for('/main.php'));
            } else {
                // pushes the errors to the uers
                array_push($errors, "The entered password do not match our record.");
            }
        } else {
            // pushes the errors to the uers
            array_push($errors, "The account entered does not exist");
        }
    } else {
        // pushes the errors to the uers
        array_push($errors, "username or password field is not filled");
    }
}
?>

<!-- structure of the page for previous php to work -->
<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" />
  </form>

</div>

<?php 
// include(SHARED_PATH . '/staff_footer.php'); --- fix when more is added 
?>

