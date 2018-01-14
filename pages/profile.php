<?php
require __DIR__.'../../views/header.php';
require __DIR__.'../../logic/profile.php';

$id = $_SESSION;
foreach($id as $person){}

   // // Uploading/Changing avatar
   if (isset($_FILES['avatar'])) {
      $info = pathinfo($_FILES['avatar']['name']);
      $ext = $info['extension'];
      $newname = $_SESSION['user']['username'].'.'.$ext;
      $identity = (int)$_SESSION['user']['id'];

      $img = filter_var($newname, FILTER_SANITIZE_STRING);

      $query = 'UPDATE users SET img = :img WHERE id = :id';

      $statement = $pdo->prepare($query);

      $statement->bindParam(':img', $img, PDO::PARAM_STR);
      $statement->bindParam(':id', $identity, PDO::PARAM_INT);
      $statement->execute();

      move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__.'/../uploads/'.$newname);
      redirect('/../pages/profile.php');
   }

   ?>
   <div class="profile-wrapper">
      <?php foreach($id as $user): ?>
         <?php echo '<img src="../uploads/'. $hej['img']. '" class="profile-avatar">'; ?>
         <div class="profile-username"><b>Username: </b><?php echo $hej['username']; ?></div>
         <div class="profile-name"><b>Name: </b><?php echo $hej['name']; ?></div>
         <div class="profile-email"><b>Email: </b><?php echo $hej['email']; ?></div>
         <!-- <div class="profile-password"><b>Password: **********</b></div> -->
         <div class="profile-bio"><b>Biography: </b><?php echo $hej['biography']; ?></div>
         <div class="profile-posts"><b>Posts: </b><?php echo count($count_posts); ?></div>
         <div class="profile-comments"><b>Comments: </b><?php echo count($count_comments); ?></div>
      <?php endforeach; ?>
   </div>

   <?php if($_SESSION['user']['username'] == $hej['username']): ?>
      <div class="profile-wrapper-online">
         <?php echo '<img src="../uploads/'. $hej['img']. '" class="profile-avatar-online">'; ?>
         <?php foreach($id as $user): ?>
            <div class="profile-username-online"><b>Username: </b><?php echo $hej['username']; ?></div>
            <div class="profile-name-online"><b>Name: </b><?php echo $hej['name']; ?></div>
            <div class="profile-email-online"><b>Email: </b><?php echo $hej['email']; ?></div>
            <div class="profile-password-online"><b>Password: **********</b></div>
            <div class="profile-bio-online"><b>Biography: </b><?php echo $hej['biography']; ?></div>
            <div class="profile-posts-online"><b>Posts: </b><?php echo count($count_posts); ?></div>
            <div class="profile-comments-online"><b>Comments: </b><?php echo count($count_comments); ?></div>
         <?php endforeach; ?>
         <form action="../pages/profile.php" name="avatar" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required>
            <br>
            <button type="submit" class="upload-avatar">Upload</button>
         </form>

         <a href="editProfile.php?id=<?php echo $hej['username'] ?>" class="edit">Edit</a></p>

         <div class="my-posts-header">Posts</div>
         <div class="my-posts">
            <?php foreach($posts as $post): ?>
               <a href="comment.php?id=<?php echo $post['id'] ?>" class="my-posts-url"><?php echo $post['title']; ?></a>
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
