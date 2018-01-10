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

   // Joining tables: comments & posts
   // $query = "SELECT * FROM comments LEFT JOIN posts ON comments.id=posts.id";
   // $statement = $pdo->query($query);
   // $statement->execute();
   // $count_comments = $statement->fetchAll(PDO::FETCH_ASSOC);
   // foreach($count_comments as $count_comment){
   //    die(var_dump($count_comment['comment']));
   // }

   // Query for fetching up votes
   // $post_id = $join['post_id'];
   // $query = 'SELECT sum(up_vote) FROM votes WHERE post_id = :post_id';
   // $statement = $pdo->prepare($query);
   // $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   // $statement->execute();
   // $up_votes = $statement->fetch(PDO::FETCH_ASSOC);

   // Query for fetching down votes
   // $post_id = $join['post_id'];
   // $post_id = 3;
   // $query = 'SELECT sum(vote) FROM test WHERE post_id = :post_id';
   // // $query = 'SELECT down_vote FROM votes WHERE post_id = :post_id';
   // $statement = $pdo->prepare($query);
   // $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   // $statement->execute();
   // $down_votes = $statement->fetch(PDO::FETCH_ASSOC);
   // die(var_dump($down_votes));

   // Query for fetching comments and counting
   // $post_id = $join['post_id'];
   // $post_id = 6;
   // $query = 'SELECT * FROM comments WHERE post_id = :post_id';
   // // $query = 'SELECT sum(post_id) FROM comments WHERE post_id = :post_id';
   // $statement = $pdo->prepare($query);
   // $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   // $statement->execute();
   // $count_comments = $statement->fetchAll(PDO::FETCH_ASSOC);
   //
   // die(var_dump($count_comments));
