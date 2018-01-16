<?php
require __DIR__.'/../app/autoload.php';


// Editing a user email & bio
if (isset($_POST['biography'], $_POST['email'])) {
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
  $id = (int)$_SESSION['user']['id'];

  $query = 'UPDATE users SET email = :email, biography = :biography WHERE id = :id';

  $statement = $pdo->prepare($query);
  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }
  $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  redirect("../pages/profile.php?id=$id");
};
