<?php

declare(strict_types=1);

// require __DIR__.'/../logic/feed.php';

require __DIR__.'/../app/autoload.php';

// Fetching post
$post_id = $_GET['id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

// Fetching user for post info
$user_id = $post['id'];
$query = "SELECT * FROM users WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->bindParam(':id', $user_id, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);


// Joining users and comments table
$query = "SELECT * FROM users LEFT JOIN comments ON users.id=comments.id";
$statement = $pdo->query($query);
$statement->execute();
$comment_users = $statement->fetchAll(PDO::FETCH_ASSOC);


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
