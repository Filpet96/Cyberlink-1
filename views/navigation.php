<?php $id = $_SESSION; ?>


<div class="nav-wrapper">
   <?php if(!isset($_SESSION['user'])): ?>
   <div class="navbar-left">
      <a href="../index.php">Home</a>
      <a href="../pages/feed.php">Feed</a>
      <a href="../pages/login.php">Login</a>
      <a href="/app/auth/logout.php" class="logout-icon"></a>
   </div>
<?php endif; ?>

   <?php if (isset($_SESSION['user'])): ?>
      <?php foreach($id as $user):?>
         <div class="navbar-left">
            <a href="../index.php">Home</a>
            <a href="../pages/feed.php">Feed</a>
            <a href="/pages/createPost.php">Create Post</a>
            <a href="/app/auth/logout.php" class="login-icon"></a>
            <a href="../pages/profile.php?id=<?php echo $user['id'] ?>" class="nav-url"><?php echo $user['username']; ?></a>
         <?php endforeach; ?>

      </div>
      <?php else: ?>
   <?php endif; ?>
</ul>
</nav>
</div>
