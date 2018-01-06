<?php
require __DIR__.'../../views/header.php';
?>

<p class="header-text">Edit profile</p>

<div class="register-wrapper">
   <form action="../logic/editProfile.php" method="post">
      <div>
         <label for="email">Email</label>
         <!-- <input type="email" name="email" placeholder="New email"> -->
         <textarea type="email" name="email"><?php echo $user['email']; ?></textarea>
      </div>

      <div>
         <label for="password">Password</label>
         <textarea type="password" name="password"><?php echo "Hej"; ?></textarea>
      </div>

      <div>
         <label for="biography">Biography </label>
         <!-- <textarea type="biography" name="biography" placeholder="New bio" maxlength="350"></textarea> -->
         <textarea type="biography" name="biography"><?php echo $user['biography']; ?></textarea>

      </div>

      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
