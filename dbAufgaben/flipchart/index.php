<?php
session_start();
include 'config.php';

spl_autoload_register(function ($class) {
  include sprintf('classes/%s.php', $class);
});

//$id = (new Fragen())->getAllAsObjects();
//
//echo "<pre>";
//print_r($id);
//echo "</pre>";

//if (!isset($_SESSION['numPage'])) {
//  $_SESSION['numPage'] = 1;
//  $numPage = $_SESSION['numPage'];
//}
//
$action = $_REQUEST['action'] ?? 'settingsView';
$nxt = $_REQUEST['next'] ?? '';
//
//if ($nxt === 'nx') {
//  ($_SESSION['numPage'] > 3) ? $_SESSION['numPage'] = 0 : $_SESSION['numPage']++;
//} else if ($nxt === 'pr') {
//  ($_SESSION['numPage'] < 1) ? $_SESSION['numPage'] = 4 : $_SESSION['numPage']--;
//}
//
$numQuestions = $_POST['numQuestions'] ?? '';
$themen = $_POST['subject'] ?? [];
//if (isset($_SESSION['questions'])) {
//  unset($_SESSION);
//  echo "<h1>" . $_SESSION['questions'][0]->getQuestion() . "</h1>";
//}

switch ($action) {
  case 'settingsView':
    $subjects = (new Themen())->getAllAsObjects();
    break;
  case 'getQuestions':
//    $questions = (new Fragen())->getRandQuestionsAsObjects($themen, $numQuestions);
    $_SESSION['questions'] = (new Fragen())->getRandQuestionsAsObjects($themen, $numQuestions);
    echo $_SESSION['questions'][0]->getQuestion();
    foreach($_SESSION[1] as $answer) {
      echo $answer->getAnswer() . "<br/>";
    }
//    echo "<pre>";
//    print_r($questions);
//    echo "</pre>";
    $_SESSION['numPage'] = 1;
    $subjects = (new Themen())->getAllAsObjects();
    break;
}
$view = 'settingsView';

include sprintf('./views/%s.php', $view);

