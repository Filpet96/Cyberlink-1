<?php

declare(strict_types=1);

require __DIR__.'../../views/header.php';


?>

<div class="register-wrapper">
   <form action="../logic/createUser.php" method="post">
      <div>
         <label for="create-user">Name</label>
         <br>
         <input type="create-user" name="name" placeholder="Marshall Eriksen" required>
      </div>
      <div>
         <label for="create-user">Username</label>
         <br>
         <input type="create-user" name="username" placeholder="BigFudge" maxlength="20" required>
      </div>
      <div>
         <label for="create-user">Email</label>
         <br>
         <input type="create-user" name="email" placeholder="Marshall@environmentallawyer.org" required>
      </div>
      <div>
         <label for="create-user">Password</label>
         <br>
         <input type="create-user" name="password" placeholder="**********" required>
      </div>
      <div>
         <label for="create-user">Biography </label>
         <br>
         <textarea type="biography" name="biography" placeholder="Write something uninteresting about yourself." maxlength="350"></textarea>
      </div>
      <button type="submit" class="register-btn btn">Create Account</button>
   </form>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
