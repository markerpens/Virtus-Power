<?php
require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

// redirect to desired page if a session is detected
if (isset($_SESSION['username'])) {
    redirect_to(url_for('index.php'));
}

if (is_post_request()) {
    // if username and passoword fields are not empty proceed 
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        // write querry to retrive hashed password/ 
        $user_query = "SELECT hashed_password FROM members WHERE username = '" . $_POST['username'] . "'";
        $user_res = mysqli_query($db, $user_query);

        // if no record display error message
        if (mysqli_num_rows($user_res) != 0) {
            // save hashed password form db into a variable 
            $hashed_password = mysqli_fetch_assoc($user_res)['hashed_password'];

            // use password to check if entered password matches
            if (password_verify($_POST['password'], $hashed_password)) {

                //store session and redirect
                $_SESSION['username'] = $_POST['username'];
                redirect_to(url_for('index.php'));
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

<section class="vh-100">
    <div class=" container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Login to Virtus Power</h3>

                        <?php echo display_errors($errors); ?>

                        <form action="login.php" method="post">
                            <div class="form-outline mb-4">
                                <input type="text" name="username" value="" id="username" class="form-control form-control-lg" />
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" value="" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-lg btn-block" type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
// include(SHARED_PATH . '/staff_footer.php'); --- fix when more is added 
?>