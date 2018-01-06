<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';
require __DIR__.'/../app/functions.php';
// require __DIR__.'/../logic/votes.php';



   // Function for counting and printing the amount comments
   // $query = "SELECT COUNT(*) FROM comments WHERE post_id = 1";
   // $statement = $pdo->prepare($query);
   // if (!$statement) {
   //    die(var_dump($pdo->errorInfo()));
   // }
   // // $statement->bindParam(':postId', $join['post_id'], PDO::PARAM_STR);
   // $statement->execute();
   // $numbers = $statement->fetchAll(PDO::FETCH_ASSOC);
   //
   // foreach($numbers as $numb){
   //    echo (int)$numb;
   // }


   // Function for voting a post
         if(isset($_POST['up_vote'])) {
         $up_vote = 1;
         $post_id = $_GET['id'];
         // $post_id = $join['post_id'];
         $id = (int)$_SESSION['user']['id'];

         // $query = 'UPDATE votes
         //           SET id = :id, post_id = :post_id, vote = :up_vote + 5
         //           WHERE post_id = 1';

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
      <div class="post-content">
         <div class="post-header">
            <div class="post-id">
               # <?php echo $join['post_id']; ?>
            </div>
            <div class="post-time">
               <?php echo $join['posted']; ?>
            </div>
         </div>

         <br>
         <br>

         <div class="side-info">
            <h5><?php echo $join['username']; ?></h5>
            <br>
            <?php echo '<img src="../uploads/'. $join['img']. '" class="avatar-img">'; ?>
            <br>
            <div class="member">Joined: <br>
               <?php echo $join['joined']; ?>
            </div>
         </div>



         <div class="post-title">
            <h2><?php echo $join['title']; ?></h2>
         </div>
         <br>
         <div class="post-description">
            <?php echo $join['description']; ?>
         </div>
         <div class="post-url">
            <a href="<?php echo $join['url']; ?>" target="_blank" class="img-url"><?php echo substr($join['url'], 0, 100); ?></a>
         </div>

            <!-- Form for voting a post -->
            <form action="../pages/feed.php?id=<?php echo $join['post_id']?>" method="post" class="votes">
               <br>
               <?php echo $vote; ?><input type="submit" name="up_vote" value="up" />
               <br>
               <?php echo $join['down_vote']; ?><input type="submit" name="down_vote" value="down" />
            </form>


            <!-- Footer for every post, displaying when edited, buttons for comment and edit -->
            <div class="post-footer">
               <?php echo 'Last edited: '. $join['edited']; ?>
            <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>
               <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn"></a>
            <?php endif; ?>
            <div class="number-comments"></div>
            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="comment-btn"></a>
            </div>

      </div>
      <br>
   <?php endforeach; ?>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
