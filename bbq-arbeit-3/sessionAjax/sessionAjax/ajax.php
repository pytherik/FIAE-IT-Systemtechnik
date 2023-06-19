<?php
session_start();
include 'config.php';

spl_autoload_register(function ($class) {
  include sprintf('classes/%s.php', $class);
});


//if (isset ($_POST['username'])) {
//  $_SESSION['username'] = $_POST['username'];
//  $username = $_SESSION['username'];
//  echo $username;
//}
//
//if (isset ($_POST['check'])) {
//  $username = $_SESSION['username'];
//  if ($_POST['check'] === $_SESSION['username']) {
//    echo "Du bist es wirklich $username!";
//  } else {
//    echo "Das bist nicht du! Du bist $username";
//  }
//}

if (isset($_POST['username']) && isset($_POST['passwd'])) {
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $response = (new AjaxUser())->getAjaxUser($username, $passwd);

  echo json_encode($response);
}
