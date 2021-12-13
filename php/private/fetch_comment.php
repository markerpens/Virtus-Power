<?php
require_once('../private/initialize.php');

//fetch_comment.php

// $connect = new PDO('mysql:host=localhost;dbname=virtus_power', 'root', '');



//

// could not get it to work
// if (isset($_POST['liked'])) {
//     $postid = $_POST['postid'];
//     $result = mysqli_query($db, "SELECT * FROM posts WHERE id=$postid");
//     $row = mysqli_fetch_array($result);
//     $n = $row['likes'];

//     mysqli_query($db, "INSERT INTO likes (userid, postid) VALUES (1, $postid)");
//     mysqli_query($db, "UPDATE posts SET likes=$n+1 WHERE id=$postid");

//     echo $n+1;
//     exit();
// }


// setting session id to a varable 
$lifter_id = $_SESSION['id'];

// query for getting the amount of likes
$query2 = "SELECT likes FROM tbl_comment WHERE (parent_comment_id = '0' AND power_id =" . $lifter_id . ")";
$queryfind = mysqli_query($db, $query2);

// Loop through results to find the comments's likes 
while ($row = mysqli_fetch_assoc($queryfind)) {
    $count_likes =  $row['likes'];
    // echo "<p>" . $count_likes . "</p>";
}

// $query = "SELECT * FROM tbl_comment WHERE (parent_comment_id = '0' AND power_id =" . $lifter_id . ") ORDER BY comment_id DESC";
$query = "SELECT * FROM tbl_comment WHERE (parent_comment_id = '0' AND power_id =" . $lifter_id . ") ORDER BY likes DESC";

$statement = $connect->prepare($query);
$statement->execute();

$result = $statement->fetchAll();
$output = '';

// for each comment organize it in the way described below
foreach($result as $row){
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>'.$row["username"].'</b> on <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
  <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button>
  <button type="button" class="btn btn-default like">Like</button>
  <p> Number of Likes: '. $row["likes"] . '</p>
  </div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

// allows each comment in the right format to be displayed aka retrieved
echo $output;

// gets the reply comments that and formats them in the right way. 
function get_reply_comment($connect, $parent_id = 0, $marginleft = 0){
 $query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '" . $parent_id . "'";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0){
  $marginleft = 0;
 } else {
  $marginleft = $marginleft + 48;
 }

 if($count > 0){
  foreach($result as $row){
   $output .= '
   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading">By <b>'.$row["username"].'</b> on <i>'.$row["date"].'</i></div>
    <div class="panel-body">'.$row["comment"].'</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button>
    <button type="button" class="btn btn-default like">Like</button>
    <p> Number of Likes: '. $row["likes"] . '</p>
    </div>
   </div>
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}
?>

<!-- tyring to get likes to work. -->
<!-- <script>

$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});

</script> -->