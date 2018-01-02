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

      // Function for voting a post
      if(isset($_SESSION['user'])){
         if(isset($_POST['up_vote'])) {
            // $up_vote = $join['up_vote'];
            $up_vote = 0;

            $post_id = $join['post_id'];

            $query = 'UPDATE posts SET up_vote = :up_vote + 1 WHERE :post_id';

            $statement = $pdo->prepare($query);
            $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_INT);
            $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $statement->execute();
         }

         if(isset($_POST['down_vote'])) {
            $down_vote = $join['down_vote'];
            $post_id = $join['post_id'];

            $query = 'UPDATE posts SET down_vote = :down_vote + 1 WHERE :post_id';

            $statement = $pdo->prepare($query);
            $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_INT);
            $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $statement->execute();
         }
      }

      // Logic for editing a post
      if(isset($_POST['title'], $_POST['description'], $_POST['url'])){
         $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
         $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
         $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
         $post_id = $join['post_id'];

         $query = 'UPDATE posts
                   SET title = :title, description = :description, url = :url
                   WHERE post_id = :post_id';

         $statement = $pdo->prepare($query);

         if (!$statement) {
           die(var_dump($pdo->errorInfo()));
         }

         $statement->bindParam(':title', $title, PDO::PARAM_STR);
         $statement->bindParam(':description', $description, PDO::PARAM_STR);
         $statement->bindParam(':url', $url, PDO::PARAM_STR);
         $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
         $statement->execute();
         }
