<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../app/functions.php';


   // Function for voting a post
         if(isset($_POST['up_vote'])) {
         $up_vote = 1;
         $post_id = $_GET['id'];
         // $post_id = $join['post_id'];
         $id = (int)$_SESSION['user']['id'];

       $query = 'INSERT INTO votes (id, post_id, vote)
                 VALUES (:id, :post_id, :up_vote)';


         $statement = $pdo->prepare($query);

         if (!$statement) {
           die(var_dump($pdo->errorInfo()));
         }

         $statement->bindParam(':id', $id, PDO::PARAM_INT);
         $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
         $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_INT);

         $statement->execute();
   }

         if(isset($_POST['down_vote'])) {
         $down_vote = 5;
         $post_id = $_GET['id'];
         // $post_id = $join['post_id'];
         $id = (int)$_SESSION['user']['id'];

         $query = 'INSERT INTO votes (id, post_id, vote)
                  VALUES (:id, :post_id, :down_vote)';

         $statement->bindParam(':id', $id, PDO::PARAM_INT);
         $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
         $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_INT);

         $statement->execute();
      }


?>

<div class="post">
   <?php foreach($joined as $join): ?>
      <div class="post-feed">

         <!-- Form for voting a post -->
         <form action="../pages/feed.php?id=<?php echo $join['post_id']?>" method="post" class="votes">
            <br>
            <input type="submit" name="up_vote" value="" />
            <br>
            <?php echo count($votes); ?>
            <br>
            <input type="submit" name="down_vote" value="" />
         </form>


            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="title"><?php echo $join['title']; ?></a>
            <p class="posted">Posted by: <strong><?php echo $join['username']; ?></strong>, <?php echo $join['posted']; ?></p>
            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="comment-btn"><?php echo "100"; ?> comments</a>


            <!-- Footer for every post, displaying when edited, buttons for comment and edit -->
            <!-- <div class="post-footer">
               <?php echo 'Last edited: '. $join['edited']; ?>
            <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>
               <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn"></a>
            <?php endif; ?>-->
      </div>
      <hr>
      <br>
   <?php endforeach; ?>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
