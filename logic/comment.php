<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';

// Joining tables: posts & comments
$comment_query = "SELECT * FROM posts LEFT JOIN comments ON posts.post_id=comments.post_id";

$comment_statement = $pdo->query($comment_query);
$comment_statement->execute();

$comments = $comment_statement->fetchAll(PDO::FETCH_ASSOC);

if (!$comment_statement) {
   die(var_dump($pdo->errorInfo()));
}

foreach($comments as $comment){}
die(var_dump($comment));

// Logic for posting a comment
if (isset($_POST['comment'])) {
   $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
   $posted = date("M d, Y: H:i");
   $id = (int)$_SESSION['user']['id'];
   $post_id = $comment['post_id'];

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

   redirect('../../pages/feed.php');

};
