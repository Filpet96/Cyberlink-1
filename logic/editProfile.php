<?php
require __DIR__.'../../views/header.php';

// Logic for editing a user account
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

  redirect('../../pages/feed.php');

};

// Logic for editing user password
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

  redirect('../../pages/feed.php');

};


$id = $_SESSION;
foreach($id as $user){
   echo $user['id'];
}
