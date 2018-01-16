<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';

?>

<div class="post">
   <?php foreach($joined as $join): ?>
      <div class="post-feed">
            <!-- Form for voting a post -->
            <form action="../logic/votes.php?id=<?php echo $join['post_id']?>" method="post" class="votes">
               <br>
               <?php if(isset($_SESSION['user'])): ?>
               <input type="submit" name="up_vote" value="" />
               <?php endif; ?>
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
               $comments = $statement1->fetchAll(PDO::FETCH_ASSOC);

               echo $votes["sum(vote)"];
               ?>
               <br>
               <?php if(isset($_SESSION['user'])): ?>
               <input type="submit" name="down_vote" value="" />
               <?php endif; ?>
            </form>
         <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="title"><?php echo $join['title']; ?></a>
         <p class="posted">Posted: <a href="profile.php?id=<?php echo $join['id'] ?>" class="user-url"><?php echo $join['username']; ?></a>, <?php echo $join['posted']; ?></p>
         <?php if(isset($_SESSION['user'])): ?>
         <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="comment-btn"><?php echo count($comments); ?> comments</a>
      <?php endif; ?>

      </div>
      <br>
      <br>
   <?php endforeach; ?>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
