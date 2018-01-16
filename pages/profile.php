<?php
require __DIR__.'../../views/header.php';
require __DIR__.'../../logic/profile.php';

   // Fetching users info
   $user_id = $_GET['id'];
   $query = "SELECT * FROM users WHERE id = :user_id";
   $statement = $pdo->prepare($query);
   $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
   $statement->execute();
   $url_users = $statement->fetchAll(PDO::FETCH_ASSOC);
   foreach($url_users as $url_user){}

      ?>

      <div class="profile-wrapper">
         <?php echo '<img src="../uploads/'. $url_user['img']. '" class="profile-avatar">'; ?>
         <div class="profile-username"><b>Username: </b><?php echo $url_user['username']; ?></div>
         <div class="profile-name"><b>Name: </b><?php echo $url_user['name']; ?></div>
         <div class="profile-email"><b>Email: </b><?php echo $url_user['email']; ?></div>
         <div class="profile-bio"><b>Biography: </b><?php echo $url_user['biography']; ?></div>
         <div class="profile-posts"><b>Posts: </b><?php echo count($count_posts); ?></div>
         <div class="profile-comments"><b>Comments: </b><?php echo count($count_comments); ?></div>
         <div class="profile-joined"><b>Joined: </b><?php echo $url_user['joined']; ?></div>
      </div>

      <?php if(isset($_SESSION['user']) && $_SESSION['user']['username'] == $url_user['username']): ?>
         <div class="profile-wrapper-online">
            <?php echo '<img src="../uploads/'. $url_user['img']. '" class="profile-avatar-online">'; ?>
            <?php foreach($id as $user): ?>
               <div class="profile-username-online"><b>Username: </b><?php echo $url_user['username']; ?></div>
               <div class="profile-name-online"><b>Name: </b><?php echo $url_user['name']; ?></div>
               <div class="profile-email-online"><b>Email: </b><?php echo $url_user['email']; ?></div>
               <div class="profile-password-online"><b>Password: **********</b></div>
               <div class="profile-bio-online"><b>Biography: </b><?php echo $url_user['biography']; ?></div>
               <div class="profile-posts-online"><b>Posts: </b><?php echo count($count_posts); ?></div>
               <div class="profile-comments-online"><b>Comments: </b><?php echo count($count_comments); ?></div>
               <div class="profile-joined-online"><b>Joined: </b><?php echo $url_user['joined']; ?></div>
            <?php endforeach; ?>

            <!-- Form for uploading avatar -->
            <form action="../logic/uploadAvatar.php" name="avatar" method="post" enctype="multipart/form-data">
               <input type="file" name="avatar" required>
               <br>
               <button type="submit" class="upload-avatar">Upload</button>
            </form>

            <!-- Form for deleting user/user-actions -->
            <form action="../logic/deleteUser.php?id=<?php echo $user_id?>" method="post" name="delete-user">
               <button type="submit" class="delete-user">Delete account</button>
            </form>

            <div class="dropdown-posts">
               <span>Posts(<?php echo count($posts); ?>)</span>
               <div class="dropdown-posts-content">
                  <?php foreach($posts as $post): ?>
                     <a href="comment.php?id=<?php echo $post['post_id'] ?>" class="my-posts-url"><?php echo "<li>". $post['title']. "</li>"; ?></a>
                     <br>
                  <?php endforeach; ?>
               </div>
            </div>

            <div class="dropdown-comments">
               <span>Comments(<?php echo count($comments); ?>)</span>
               <div class="dropdown-comments-content">
                  <?php foreach($comments as $comment): ?>
                     <a href="editComment.php?id=<?php echo $comment['comment_id'] ?>" class="my-posts-url"><?php echo "<li>". $comment['comment']. "</li>"; ?></a>
                     <br>
                  <?php endforeach; ?>
               </div>
            </div>

            <div class="dropdown">
               <span>Settings</span>
               <div class="dropdown-content">
                  <a href="editProfile.php?id=<?php echo $user['id'] ?>" class="edit-user">Change user info</a>
                  <a href="editPassword.php?id=<?php echo $user['id'] ?>" class="edit-user">Change password</a>
               </div>
            </div>

            <div class="my-posts-header">Posts</div>
            <div class="my-posts">
               <?php foreach($posts as $post): ?>
                  <a href="comment.php?id=<?php echo $post['post_id'] ?>" class="my-posts-url"><?php echo $post['title']; ?></a>
                  <br>
               <?php endforeach; ?>
            </div>

            <div class="my-comments-header">Comments</div>
            <div class="my-comments">
               <?php foreach($comments as $comment): ?>
                  <a href="editComment.php?id=<?php echo $comment['comment_id'] ?>" class="my-posts-url"><?php echo $comment['comment']; ?></a>
                  <br>
               <?php endforeach; ?>
            </div>
         <?php endif; ?>
      </div>

      <?php require __DIR__.'../../views/footer.php'; ?>
