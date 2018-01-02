<?php
require __DIR__.'../../views/header.php';
// require __DIR__.'/../app/autoload.php';



$session = $_SESSION;
foreach($session as $id){}


// Logic for joining similar columns and fetching info
$query = "SELECT * FROM posts LEFT JOIN users ON posts.id=users.id";

$statement = $pdo->query($query);
$statement->execute();

$joined = $statement->fetchAll(PDO::FETCH_ASSOC);

   if (!$statement) {
      die(var_dump($pdo->errorInfo()));
   }

foreach($joined as $join){}



// Delete logic
if( isset( $_REQUEST['delete_post'] ))
{
   $delete_query = 'DELETE FROM posts
                    WHERE post_id=4';
   $delete_statement = $pdo->query($delete_query);
   $delete_statement->execute();

      if (!$delete_statement) {
         die(var_dump($pdo->errorInfo()));
      }
}

// Function for voting a post
if(isset($_POST['up_vote'])) {
   // $up_vote = $join['up_vote'];
   $up_vote = 0;

   $post_id = $join['post_id'];

   $query = 'UPDATE posts SET up_vote = :up_vote + 1 WHERE :post_id';

   $statement = $pdo->prepare($query);
   $statement->bindParam(':up_vote', $up_vote, PDO::PARAM_INT);
   $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   $statement->execute();
}

if(isset($_POST['down_vote'])) {
   $down_vote = $join['down_vote'];
   $post_id = $join['post_id'];

   $query = 'UPDATE posts SET down_vote = :down_vote + 1 WHERE :post_id';

   $statement = $pdo->prepare($query);
   $statement->bindParam(':down_vote', $down_vote, PDO::PARAM_INT);
   $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
   $statement->execute();
}

// Logic for editing a post
// function editPost() {
// if(isset($_POST['title'], $_POST['description'], $_POST['url'])){
//    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
//    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
//    $url = filter_var($_POST['url'], FILTER_SANITIZE_STRING);
//    // $post_id = $join['post_id'];
//
//    $query = 'UPDATE posts
//              SET title = :title, description = :description, url = :url
//              WHERE post_id = 2';
//
//    $statement = $pdo->prepare($query);
//
//    if (!$statement) {
//      die(var_dump($pdo->errorInfo()));
//    }
//
//    $statement->bindParam(':title', $title, PDO::PARAM_STR);
//    $statement->bindParam(':description', $description, PDO::PARAM_STR);
//    $statement->bindParam(':url', $url, PDO::PARAM_STR);
//    // $statement->bindParam(':post_id', $post_id, PDO::PARAM_STR);
//    $statement->execute();
//    }
// }


?>

<form method="post" class="votes">
   <input type="submit" name="delete_post" value="Delete post" />
   <br>
   <br>
   <br>
   <?php echo $join['up_vote']; ?><input type="submit" name="up_vote" value="up" />
   <br>
   <?php echo $join['down_vote']; ?><input type="submit" name="down_vote" value="down" />
</form>

<div class="post">
<?php foreach($joined as $join): ?>
      <div class="post-content">
         <div class="post-id">
            # <?php echo $join['post_id']; ?>
         </div>
         <br>

            <div class="side-info">
               <a href="<?php echo $join['username']; ?>" class="img-url"><?php echo $join['username']; ?></a>
               <br>
               <?php echo '<img src="../uploads/'. $join['img']. '" class="avatar-img">'; ?>
               <br>
               <div class="member">Joined: <br>
                  <?php echo $user['joined']; ?>
               </div>
            </div>

            <!-- EDIT POST FORM -->
            <?php if($id['username'] === $join['username']): ?>
               <!-- <a href="editPost.php" class="edit-post-btn"></a> -->

            <form action="feed.php" method="post" class="edit-post x-index">
               <div>
                  <textarea type="title" name="title"><?php echo $join['title']; ?></textarea>
               </div>

               <div>
                  <textarea type="description" name="description"><?php echo $join['description']; ?></textarea>
               </div>

               <div>
                  <textarea type="url" name="url"><?php echo $join['url']; ?></textarea>
               </div>

               <button type="submit" class="save-changes" onclick="save_changes()">Save changes</button>
            </form>
         <?php endif; ?>


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
         <div class="post-time">
            Posted: <?php echo $join['posted']; ?>

            <button class="comment"></button>
            <button class="delete-post" onclick="delete_post()"></button>
            <button class="edit-post-btn" onclick="edit_post()"></button>
         </div>

   </div>
<?php endforeach; ?>


</div>



<?php require __DIR__.'../../views/footer.php'; ?>
