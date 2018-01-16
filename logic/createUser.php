<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';


// Logic for creating a user account
if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['biography'])) {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $bio = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $joined = date("M d, Y");





  $query = 'INSERT INTO users (name, username, email, password, biography, joined)
            VALUES (:name, :username, :email, :password, :biography, :joined)';

  $statement = $pdo->prepare($query);

  if (!$statement) {
    die(var_dump($pdo->errorInfo()));
  }


  $statement->bindParam(':name', $name, PDO::PARAM_STR);
  $statement->bindParam(':username', $username, PDO::PARAM_STR);
  $statement->bindParam(':biography', $bio, PDO::PARAM_STR);
  $statement->bindParam(':email', $email, PDO::PARAM_STR);
  $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
  $statement->bindParam(':joined', $joined, PDO::PARAM_STR);


  $statement->execute();

// Redirecting user to instantly log in with new account
  redirect('../../pages/login.php');


};
