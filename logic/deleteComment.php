<?php
require __DIR__.'/../app/autoload.php';


// Logic for deleting comment
   $comment_id = $_GET['id'];
   $id = (int)$_SESSION['user']['id'];
   $query = 'DELETE FROM comments WHERE comment_id = :comment_id';
   $statement = $pdo->prepare($query);
   $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
   $statement->execute();

   redirect("../pages/profile.php?id=$id");
