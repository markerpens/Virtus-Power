<?php
require_once('../private/initialize.php');

// $connect = new PDO('mysql:host=localhost;dbname=virtus_power', 'root', '');


$error = '';
// $comment_name = '';
$comment_content = '';

// if(isset($_SESSION['username'])) {

// if(empty($_POST["comment_name"])){
//  $error .= '<p class="text-danger">Name is required</p>';
// } else {
//  $comment_name = $_POST["comment_name"];
 $comment_name = $_SESSION['username'];

// echo "<p> fuck </p>";
//     if(isset($_SESSION['username'])) {
//         $comment_name = $SESSION['username'];
//     } else {
//         $comment_name = "No Session set";
//     }
// }

if(empty($_POST["comment_content"])){
 $error .= '<p class="text-danger">Comment is required</p>';
} else {
 $comment_content = $_POST["comment_content"];
}

if($error == ''){
 $query = "INSERT INTO tbl_comment (parent_comment_id, comment, username) 
 VALUES (:parent_comment_id, :comment, :username)";
 
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':username' => $comment_name
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array('error'  => $error);

echo json_encode($data);
// }

?>
