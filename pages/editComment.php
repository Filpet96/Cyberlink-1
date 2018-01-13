<?php
require __DIR__.'../../views/header.php';
require __DIR__.'../../logic/editComment.php';

?>

<div class="edit-comment-wrapper">
   <form action="../logic/editComment.php?id=<?php echo $comment['comment_id']?>" method="post">
         <textarea type="edit-comment" name="edit-comment" placeholder="Url"><?php echo $comment['comment']; ?></textarea>
         <button type="submit" class="edit-comment-btn">Save changes</button>
   </form>
   <form action="../logic/deleteComment.php?id=<?php echo $comment['comment_id']?>" method="post">
         <button type="submit" class="delete-comment-btn">Delete comment</button>
   </form>
</div>
