<?php
// require __DIR__.'../../views/header.php';
require __DIR__.'../../pages/feed.php'; ?>
?>


<div class="edit-post">
   <form action="../logic/editPost.php" method="post">
      <div>
         <label for="title">Title</label>
         <textarea type="text" name="title"><?php echo $join['title']; ?></textarea>
      </div>
      <div>
         <label for="description">Description</label>
         <textarea type="text" name="description" placeholder="Describe the link.."><?php echo $join['description']; ?></textarea>
      </div>
      <div>
         <label for="url">Url</label>
         <textarea type="url" name="url" placeholder="Url"><?php echo $join['url']; ?></textarea>
      </div>
      <button type="submit" class="btn" id="create-post">Save changes</button>
   </form>
</div>




<?php require __DIR__.'../../views/footer.php'; ?>
