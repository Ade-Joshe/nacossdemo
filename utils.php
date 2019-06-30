<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Config.php';

function debug($msg, $flag = null) {
  if (isset($flag) and $flag == 0) return;
  if ($flag == 1 or Config::get('debug')) echo $msg;
}