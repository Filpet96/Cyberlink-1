<?php
require __DIR__.'../../views/header.php';

$id = $_SESSION;
foreach($id as $person){

}

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
