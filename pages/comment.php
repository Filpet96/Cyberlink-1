<?php
require __DIR__.'/../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../logic/comment.php';

// Fetching post
$post_id = $_GET['id'];
$query = "SELECT * FROM posts WHERE post_id = :post_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

// Fetching user for post info
$user_id = $post['id'];
$query = "SELECT * FROM users WHERE id = :id";
$statement = $pdo->prepare($query);
$statement->bindParam(':id', $user_id, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

?>
   <a href="feed.php" class="back-btn">Bakåt änna</a>

   <div class="post">
      <div class="post-content">
         <div class="post-header">
            <div class="post-id">
               # <?php echo $post['post_id']; ?>
            </div>
            <div class="post-time">
               <?php echo $post['posted']; ?>
            </div>
         </div>
         <br>

         <div class="side-info">
            <h5><?php echo $user['username']; ?></h5>
            <br>
            <!-- <?php echo '<img src="../uploads/'. $user['img']. '" class="avatar-img">'; ?> -->
            <br>
            <!-- <div class="member">Joined: <br>
               <?php echo $user['joined']; ?>
            </div> -->
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

         <div class="post-footer">
            <?php echo 'Last edited: '. $join['edited']; ?>
         <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>
            <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn"></a>
         <?php endif; ?>
         </div>

      </div>
   </div>


   <div class="comments">
      <?php foreach($comment_users as $comment_user): ?>
         <?php if($comment_user['post_id'] === $_GET['id']): ?>
            <div><strong><?php echo $comment_user['username']; ?>:   </strong><?php echo $comment_user['comment']; ?></div>
            <div class="timestamp"><?php echo $comment_user['posted']; ?></h6></div>
            <hr class="comment-hr">
         <?php endif; ?>
      <?php endforeach; ?>
   </div>


   <form action="../logic/comment.php?id=<?php echo $post_id?>" method="post" class="comment-form">
      <div>
         <textarea type="comment" name="comment" maxlength="100" required></textarea>
      </div>
      <div class="maxchar">Maxchar: 100<br></div>
      <button type="submit" class="post-comment btn">Post comment</button>
   </form>

<?php require __DIR__.'../../views/footer.php'; ?>
