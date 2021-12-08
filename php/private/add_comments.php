<?php
require_once('../private/initialize.php');

$errors = [];
$comment_name = '';
$comment_content = '';

// makes sure if comment name has been entered or gives error, will make this for users only
if(empty($_POST["comment_name"])){
    array_push($errors, "name is required");
} else {
    $comment_name = $_POST["comment_name"];
}

// chekcs to see if comment box has been filled. 
if(empty($_POST["comment_content"])){
    array_push($errors, "Comment is required");
} else {
    $comment_content = $_POST['comment_content'];
}

if($errors = ''){
    $query = "INSERT INTO tbl_comment (parent_comment_id, comment, comment_sender_name)
    VALUES (:parent_comment_id, :comment, :comment_sender_name)";

$statement = $connect->prepare($query);
$statement->execute(
 array(
  ':parent_comment_id' => $_POST["comment_id"],
  ':comment'    => $comment_content,
  ':comment_sender_name' => $comment_name
 )
);
$error = '<label class="text-success">Comment Added</label>';
}

$data = array(
'error'  => $error
);

echo json_encode($data);

?>
