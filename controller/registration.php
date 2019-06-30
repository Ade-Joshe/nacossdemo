<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/init.php';

if (Request::isPost() and Token::generate() ) {
  $validation_rules = [
    'lastname' => 'required',
    'firstname' => 'required'
  ]
}