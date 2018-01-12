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
