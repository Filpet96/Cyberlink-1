<?php
include 'header.php';


?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Posts</title>
   </head>
   <body>
      <div class="posts">
         <h1>Login</h1>
         <form action="login.php" method="post">
            <div>
               <input type="topic" name="topic" placeholder="Topic" required>
            </div>
            <div>
               <label for="post">Post</label>
               <textarea type="post" placeholder="Enter your post here." required></textarea>
            </div>
            <button type="submit-post">Submit</button>
         </form>
      </div>
   </body>
</html>
