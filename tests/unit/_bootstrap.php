<?php

use Dotenv\Dotenv;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__ . '/../../');
$dotenv->load();