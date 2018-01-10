<?php
require __DIR__.'../../views/header.php';
?>


<div class="register-wrapper">
   <form action="../logic/editProfile.php" method="post">
      <div>
         <label for="edit-profile">New email</label>
         <textarea type="email" name="email"><?php echo $user['email']; ?></textarea>
      </div>
      <div>
         <label for="edit-profile">New password</label>
         <textarea type="password" name="password"></textarea>
      </div>
      <div>
         <label for="edit-profile">New bio</label>
         <textarea type="biography" name="biography"><?php echo $user['biography']; ?></textarea>
      </div>
      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
