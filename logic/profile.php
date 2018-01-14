<?php

// require __DIR__.'/../app/autoload.php';

$id = $_SESSION;

foreach($id as $person){}



   // Fetching posts and counting users posts
   $user_id = $_GET['id'];
   $query = "SELECT * FROM posts WHERE id = :user_id";
   $statement = $pdo->prepare($query);
   $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
   $statement->execute();
   $count_posts = $statement->fetchAll(PDO::FETCH_ASSOC);

   // Fetching comments and counting users comments
   $user_id = $_GET['id'];
   $query = "SELECT * FROM comments WHERE id = :user_id";
   $statement = $pdo->prepare($query);
   $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
   $statement->execute();
   $count_comments = $statement->fetchAll(PDO::FETCH_ASSOC);

   // Fetching users info
   $user_id = $_GET['id'];
   $query = "SELECT * FROM users WHERE id = :user_id";
   $statement = $pdo->prepare($query);
   $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
   $statement->execute();
   $test = $statement->fetchAll(PDO::FETCH_ASSOC);
   foreach($test as $hej){}
      // die(var_dump($test));

      // Fetching users posts
      $user_id = $_SESSION['user']['id'];
      $query = "SELECT * FROM posts WHERE id = :user_id";
      $statement = $pdo->prepare($query);
      $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $statement->execute();
      $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

      // Fetching users comments
      $user_id = $_SESSION['user']['id'];
      $query = "SELECT * FROM comments WHERE id = :user_id";
      $statement = $pdo->prepare($query);
      $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $statement->execute();
      $comments = $statement->fetchAll(PDO::FETCH_ASSOC);



      // Uploading/Changing avatar
      if (isset($_FILES['avatar'])) {
         $info = pathinfo($_FILES['avatar']['name']);
         $ext = $info['extension'];
         $newname = $_SESSION['user']['username'].'.'.$ext;
         $identity = (int)$_SESSION['user']['id'];

         $img = filter_var($newname, FILTER_SANITIZE_STRING);

         $query = 'UPDATE users SET img = :img WHERE id = :id';

         $statement = $pdo->prepare($query);

         $statement->bindParam(':img', $img, PDO::PARAM_STR);
         $statement->bindParam(':id', $identity, PDO::PARAM_INT);
         $statement->execute();

         move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__.'/../uploads/'.$newname);

      }
