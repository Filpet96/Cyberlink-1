<?php

// Fetching users
// $query = "SELECT * FROM users";
$query = "SELECT * FROM users ORDER BY joined DESC LIMIT 10";
$statement = $pdo->prepare($query);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);


// Fetching recent posts
$query = "SELECT * FROM posts ORDER BY posted DESC LIMIT 15";
$statement = $pdo->prepare($query);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
