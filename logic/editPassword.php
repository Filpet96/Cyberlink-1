<?php
require __DIR__.'/../app/autoload.php';


if (isset($_POST['password'])) {
  $password = filter_var($_POST['password']);
  $id = (int)$_SESSION['user']['id'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = 'UPDATE users SET password = :password WHERE id = :id';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }

  $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  $statement->bindParam(':id', $id, PDO::PARAM_INT);

  $statement->execute();

  redirect("../pages/profile.php?id=$id");

};
