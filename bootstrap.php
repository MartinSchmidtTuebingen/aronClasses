<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$directory = __DIR__;

while (!file_exists($directory . DIRECTORY_SEPARATOR . '.env')) {
  $directory = dirname($directory);
}

$dotenv = Dotenv\Dotenv::create($directory);
$dotenv->load();
