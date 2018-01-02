<?php

require __DIR__.'/../app/autoload.php';

$id = $_GET['id'];

if (isset($_POST['title'], $_POST['description'], $_POST['url'])) {
   $title = filter_var($_POST['title'], FILTER_VALIDATE_EMAIL);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);

  $query = 'UPDATE posts
            SET title = :title, description = :description, url = :url
            WHERE post_id = :post_id';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':title', $title, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':url', $id, PDO::PARAM_STR);
  $statement->bindParam(':post_id', $id, PDO::PARAM_STR);


  $statement->execute();


  redirect('../../pages/feed.php');

};
