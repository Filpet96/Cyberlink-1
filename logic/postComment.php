<?php
require __DIR__.'/../app/autoload.php';

// Logic for posting a comment
$post_id = $_GET['id'];
if (isset($_POST['comment'])) {
   $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
   $posted = date("M d, Y: H:i");
   $id = (int)$_SESSION['user']['id'];

   $query = 'INSERT INTO comments (comment, posted, post_id, id)
   VALUES (:comment, :posted, :post_id, :id)';

   $statement = $pdo->prepare($query);

   if (!$statement) {
      die(var_dump($pdo->errorInfo()));
   }

   $statement->bindParam(':comment', $comment, PDO::PARAM_STR);
   $statement->bindParam(':posted', $posted, PDO::PARAM_STR);
   $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
   $statement->bindParam(':id', $id, PDO::PARAM_INT);

   $statement->execute();

   redirect("../pages/comment.php?id=$post_id");
};
