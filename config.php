<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/constants.php';

$config = [
  'db' => [
    'dsn' => DB_DSN,
    'user' => DB_USER,
    'password' => DB_PASSWORD
  ],
  'debug' => true,
  'page' => [
    'home' => 'index.php',
    'login' => 'login.php',
  ],
  'token_name' => 'token'
];

$GLOBALS['config'] = $config;