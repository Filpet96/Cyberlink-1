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

   <div class="comment-page">
            <div class="post-title"><?php echo $post['title']; ?></a></div>
            <div class="post-description"><?php echo $post['description']; ?></div>
            <div class="post-url"><?php echo $post['url']; ?></div>

            <br>

         <div class="post-footer">
            <?php echo 'Last edited: '. $join['edited']; ?>
            <br>
            <br>
            Posted by: <strong><?php echo $user['username']; ?></strong>, <?php echo $post['posted']; ?>
         </div>
      </div>
      <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>
         <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn"></a>
      <?php endif; ?>
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
