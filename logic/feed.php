<?php


$session = $_SESSION;
foreach($session as $id){}


   // Joining tables: users & posts
   $query = "SELECT * FROM posts LEFT JOIN users ON posts.id=users.id";

   $statement = $pdo->query($query);
   $statement->execute();

   $joined = $statement->fetchAll(PDO::FETCH_ASSOC);

   if (!$statement) {
      die(var_dump($pdo->errorInfo()));
   }

   foreach($joined as $join){}


   // Query for fetching votes and printing in every post
   // $post_id = $join['post_id'];
   $post_id = 1;
   $user_id = 2;
   // $query = "SELECT * FROM votes WHERE post_id = :post_id";
   $query = 'SELECT COUNT(*) FROM votes WHERE post_id = :post_id';
   // $query = 'SELECT COUNT(*) FROM votes WHERE post_id = :post_id, vote = :vote';
   $statement = $pdo->prepare($query);
   $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   $statement->execute();
   $votes = $statement->fetchAll(PDO::FETCH_ASSOC);
   print_r($votes);

//    foreach($votes as $vote){
// echo $vote);
//    }

   // $row = mysql_fetch_assoc($votes);
   // $count = $row['count'];
   // echo $count;





   // Delete logic
   if( isset( $_REQUEST['delete_post'] )){
      $delete_query = 'DELETE FROM posts
      WHERE post_id=4';
      $delete_statement = $pdo->query($delete_query);
      $delete_statement->execute();

      if (!$delete_statement) {
         die(var_dump($pdo->errorInfo()));
      }
   }
