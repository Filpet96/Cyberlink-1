<?php
// require __DIR__.'../../views/header.php';
require __DIR__.'/../app/autoload.php';

// Fetching users info
$user_id = $_GET['id'];
$query = "SELECT * FROM users WHERE username = :user_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$statement->execute();
$user_infos = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($user_infos as $user_info){}

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

   // $user_id = $user_infos['id'];

  // redirect('../../pages/profile.php');
  redirect("../pages/profile.php?id=$id");


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

  redirect('../../pages/profile.php');

};

$id = $_SESSION;
foreach($id as $user){
   echo $user['id'];
}
