<?php
declare(strict_types=1);

if (!function_exists('redirect')) {
  /**
  * Redirect the user to given path.
  *
  * @param string $path
  *
  * @return void
  */
  function redirect($path)
  {
    header("Location: ${path}");
    exit;
  }
}


// function countArray(){
//    $query = "SELECT * FROM comments WHERE post_id = :post_id";
//    $statement = $pdo->prepare($query);
//    $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
//    $statement->execute();
//    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
// }
