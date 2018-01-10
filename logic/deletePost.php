<?php
require __DIR__.'/../app/autoload.php';


$post_id = $_GET['id'];
$query = 'DELETE FROM posts WHERE post_id=:post_id';
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();


redirect('../../pages/feed.php');
