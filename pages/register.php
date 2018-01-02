<?php
include '../views/header.php';

// if (!function_exists('redirect')) {
//     /**
//      * Redirect the user to given path.
//      *
//      * @param string $path
//      *
//      * @return void
//      */
//     function redirect($path)
//     {
//         header("Location: ${path}");
//         exit;
//     }
// }

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['biography'], $_POST['email'], $_POST['username'], $_POST['password'])) {
   $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
   $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
   $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
   $password = filter_var($_POST['password']);

   $hashed_password = password_hash($password, PASSWORD_DEFAULT);


   $pdo = new PDO('sqlite:db.db');
   $query = 'INSERT INTO users (first_name, last_name, biography, email, username, password)
             VALUES (:first_name, :last_name, :biography, :email, :username, :password)';

   $statement = $pdo->prepare($query);

   if (!$statement) {
     die(var_dump($pdo->errorInfo()));
   }

   $statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
   $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
   $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
   $statement->bindParam(':email', $email, PDO::PARAM_STR);
   $statement->bindParam(':username', $username, PDO::PARAM_STR);
   $statement->bindParam(':password', $password, PDO::PARAM_STR);

   $statement->execute();

   // redirect('login.php');

}

// Upload file
// if(!isset($avatar)) {
//    echo 'Please choose a file.';
// }
//
// if(isset($_FILES['avatar'])) {
//    $avatar = $_FILES['avatar'];
//
//    move_uploaded_file($avatar['tmp_name'], __DIR__.'/'. $avatar['name']);
//    echo 'Success!';
// }
//
// else {
//    echo 'Failure!';
// }

?>

<div class="register-form">
   <h1>Register new account:</h1>
   <form action="register.php" method="post">
      <div>
         <label for="first_name">First name</label>
         <input type="first_name" name="first_name" required>
      </div>
      <div>
         <label for="last_name">Last name</label>
         <input type="last_name" name="last_name">
      </div>
      <div>
         <label for="biography">Biography</label>
         <textarea type="biography" required></textarea>
      </div>
      <div>
         <label for="email">Email</label>
         <input type="email" name="email" required>
      </div>
      <div>
         <label for="username">Username</label>
         <input type="username" name="username" required>
      </div>
      <div>
         <label for="password">Password </label>
         <input type="password" name="password" required>
      </div>
      <button type="submit">Register</button>
   </form>
</div>
