<?php
require __DIR__.'../../views/header.php';
require __DIR__.'/../logic/feed.php';


// $postId = $join['post_id'];
$test = "SELECT COUNT(*) FROM comments WHERE post_id = :postId";
$statement = $pdo->prepare($test);
if (!$statement) {
   die(var_dump($pdo->errorInfo()));
}
$statement->bindParam(':postId', $join['post_id'], PDO::PARAM_STR);
$statement->execute();
$tester = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($tester as $testy){}
echo (int)$testy;

// SELECT COUNT(DISTINCT SupplierID)
// FROM product;


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

         <div class="side-info">
            <a href="<?php echo $join['username']; ?>" class="img-url"><?php echo $join['username']; ?></a>
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
            <a href="<?php echo $join['url']; ?>" class="img-url"><?php echo substr($join['url'], 0, 100); ?></a>
         </div>




            <!-- <form method="post" class="votes">
               <br>
               <?php echo $join['up_vote']; ?><input type="submit" name="up_vote" value="up" />
               <br>
               <?php echo $join['down_vote']; ?><input type="submit" name="down_vote" value="down" />
            </form> -->

            <!-- Footer for every post, displaying when edited, buttons for comment and edit -->
            <div class="post-footer">
               <?php echo 'Last edited: '. $join['edited']; ?>
            <?php if (isset($_SESSION['user']) && $join['username'] === $_SESSION['user']['username']): ?>
               <a href="editPost.php?id=<?php echo $join['post_id'] ?>" class="edit-post-btn"></a>
            <?php endif; ?>
            <div class="number-comments"><?php echo (int)$testy; ?></div>
            <a href="comment.php?id=<?php echo $join['post_id'] ?>" class="comment-btn"></a>
            </div>

      </div>
      <br>
   <?php endforeach; ?>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
