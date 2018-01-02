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



if (isset($_POST['username'], $_POST['password'])) {
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
    // Prepare, bind email parameter and execute the database query.
    $pdo = new PDO('sqlite:db.db');

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);    
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

   //  print_r(
   //    $user
   // );

    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    if (!$user) {
        // redirect('login.php');
        header('Location: login.php');

    }
    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    if (password_verify($password, $user["password"])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
        unset($user['password']);
        $_SESSION['user'] = $user;
        // redirect('welcome.php');
        header("Location: pages/welcome.php");

    } else {
      // redirect('login.php');
      header('Location: login.php');

    }
}



// checks against sqlite3 db
// if(isset($_POST['username'])){
//    if($_POST['username'] === $user) {
//       header("Location: welcome.php");
//    }
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <link href="css/styles.css" rel="stylesheet">

</head>

<body>

   <div class="login">
      <h1>Login</h1>
      <form action="login.php" method="post">
         <div>
            <label for="username">Username</label>
            <input type="username" name="username" required>
         </div>
         <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
         </div>
         <button type="submit">Login</button>
         <button class="register"><a href="register.php">Register</a></button>
      </form>
   </div>

</body>
</html>
