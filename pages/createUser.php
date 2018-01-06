<?php

declare(strict_types=1);

require __DIR__.'../../views/header.php';


?>

<p class="header-text">Register</p>


<div class="register-wrapper">
   <form action="../logic/createUser.php" method="post">

      <div>
         <label for="text">Name</label>
         <input type="text" name="name" placeholder="Marshall Eriksen" required>
      </div>

      <div>
         <label for="text">Username</label>
         <input type="text" name="username" placeholder="BigFudge" maxlength="10" required>
      </div>
      <div>
         <label for="text">Email</label>
         <input type="text" name="email" placeholder="Marshall@environmentallawyer.org" required>
      </div>

      <div>
         <label for="text">Password</label>
         <input type="text" name="password" placeholder="**********" required>
      </div>

      <div>
         <label for="text">Biography </label>
         <textarea type="biography" name="biography" placeholder="Write something uninteresting about yourself." maxlength="350"></textarea>
      </div>
      <button type="submit" class="register-btn btn">Create Account</button>
   </form>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>
