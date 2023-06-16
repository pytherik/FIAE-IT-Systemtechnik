<?php

if (isset ($_POST['username'])) {
  session_start();
  $_SESSION['username'] = $_POST['username'];
  $username = $_SESSION['username'];
  echo json_encode($username);
}

