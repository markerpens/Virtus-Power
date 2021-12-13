<?php
require_once('../private/initialize.php');

$errors = [];

if (is_post_request()) {

    //check if passwords match 
    if ($_POST['password'] === $_POST['password_confirm']) {

        // if passwords match then look for an existing user. 
        $existing_query = "SELECT COUNT(*) as count FROM members WHERE username ='" . $_POST['username'] . "'";
        $existing_res = mysqli_query($db, $existing_query);

        // if count is not 0 that means there is an existing account with that username. 
        if (mysqli_fetch_assoc($existing_res)['count'] != 0) {
            array_push($errors, 'The username already exists in the database, please try another username instead');
        } else {
            // if no account with same username then encript password.
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // inserts all the necesary values into the database. 
            $insert_user_query = "INSERT INTO members(username, email, hashed_password, first_name, last_name, gender) VALUES (
                '" . mysqli_real_escape_string($db, $_POST['username'])  . "',
                '" . mysqli_real_escape_string($db, $_POST['email']) . "',
                '" . mysqli_real_escape_string($db, $hashed_password) . "',
                '" . mysqli_real_escape_string($db, $_POST['first_name']) . "',
                '" . mysqli_real_escape_string($db, $_POST['last_name']) . "',
                '" . mysqli_real_escape_string($db, $_POST['gender']) . "')";

            // if sucessful data insertion to database then do the folowing. 
            if (mysqli_query($db, $insert_user_query)) {
                //sets the user to the session and reidrects to the main page.
                $_SESSION['username'] = $_POST['username'];
                redirect_to(url_for('index.php'));
            } else {
                // displays the mysql error if failed
                array_push($errors, mysqli_error($db));
            }
        }
    } else {
        // pushes the error into the array and displays the error message 
        array_push($errors, "Passwords don't match");
    }
}
?>

<!-- the structure to the register page -->
<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<section class="vh-100">
    <div class=" container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Register to Virtus Power</h3>

                        <?php echo display_errors($errors); ?>

                        <form action="register.php" method="post">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="first_name">First Name</label>
                                <input type="text" name="first_name" value="" id="first_name" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input type="text" name="last_name" value="" id="last_name" class="form-control form-control-lg" />
                            </div>


                            <div class="form-outline mb-4">
                                <input type="radio" name="gender" id="female" value="Female" required />
                                <label for="female">Female</label>
                                <input type="radio" name="gender" id="male" value="Male" required />
                                <label for="male">Male</label>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" name="email" value="" id="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" name="username" value="" id="username" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="text" name="password" value="" id="password" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password_confirm">Confirm Password</label>
                                <input type="text" name="password_confirm" value="" id="password_confirm" class="form-control form-control-lg" />
                            </div>

                            <button class="btn btn-lg btn-block" type="submit">Register</button>
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