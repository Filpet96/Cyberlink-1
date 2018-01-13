<?php
require __DIR__.'../../views/header.php';
// require __DIR__.'/../app/autoload.php';


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



     // Fetching users info
     $user_id = $_GET['id'];
     $query = "SELECT * FROM users WHERE username = :user_id";
     $statement = $pdo->prepare($query);
     $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
     $statement->execute();
     $test = $statement->fetchAll(PDO::FETCH_ASSOC);
     foreach($test as $hej){}
     // die(var_dump($test));

     // Fetching users posts
     $user_id = $_SESSION['user']['id'];
     $query = "SELECT * FROM posts WHERE id = :user_id";
     $statement = $pdo->prepare($query);
     $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
     $statement->execute();
     $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

     // Fetching users comments
     $user_id = $_SESSION['user']['id'];
     $query = "SELECT * FROM comments WHERE id = :user_id";
     $statement = $pdo->prepare($query);
     $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
     $statement->execute();
     $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
   <div class="profile-wrapper">

      <?php foreach($id as $user): ?>
         <?php echo '<img src="../uploads/'. $hej['img']. '" class="profile-avatar">'; ?>
         <div class="profile-username"><b>Username:</b><br><?php echo $hej['username']; ?></div>
         <div class="profile-name"><b>Name:</b><br><?php echo $hej['name']; ?></div>
         <div class="profile-email"><b>Email:</b><br><?php echo $hej['email']; ?></div>
         <div class="profile-password"><b>Password:<br>**********</b></div>
         <div class="profile-bio"><b>Biography:</b><br><?php echo $hej['biography']; ?></div>

      <?php if($hej['username'] == $_SESSION['user']['username']): ?>
         <a href="editProfile.php" class="edit">Edit</a>
      <?php endif; ?>

         <form action="../pages/profile.php" name="avatar" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required>
            <br>
            <button type="submit" class="upload-avatar">Upload</button>
         </form>

      <?php endforeach; ?>
   </div>

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


   <?php require __DIR__.'../../views/footer.php'; ?>
