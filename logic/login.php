<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';

if (isset($_POST['username'], $_POST['password'])) {
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];


    $statement = $pdo->prepare('SELECT * FROM users WHERE username= :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);

    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        redirect('/../../pages/login.php');
    }
    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    if (password_verify($password, $user["password"])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
        unset($user['password']);
        $_SESSION['user'] = $user;
        redirect('../../pages/feed.php');
    } else {
      redirect('../../pages/login.php');
    }
}
