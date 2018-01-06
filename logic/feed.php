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

      // // Function for voting a post
      //       if(isset($_POST['up_vote'])) {
      //       $up_vote = 1;
      //
      //       // $post_id = $join['post_id'];
      //       $post_id = $_GET['id'];
      //
      //
      //       $query = 'UPDATE posts
      //                 SET up_vote = :up_vote + 30
      //                 WHERE post_id = :post_id';
      //
      //       $statement = $pdo->prepare($query);
      //       $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_INT);
      //       $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
      //       $statement->execute();
      // }
      //
      //    if(isset($_POST['down_vote'])) {
      //          $down_vote = 0;
      //
      //          $post_id = $join['post_id'];
      //
      //          $query = 'UPDATE posts
      //                    SET down_vote = :down_vote + 1
      //                    WHERE post_id = :post_id';
      //
      //          $statement = $pdo->prepare($query);
      //          $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_INT);
      //          $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
      //          $statement->execute();
      //    }
