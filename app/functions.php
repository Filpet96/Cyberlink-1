<?php
declare(strict_types=1);

if (!function_exists('redirect')) {
  /**
  * Redirect the user to given path.
  *
  * @param string $path
  *
  * @return void
  */
  function redirect($path)
  {
    header("Location: ${path}");
    exit;
  }
}

// Function for editing posts
function editPost() {
if(isset($_POST['title'], $_POST['description'], $_POST['url'])){
   $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
   // $post_id = $join['post_id'];

   $query = 'UPDATE posts
             SET title = :title, description = :description, url = :url
             WHERE post_id = 2';

   $statement = $pdo->prepare($query);

   if (!$statement) {
     die(var_dump($pdo->errorInfo()));
   }

   $statement->bindParam(':title', $title, PDO::PARAM_STR);
   $statement->bindParam(':description', $description, PDO::PARAM_STR);
   $statement->bindParam(':url', $url, PDO::PARAM_STR);
   // $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
   $statement->execute();
   }
}
