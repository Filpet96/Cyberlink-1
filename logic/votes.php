<?php

require __DIR__.'/../app/autoload.php';


// function getAllVotes($id)
//  {
//
//  $votes = array();
//  $q = "SELECT * FROM entries WHERE id = $id";
//  $r = mysql_query($q);
//  if(mysql_num_rows($r)==1)//id found in the table
//   {
//   $row = mysql_fetch_assoc($r);
//   $votes[0] = $row['votes_up'];
//   $votes[1] = $row['votes_down'];
//   }
//  return $votes;
//  }


// // Function for voting a post
      $up_vote = 0;
      $post_id = $_GET['id'];
      // $post_id = $join['post_id'];
      $id = (int)$_SESSION['user']['id'];

      $query = 'UPDATE votes
                SET id = :id, post_id = :post_id, vote = :up_vote + 5
                WHERE post_id = :post_id';

      $statement = $pdo->prepare($query);

      if (!$statement) {
        die(var_dump($pdo->errorInfo()));
      }

      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
      $statement->bindParam(':vote', $up_vote, PDO::PARAM_INT);

      $statement->execute();

      redirect("../../pages/feed.php");
      
