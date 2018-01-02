<?php
declare(strict_types=1);
include 'header.php';



$username = $user['username'];


?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
    </head>
    <body>
      <div class="welcome">
         <p><?php echo 'Welcome, '. $username. '!';?></p>
      </div>

    </body>
</html>
