<?php
require __DIR__.'../../views/header.php';
// require __DIR__.'../../logic/editComment.php';


$comment_id = $_GET['id'];
$query = "SELECT * FROM comments WHERE comment_id = :comment_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
$statement->execute();
$comment_id = $statement->fetch(PDO::FETCH_ASSOC);


$post_id = $comment_id['post_id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();
$post_id = $statement->fetch(PDO::FETCH_ASSOC);


$id = $_GET['id'];
$query = "SELECT * FROM comments WHERE comment_id = :id";
$statement = $pdo->prepare($query);
if (!$statement) {
  die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$comment = $statement->fetch(PDO::FETCH_ASSOC);

?>

<div class="edit-comment-wrapper">
   <div class="commented-post">
      <div class="edit-comment"><?php echo $post_id['title']; ?></div>
      <div class="edit-comment"><?php echo $post_id['description']; ?></div>
      <div class="edit-comment"><?php echo $post_id['url']; ?></div>
   </div>



   <form action="../logic/editComment.php?id=<?php echo $comment['comment_id']?>" method="post">
         <textarea type="edit-comment" name="edit-comment" placeholder="Url"><?php echo $comment['comment']; ?></textarea>
         <button type="submit" class="edit-comment-btn">Save changes</button>
   </form>
   <form action="../logic/deleteComment.php?id=<?php echo $comment['comment_id']?>" method="post">
         <button type="submit" class="delete-comment-btn">Delete comment</button>
   </form>
</div>
