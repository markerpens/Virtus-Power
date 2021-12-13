<?php
require_once('../private/initialize.php');


$error = '';
$comment_content = '';

// giving the comment name variable the value of sessions username aka the user that is loged in. 
$comment_name = $_SESSION['username'];

//if a comment is empty and the submit is clicked then display the error message, else assign the value of comment_content varuabel
if(empty($_POST["comment_content"])){
 $error .= '<p class="text-danger">Comment is required</p>';
} else {
 $comment_content = $_POST["comment_content"];
}

// attributing value of session id to lifter id so that it can save it into the databse in the code below. 
$lifter_id = $_SESSION['id'];

// if no errors were detected it fills the databse comments table. 
if($error == ''){
    $query = "INSERT INTO tbl_comment (parent_comment_id, comment, username, power_id) 
    VALUES (:parent_comment_id, :comment, :username, :power_id)";
    
    $statement = $connect->prepare($query);
    $statement->execute(
     array(
      ':parent_comment_id' => $_POST["comment_id"],
      ':comment'    => $comment_content,
      ':username' => $comment_name,
      ':power_id' => $lifter_id
     )
    );
    $error = '<label class="text-success">Comment Added</label>';
   }


$data = array('error'  => $error);

echo json_encode($data);

?>
