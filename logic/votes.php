<?php

require __DIR__.'/../app/autoload.php';

// Checking if user already voted
$user_id = $_SESSION['user'];
$id = $user_id['id'];
$post_id = $_GET['id'];
$query = "SELECT * FROM votes WHERE post_id = :post_id AND id = :user_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
$statement->bindParam(':user_id', $id, PDO::PARAM_STR);
$statement->execute();
$user_votes = $statement->fetch(PDO::FETCH_ASSOC);


// UP-VOTE
if(isset($_POST['up_vote'])){
   if($user_votes['id'] === $id){

      $up_vote = 1;
      $post_id = $_GET['id'];

      $query = 'UPDATE votes
      SET vote = :up_vote
      WHERE post_id = :post_id AND id = :user_id';
      $statement = $pdo->prepare($query);

      if (!$statement) {
         die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
      $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_STR);
      $statement->execute();

      redirect("../../pages/feed.php");
   }

   if($user_votes['id'] !== $id){
      $up_vote = 1;
      $post_id = $_GET['id'];

      $query = 'INSERT INTO votes (id, post_id, vote)
      VALUES (:user_id, :post_id, :up_vote)';

      $statement = $pdo->prepare($query);

      if (!$statement) {
         die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
      $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_STR);
      $statement->execute();

      redirect("../../pages/feed.php");
   }
}

// DOWN-VOTE
if(isset($_POST['down_vote'])){
   if($user_votes['id'] === $id){
      $down_vote = -1;
      $post_id = $_GET['id'];

      $query = 'UPDATE votes
      SET vote = :down_vote
      WHERE post_id = :post_id AND id = :user_id';
      $statement = $pdo->prepare($query);

      if (!$statement) {
         die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
      $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_STR);
      $statement->execute();

      redirect("../../pages/feed.php");
   }
   if($user_votes['id'] !== $id){

      $down_vote = -1;
      $post_id = $_GET['id'];

      $query = 'INSERT INTO votes (id, post_id, vote)
      VALUES (:user_id, :post_id, :down_vote)';

      $statement = $pdo->prepare($query);

      if (!$statement) {
         die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
      $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_STR);
      $statement->execute();

      redirect("../../pages/feed.php");
   }
}
