CREATE TABLE "users" (
        `id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
        `first_name`  VARCHAR NOT NULL,
        `last_name`  VARCHAR NOT NULL,
        `biography`  VARCHAR NOT NULL,
        `username`      VARCHAR NOT NULL UNIQUE,
        `email` VARCHAR NOT NULL,
        `password`      VARCHAR NOT NULL,
        `img`         VARCHAR
);

CREATE TABLE "posts" (
        `user_id`       INTEGER NOT NULL,
        `post_id`       INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
        `title` VARCHAR NOT NULL,
        `description`   VARCHAR NOT NULL,
        `url`   VARCHAR NOT NULL,
        `posttime`      VARCHAR
);


<?php

require __DIR__.'/../autoload.php';
if (isset($_POST['username'], $_POST['password'])) {
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
    // Prepare, bind email parameter and execute the database query.
    $statement = $pdo->prepare('SELECT * FROM users WHERE username= :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.
    if (!$user) {
        redirect('login.php');
    }
    // If we found the user in the database, compare the given password from the
    // request with the one in the database using the password_verify function.
    if (password_verify($password, $user["password"])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!
        unset($user['password']);
        $_SESSION['user'] = $user;
        redirect('../../pages/profile.php');
    } else {
      redirect('../../pages/loginForm.php');
    }
}
