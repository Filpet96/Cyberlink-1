<?php
require __DIR__.'../../views/header.php';

// Fetching users info
$user_id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = :user_id";
$statement = $pdo->prepare($query);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$statement->execute();
$user_infos = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($user_infos as $user_info){}

?>


<div class="edit-profile-wrapper">
   <form action="../logic/editProfile.php" method="post">
      <div>
         <label for="edit-profile">New email</label>
         <br>
         <textarea type="edit-profile" name="email"><?php echo $user_info['email']; ?></textarea>
      </div>
      <div>
         <label for="edit-profile">New bio(max 300 chars)</label>
         <br>
         <textarea type="edit-bio" name="biography" maxlength="300"><?php echo $user_info['biography']; ?></textarea>
      </div>
      <button type="submit" class="register-btn btn">Save changes</button>
   </form>
</div>



<?php require __DIR__.'../../views/footer.php'; ?>
