<?php
require __DIR__.'/views/header.php';
require __DIR__.'/logic/homePage.php';

?>


<div class="index-wrapper">
   <p class="header-text">Welcome</p>

   <div class="new-members">
      <div class="new-members-header">New members</div>
      <br>
      <?php foreach($users as $user): ?>
         <div class="member-username">
            <a href="/pages/profile.php?id=<?php echo $user['id'] ?>" class="member-username"><?php echo $user['username']; ?></a>
         </div>
      <?php endforeach; ?>
   </div>

   <div class="new-posts">
      <div class="new-posts-header">Recent posts</div>
      <br>
      <?php foreach($posts as $post): ?>
         <a href="/pages/comment.php?id=<?php echo $post['post_id'] ?>" class="member-title"><?php echo $post['title']; ?></a>
         <br>
      <?php endforeach; ?>
   </div>
</div>



<?php require __DIR__.'/views/footer.php'; ?>
