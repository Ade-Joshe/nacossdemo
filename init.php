<?php

session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

spl_autoload_register(function($class_name) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
});

// Load user if they are logged in
if (Session::exists('user_id')) {
  $current_user = new User();
  $current_user = $current_user->findByEmail(Session::get('user_id'));
}
else {
  $current_user = new User();
}
