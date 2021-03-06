<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';

if (isset($_POST['title'], $_POST['description'], $_POST['url'])) {
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
  $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);

  $id = (int)$_SESSION['user']['id'];
  $posted = date("M d, Y: H:i");


  $query = 'INSERT INTO posts (id, title, description, url, posted)
            VALUES (:id, :title, :description, :url, :posted)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':title', $title, PDO::PARAM_STR);
  $statement->bindParam(':description', $description, PDO::PARAM_STR);
  $statement->bindParam(':url', $url, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->bindParam(':posted', $posted, PDO::PARAM_STR);

  $statement->execute();

  redirect('../../pages/feed.php');

};
