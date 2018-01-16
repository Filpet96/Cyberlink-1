<?php
require __DIR__.'../../views/header.php';

?>
<div class="edit-profile-wrapper">
   <form action="../logic/editPassword.php" method="post">
      <div>
         <label for="edit-profile">New password</label>
         <br>
         <textarea type="edit-profile" name="password"></textarea>
      </div>
      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>
