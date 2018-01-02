<?php
require __DIR__.'../../views/header.php';
?>



<p class="header-text">Create post</p>

<?php if (isset($_SESSION['user'])): ?>
   <div class="create-post">
      <form action="../logic/createPost.php" method="post">
         <div>
            <input type="title" name="title" placeholder="Title" required>
         </div>
         <div>
            <textarea name="description" placeholder="Describe the link.." required></textarea>
         </div>
         <div>
            <input type="url" name="url" placeholder="Url" required>
         </div>
         <button type="submit" class="btn" id="create-post">Post</button>
      </form>
   </div>
<?php endif; ?>






<?php require __DIR__.'../../views/footer.php'; ?>
