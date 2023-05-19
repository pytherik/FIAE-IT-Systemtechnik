<?php
session_start();
include 'config.php';

spl_autoload_register(function ($class) {
  include sprintf('classes/%s.php', $class);
});

include 'views/header.php';

if (!isset($_SESSION['numPage'])) {
  $_SESSION['numPage'] = 1;
  $numPage = $_SESSION['numPage'];
}

$action = $_REQUEST['action'] ?? 'settingsView';

$numQuestions = $_POST['numQuestions'] ?? '';
if ($numQuestions === '') $numQuestions = 5;
$themen = $_POST['subject'] ?? [];

switch ($action) {
  case 'settingsView':
    $subjects = (new Themen())->getAllAsObjects();
    break;
  case 'questionsView':
    $nxt = $_REQUEST['next'] ?? '';
    if ($nxt === 'nx') {
      ($_SESSION['numPage'] > 3) ? $_SESSION['numPage'] = 0 : $_SESSION['numPage']++;
    } else if ($nxt === 'pr') {
      ($_SESSION['numPage'] < 1) ? $_SESSION['numPage'] = 4 : $_SESSION['numPage']--;
    }
    if (isset($questions)) {
      $questions = (new Fragen())->getRandQuestionsAsObjects($themen, $numQuestions);
      $_SESSION['numPage'] = 1;
    }
    break;
}

$view = $action;
include sprintf('./views/%s.php', $view);

