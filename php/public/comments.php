<?php
require_once('../private/initialize.php');
// include '../private/header.php';

?>

<title>Comment System using PHP and Ajax</title>

<?php
$lifter_name ='';

if(isset($_SESSION['username'])) {
    // echo "<p> session is set and it is: " . $_SESSION['username'] ?? '' . " ID: " . $_SESSION['id'] .  "</p>";
    $login_confirmed = true;
} else {
    $login_confirmed = false;
}

// echo "<p> session is set and it is: " . $_SESSION['username'] . "<br> ID: " . $_SESSION['id'] .  "</p>";


$id = $_GET['user_id'];
$query_string = "SELECT Name FROM bcpa_powerlifting_database WHERE Id = '$id'";
$query = mysqli_query($db, $query_string);

// Loop through results
while ($row = mysqli_fetch_assoc($query)) {
    $lifter_name =  $row['Name'];
}



echo '<br />';
// echo '<h2 align="center"><a href="#">Comment For: ' . $_GET['user_id'] . '</a></h2>';
echo '<h2 align="center">Comments for: ' . $lifter_name . '</h2>';
echo '<br />';
echo '<div class="container">';
echo '<form method="POST" id="comment_form">';
echo '<div class="form-group">';
echo '<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment"';
echo 'rows="5"></textarea>';
echo '</div>';
echo '<div class="form-group">';
echo '<input type="hidden" name="comment_id" id="comment_id" value="0" />';

if($login_confirmed){
    echo '<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />';
} else {
    echo "<p> Please Login to Comment</p>";
}
echo '</div>';
echo '</form>';
echo '<span id="comment_message"></span>';
echo '<br><div id="display_comment"></div>';
echo '</div>';
echo '</body>';
echo '</html>';
?>

<script>
    $(document).ready(function () {

        $('#comment_form').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "../private/add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function (data) {
                    if (data.error != '') {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment();
                    }
                }
            })
        });

        load_comment();

        function load_comment() {
            $.ajax({
                url: "../private/fetch_comment.php",
                method: "POST",
                success: function (data) {
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function () {
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_content').focus();
        });

    });
</script>