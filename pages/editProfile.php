<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/editProfile.php';

?>


<div class="edit-profile-wrapper">
   <form action="../logic/editProfile.php" method="post">
      <div>
         <label for="edit-profile">New email</label>
         <br>
         <textarea type="edit-profile" name="email"><?php echo $user_info['email']; ?></textarea>
      </div>
      <div>
         <label for="edit-profile">New password</label>
         <br>
         <textarea type="edit-profile" name="password"></textarea>
      </div>
      <div>
         <label for="edit-profile">New bio</label>
         <br>
         <textarea type="edit-bio" name="biography"><?php echo $user_info['biography']; ?></textarea>
      </div>
      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
