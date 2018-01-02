<?php


declare(strict_types=1);

require __DIR__.'/../autoload.php';


// Remove user session and redirecting to login
unset($_SESSION['user']);
redirect('/pages/login.php');
