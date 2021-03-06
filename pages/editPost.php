<?php
require __DIR__.'../../views/header.php';
// require __DIR__.'/../logic/editPost.php';


$post_id = $_GET['id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();

$post = $statement->fetch(PDO::FETCH_ASSOC);
// die(var_dump($post_id));


?>



<div class="edit-post">
   <form action="../logic/editPost.php?id=<?php echo $post_id?>" method="post">

      <div>
         <label type="edit-title">Title</label>
         <br>
         <textarea type="edit-title" name="title"><?php echo $post['title']; ?></textarea>
      </div>
      <div>
         <label for="description">Description</label>
         <br>
         <textarea type="edit-description" name="description"><?php echo $post['description']; ?></textarea>
      </div>
      <div>
         <label for="url">Url</label>
         <br>
         <textarea type="edit-url" name="url" placeholder="Url"><?php echo $post['url']; ?></textarea>
      </div>
      <button type="submit" class="save-edit">Save changes</button>
   </form>
</div>




<?php require __DIR__.'../../views/footer.php'; ?>
