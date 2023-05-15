<?php
//session_start();
include 'config.php';

spl_autoload_register(function ($class) {
  include sprintf('classes/%s.php', $class);
});

$id = (new Fragen())->getAllAsObjects();

echo "<pre>";
print_r($id);
echo "</pre>";

//if (!isset($_SESSION['numPage'])) {
//  $_SESSION['numPage'] = 1;
//  $numPage = $_SESSION['numPage'];
//}
//
//$action = $_REQUEST['action'] ?? 'settingsView';
//$nxt = $_REQUEST['next'] ?? '';
//
//if ($nxt === 'nx') {
//  ($_SESSION['numPage'] > 3) ? $_SESSION['numPage'] = 0 : $_SESSION['numPage']++;
//} else if ($nxt === 'pr') {
//  ($_SESSION['numPage'] < 1) ? $_SESSION['numPage'] = 4 : $_SESSION['numPage']--;
//}
//
//$numQuestions = $_POST['numQuestions'] ?? '';
//$themen = $_POST['subject'] ?? [];
//if (isset($_SESSION['questions'])) {
//  echo "<h1>" . $_SESSION['questions'][$_SESSION['numPage']]['question'] . "</h1>";
//}
//
//switch ($action) {
//  case 'settingsView':
//    $subjects = (new Themen())->getAllAsObjects();
//    break;
//  case 'getQuestions':
//    $_SESSION['questions'] = (new Fragen())->getRandQuestionsAsObjects($themen, $numQuestions);
//    $_SESSION['numPage'] = 1;
//    echo "<pre>";
//    print_r($_SESSION['questions']);
//    echo "</pre>";
//    $subjects = (new Themen())->getAllAsObjects();
//    break;
//}
//$view = 'settingsView';
//
//include sprintf('./views/%s.php', $view);
//
