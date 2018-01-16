<?php

declare(strict_types=1);

require __DIR__.'/../app/autoload.php';



// Remove the user session variable and redirect the user back to the homepage.
unset($_SESSION['user']);
redirect('/');
