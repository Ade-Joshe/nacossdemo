<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/init.php';

if ($current_user->isLoggedIn()) {
  Redirect::back(); return;
}