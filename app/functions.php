<?php
declare(strict_types=1);


if (!function_exists('redirect')) {
  function redirect($path)
  {
    header("Location: ${path}");
    exit;
  }
}
