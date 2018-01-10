<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../app/functions.php';
// require __DIR__.'/../logic/votes.php';


?>

<div class="post">
   <?php foreach($joined as $join): ?>
      <div class="post-feed">

         <!-- Form for voting a post -->
         <form action="../logic/votes.php?id=<?php echo $join['post_id']?>" method="post" class="votes">
            <br>
            <input type="submit" name="up_vote" value="" />
            <br>
               <?php
               $post_id = $join['post_id'];
               $query = 'SELECT sum(vote) FROM votes WHERE post_id = :post_id';
               $query1 = 'SELECT * FROM comments WHERE post_id = :post_id';
               $statement = $pdo->prepare($query);
               $statement1 = $pdo->prepare($query1);
               $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
               $statement1->bindParam(':post_id', $post_id, PDO::PARAM_INT);
               $statement->execute();
               $statement1->execute();
               $votes = $statement->fetch(PDO::FETCH_ASSOC);
               $comments = $statement1->fetch(PDO::FETCH_ASSOC);

               echo $votes["sum(vote)"];
               ?>
            <br>
            <input type="submit" name="down_vote" value="" />
         </form>

            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="title"><?php echo $join['title']; ?></a>
            <p class="posted">Posted by: <strong><?php echo $join['username']; ?></strong>, <?php echo $join['posted']; ?></p>
            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="comment-btn"><?php echo count($comments); ?> comments</a>
      </div>
      <br>
      <br>
   <?php endforeach; ?>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
