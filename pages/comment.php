<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../logic/comment.php';



foreach($joined as $join){}


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
            <h2><?php echo $join['title']; ?></h2>
         </div>
         <br>
         <div class="post-description">
            <?php echo $join['description']; ?>
         </div>
         <div class="post-url">
            <a href="<?php echo $join['url']; ?>" class="img-url"><?php echo substr($join['url'], 0, 100); ?></a>
         </div>
         <div class="post-time">
            Posted: <?php echo $join['posted']; ?>
         </div>


         <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>

            <form method="post" class="votes">
               <!-- <input type="submit" name="delete_post" value="Delete post" /> -->
               <br>
               <?php echo $join['up_vote']; ?><input type="submit" name="up_vote" value="up" />
               <br>
               <?php echo $join['down_vote']; ?><input type="submit" name="down_vote" value="down" />
            </form>



         <?php endif; ?>
      </div>
   </div>


   <div class="comments">
      <?php echo $comment['comment']; ?>
   </div>
