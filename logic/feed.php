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
   $query = "SELECT * FROM comments LEFT JOIN posts ON comments.id=posts.id";
   $statement = $pdo->query($query);
   $statement->execute();
   $count_comments = $statement->fetchAll(PDO::FETCH_ASSOC);
   if (!$statement) {
      die(var_dump($pdo->errorInfo()));
   }
   // die(var_dump($count_comments));
   foreach($joined as $join){}


   // Query for fetching votes and printing in every post
   $post_id = $join['post_id'];
   // $post_id = 1;
   $query = 'SELECT * FROM votes WHERE post_id = :post_id';
   // $query = 'SELECT COUNT(*) FROM votes WHERE post_id = :post_id';
   $statement = $pdo->prepare($query);
   $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   $statement->execute();
   $votes = $statement->fetchAll(PDO::FETCH_ASSOC);
   // die(var_dump($votes));
   // foreach($votes as $vote){}


   // Fetching comments to count array
   $post_id = $join['post_id'];
   $query = 'SELECT * FROM comments WHERE post_id = :post_id';
   $statement = $pdo->query($query);
   $statement->execute();
   $count_comments = $statement->fetchAll(PDO::FETCH_ASSOC);
