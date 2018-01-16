<?php
require __DIR__.'/../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../logic/comment.php';
$post_id = $_GET['id'];

?>

<div class="comment-page">
   <div class="post-title"><?php echo $post['title']; ?></a></div>
   <div class="post-description"><?php echo $post['description']; ?></div>
   <a href="<?php echo $post['url']; ?>" class="comment-url" target="_blank"><?php echo $post['url']; ?></a>
   <br>

   <div class="post-footer">
      <?php echo 'Last edited: '. $join['edited']; ?>
      <br>
      Posted by: <a href="profile.php?id=<?php echo $user['id'] ?>" class="member-username"><?php echo $user['username']; ?></a> on <?php echo $post['posted']; ?>
   </div>
</div>

<?php if($user['username'] === $_SESSION['user']['username']): ?>
   <form action="../logic/deletePost.php?id=<?php echo $post_id?>" method="post" class="delete-post">
      <button type="submit" class="delete-post-btn">Delete post</button>
   </form>
   <a href="editPost.php?id=<?php echo $post_id ?>" class="edit-post-btn">Edit post</a>
<?php endif; ?>
</div>

<div class="comments">
   <?php foreach($comment_users as $comment_user): ?>
      <?php if($comment_user['post_id'] === $_GET['id']): ?>
         <strong><a href="profile.php?id=<?php echo $comment_user['id'] ?>" class="user-url"><?php echo $comment_user['username']. ":  "; ?></a></strong><?php echo $comment_user['comment']; ?>
         <div class="timestamp"><?php echo $comment_user['posted']; ?></h6></div>
         <hr class="comment-hr">
      <?php endif; ?>
   <?php endforeach; ?>
</div>

<?php if(isset($_SESSION['user'])): ?>
   <form action="../logic/postComment.php?id=<?php echo $post_id?>" method="post" class="comment-form">
      <div>
         <textarea type="comment" name="comment" maxlength="100" required></textarea>
      </div>
      <div class="maxchar">Maxchar: 100<br></div>
      <button type="submit" class="post-comment btn">Post</button>
   </form>
<?php endif; ?>

<?php require __DIR__.'../../views/footer.php'; ?>
