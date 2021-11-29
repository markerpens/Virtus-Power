<?php

require_once('../private/initialize.php');

$errors = [];




if(is_post_request()){

    if($_POST['password'] === $_POST['password_confirm']){
        $existing_query = "SELECT COUNT(*) as count FROM admins WHERE username ='" . $_POST['username'] . "'"; 
        $existing_res = mysqli_query($db, $existing_query);


        if(mysqli_fetch_assoc($existing_res)['count'] !=0){
            array_push($errors, 'The username already exists in the database, please try another username instead');
        } else {
            //encript password
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $insert_user_query = "INSERT INTO admins(username, email, hashed_password, first_name, last_name, gender) VALUES (
                '" . mysqli_real_escape_string($db, $_POST['username'])  . "',
                '" . mysqli_real_escape_string($db, $_POST['email']) . "',
                '" . mysqli_real_escape_string($db, $hashed_password) . "',
                '" . mysqli_real_escape_string($db, $_POST['first_name']) . "',
                '" . mysqli_real_escape_string($db, $_POST['last_name']) . "',
                '" . mysqli_real_escape_string($db, $_POST['gender']) . "')";

            if(mysqli_query($db, $insert_user_query)){
                //fill 
                echo "Worked";
            } else {
                // displays the mysql error if failed
                array_push($errors, mysqli_error($db)); 
            }
        }
    } else {
        array_push($errors, "Passwords don't match");
    }
}

?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">
    <h1>Register</h1>

    <?php echo display_errors($errors); ?>

    <form action="register.php" method="post">
        First Name:<br />
        <input type="text" name="first_name" value="" required /><br />

        Last Name:<br />
        <input type="text" name="last_name" value="" required /><br />

        Gender: <br />
        <input type="radio" name="gender" id="female" value="Female" required />
        <label for="female">Female</label>
        <input type="radio" name="gender" id="male" value="Male" required />
        <label for="male">Male</label><br />

        Email:<br />
        <input type="text" name="email" value="" required /><br />

        Username:<br />
        <input type="text" name="username" value="" required /><br />

        Password:<br />
        <input type="password" name="password" value="" required /><br />

        Confirm Password:<br />
        <input type="password" name="password_confirm" value="" required /><br />
        <input type="submit" />
    </form>
</div>

<?php 
// include(SHARED_PATH . '/staff_footer.php'); --- fix when more is added
?>