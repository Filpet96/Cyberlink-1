<?php
require __DIR__.'../../views/header.php';
?>

<?php if (isset($_SESSION['user'])): ?>
   <div class="create-post">
      <form action="../logic/createPost.php" method="post">
         <div>
            <label for="create-post">Title</label>
            <input type="create-post" name="title" maxlength="100" required>
         </div>
         <div>
            <label for="create-post">Description</label>
            <textarea name="description" maxlength="150" required></textarea>
         </div>
         <div>
            <label for="create-post">Link</label>
            <input type="create-post" name="url" required>
         </div>
         <button type="submit" class="post-btn btn">Post</button>
      </form>
   </div>
<?php endif; ?>

<?php require __DIR__.'../../views/footer.php'; ?>
