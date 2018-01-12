<?php
require __DIR__.'/../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../logic/comment.php';

?>

   <div class="comment-page">
            <div class="post-title"><?php echo $post['title']; ?></a></div>
            <div class="post-description"><?php echo $post['description']; ?></div>
            <div class="post-url"><a href="<?php echo $post['url']; ?>" class="comment-url" target="_blank"><?php echo $post['url']; ?></a></div>
            <br>

         <div class="post-footer">
            <?php echo 'Last edited: '. $join['edited']; ?>
            <br>
            <br>
            Posted by: <strong><?php echo $user['username']; ?></strong> on <?php echo $post['posted']; ?>
         </div>
      </div>
         <?php if($user['username'] === $_SESSION['user']['username']): ?>
            <form action="../logic/deletePost.php?id=<?php echo $post_id?>" method="post" class="delete-post">
               <button type="submit" class="delete-post-btn">Delete post</button>
            </form>
         <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn">Edit post</a>
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
      <button type="submit" class="post-comment btn">Post</button>
   </form>

<?php require __DIR__.'../../views/footer.php'; ?>
