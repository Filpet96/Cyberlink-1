<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../logic/comment.php';

$post_id = $_GET['id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";

$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();

$post = $statement->fetch(PDO::FETCH_ASSOC);

?>

   <div class="post">
      <div class="post-content">
         <div class="post-id">
            # <?php echo $join['post_id']; ?>
         </div>
         <br>

         <div class="side-info">
            <a href="<?php echo $join['username']; ?>" class="img-url"><?php echo $join['username']; ?></a>
            <br>
            <?php echo '<img src="../uploads/'. $join['img']. '" class="avatar-img">'; ?>
            <br>
            <div class="member">Joined: <br>
               <?php echo $user['joined']; ?>
            </div>
         </div>



         <div class="post-title">
            <h2><?php echo $post['title']; ?></h2>
         </div>
         <br>
         <div class="post-description">
            <?php echo $post['description']; ?>
         </div>
         <div class="post-url">
            <a href="<?php echo $post['url']; ?>" class="img-url"><?php echo substr($post['url'], 0, 100); ?></a>
         </div>
         <div class="post-time">
            Posted: <?php echo $post['posted']; ?>
         </div>

      </div>
   </div>


   <div class="comments">
      <?php echo $comment['comment']; ?>
      <br>
      <form action="../logic/comment.php" method="post">
         <div>
            <input type="comment" name="comment">
         </div>
         <button type="submit" class="btn">Post comment</button>
      </form>
   </div>
