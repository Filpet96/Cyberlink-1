<?php

require __DIR__.'/../app/autoload.php';
require __DIR__.'/../app/config.php';
require __DIR__.'/../logic/feed.php';


// Function for voting a post
      if(isset($_POST['up_vote'])) {
      $up_vote = 1;
      $post_id = $_GET['id'];
      $id = (int)$_SESSION['user']['id'];

      $query = 'INSERT INTO votes (id, post_id, vote)
                VALUES (:id, :post_id, :up_vote)';

      $statement = $pdo->prepare($query);

      if (!$statement) {
        die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
      $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_INT);
      $statement->execute();

      redirect("../../pages/feed.php");
}

      if(isset($_POST['down_vote'])) {
      $down_vote = -1;
      $post_id = $_GET['id'];
      $id = (int)$_SESSION['user']['id'];

      $query = 'INSERT INTO votes (id, post_id, vote)
               VALUES (:id, :post_id, :down_vote)';

      $statement = $pdo->prepare($query);

      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
      $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_INT);

      $statement->execute();

      redirect("../../pages/feed.php");
   }


// // Function for counting comments
// function countComments() {
//    $post_id = $join['post_id'];
//    $query = 'SELECT * FROM comments WHERE post_id = :post_id';
//    $statement = $pdo->prepare($query);
//    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
//    $statement->execute();
//    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//    echo count($comments);
// }
