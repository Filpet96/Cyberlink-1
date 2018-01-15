<?php

require __DIR__.'/../app/autoload.php';

// Checking if user already voted
$user_id = $_SESSION['user'];
$id = $user_id['id'];

$query = "SELECT * FROM votes WHERE id = :user_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':user_id', $id, PDO::PARAM_STR);
$statement->execute();
$user_vote = $statement->fetch(PDO::FETCH_ASSOC);
die(var_dump($user_vote));

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
