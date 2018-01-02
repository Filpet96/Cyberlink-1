<?php
require __DIR__.'../../views/header.php';

// // Logic for editing a user account
// if (isset($_POST['biography'], $_POST['email'])) {
//
//
//   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
//   $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
//   $id = (int)$_SESSION['user']['id'];
//
//
//   $query = 'UPDATE users SET email = :email, biography = :biography WHERE id = :id';
//
//   $statement = $pdo->prepare($query);
//
//   if (!$statement) {
//     die(var_dump($pdo->errorInfo()));
//   }
//
//   $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
//   $statement->bindParam(':email', $email, PDO::PARAM_STR);
//   $statement->bindParam(':id', $id, PDO::PARAM_INT);
//
//   $statement->execute();
//
// };
//
// // Logic for editing user password
// if (isset($_POST['password'])) {
//
//   $password = filter_var($_POST['password']);
//   $id = (int)$_SESSION['user']['id'];
//
//   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//
//   $query = 'UPDATE users SET password = :password WHERE id = :id';
//
//   $statement = $pdo->prepare($query);
//
//   if (!$statement) {
//     die(var_dump($pdo->errorInfo()));
//   }
//
//   $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);
//   $statement->bindParam(':id', $id, PDO::PARAM_INT);
//
//   $statement->execute();
//
//
// };
//
//
//
//
// $id = $_SESSION;
// foreach($id as $user){
//    echo $user['id'];
// }


?>

<p class="header-text">Edit profile</p>

<div class="register-wrapper">
   <form action="../logic/editProfile.php" method="post">
      <div>
         <label for="email">Email</label>
         <!-- <input type="email" name="email" placeholder="New email"> -->
         <textarea type="email" name="email"><?php echo $user['email']; ?></textarea>
      </div>

      <div>
         <label for="password">Password</label>
         <input type="text" name="password">
      </div>

      <div>
         <label for="biography">Biography </label>
         <!-- <textarea type="biography" name="biography" placeholder="New bio" maxlength="350"></textarea> -->
         <textarea type="biography" name="biography"><?php echo $user['biography']; ?></textarea>

      </div>

      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
