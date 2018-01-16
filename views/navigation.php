<?php $id = $_SESSION; ?>


<div class="nav-wrapper">
   <?php if(!isset($_SESSION['user'])): ?>
   <div class="navbar-left">
      <a href="../index.php">Home</a>
      <a href="../pages/feed.php">Feed</a>
      <a href="../pages/login.php">Login</a>
      <a href="../pages/login.php" class="logout-icon"></a>
   </div>
<?php endif; ?>

   <?php if (isset($_SESSION['user'])): ?>
      <?php foreach($id as $user):?>
         <div class="navbar-left">
            <a href="../index.php">Home</a>
            <a href="../pages/feed.php">Feed</a>
            <a href="/pages/createPost.php">Create Post</a>
            <a href="../logic/logout.php" class="login-icon"></a>
            <!-- <a href="../pages/profile.php?id=<?php echo $user['id'] ?>" class="nav-url"><?php echo $user['username']; ?></a> -->
         </div>
         <div class="navbar-right">
            <a href="../pages/profile.php?id=<?php echo $user['id'] ?>" class="nav-url"><?php echo $user['username']; ?></a>
         </div>
      <?php endforeach; ?>

   <?php endif; ?>
</ul>
</nav>
</div>
