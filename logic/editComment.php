<?php
require __DIR__.'/../app/autoload.php';



// Logic for editing comment
if (isset($_POST['edit-comment'])) {
   $comment_id = $_GET['id'];
   $comment = filter_var($_POST['edit-comment'], FILTER_SANITIZE_STRING);
   $id = (int)$_SESSION['user']['id'];

   $query = 'UPDATE comments
   SET comment = :comment
   WHERE comment_id = :comment_id';

   $statement = $pdo->prepare($query);

   if (!$statement) {
      die(var_dump($pdo->errorInfo()));
   }

   $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_STR);
   $statement->bindParam(':comment', $comment, PDO::PARAM_STR);
   $statement->execute();

   redirect("../pages/profile.php?id=$id");

};
