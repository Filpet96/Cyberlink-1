<?php $id = $_SESSION; ?>


<div class="nav-wrapper">
   <div class="navbar-left">
      <!-- <a href="../index.php">Home</a> -->
      <a href="../pages/feed.php">Feed</a>
   </div>



   <?php if (isset($_SESSION['user'])): ?>
      <?php foreach($id as $user):?>

      <div class="navbar-right">
         <a href="/pages/profile.php"><?php echo $user['username']; ?></a>
      <?php endforeach; ?>

         <a href="/app/auth/logout.php"><?php echo "Logout"; ?></a>
      </div>
      <div class="navbar-left">
         <a href="/pages/createPost.php">Create Post</a>
      </div>
   <?php else: ?>
      <div class="navbar-right">
         <a href="/pages/login.php"><?php echo "Login"; ?></a>
      </div>
   <?php endif; ?>
</ul>
</nav>
</div>
