<?php


if (isset($_POST['title'], $_POST['description'], $_POST['url'])) {
   $title = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   $description = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
   $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);


  $query = 'UPDATE posts
            SET title = :title, description = :description, url = :url
            WHERE post_id = :id';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':title', $title, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':url', $id, PDO::PARAM_STR);

  $statement->execute();

};
