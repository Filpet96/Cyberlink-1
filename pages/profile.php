<?php
require __DIR__.'../../views/header.php';

$id = $_SESSION;

foreach($id as $person){}


   // Uploading/Changing avatar
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

       // redirect('../pages/profile.php');


     }

?>


   <p class="header-text">Profile</p>

   <div class="profile-wrapper">

      <?php foreach($id as $user): ?>
         <div class="profile-avatar"><?php echo '<img src="../uploads/'. $user['img']. '" class="side-avatar">'; ?></div>
         <div class="profile-username"><b>Username: </b><?php echo $user['username']; ?></div>
         <div class="profile-name"><b>Name: </b><?php echo $user['name']; ?></div>
         <div class="profile-email"><b>Email: </b><?php echo $user['email']; ?></div>
         <div class="profile-bio"><b>Biography: </b><?php echo $user['biography']; ?></div>
         <div class="profile-password"><b>Password: **********</b></div>

         <!-- <a href="editProfile.php" class="edit">Edit</a> -->
         <a href="editProfile.php" class="edit">Edit</a>

         <form action="../pages/profile.php" name="avatar" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" required>
            <br>
            <button type="submit" class="upload-avatar">Upload</button>
         </form>

      <?php endforeach; ?>
   </div>


   <?php require __DIR__.'../../views/footer.php'; ?>
