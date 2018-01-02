<?php require __DIR__.'../../views/header.php'; ?>


<p class="header-text">Login</p>

<div class="login-wrapper">
   <form action="../logic/login.php" method="post">

      <div class="form-group">
         <label for="email">Username</label>
         <br>
         <input type="login" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
         <label for="password">Password</label>
         <br>
         <input type="password" name="password" placeholder="**********" required>
      </div>

      <button type="submit" class="login-btn btn">Login</button>

      <h6>Not registered? Click <a href="../pages/createUser.php" class="register-link">here.</a></h6>
   </form>
</div>

<?php require __DIR__.'../../views/footer.php'; ?>