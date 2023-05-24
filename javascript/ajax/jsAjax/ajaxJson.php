<?php

header('Conten-Type: application/json, charset=UTF-8');

$retrieve = file_get_contents('php://input');
$arr = json_decode($retrieve, true);
$answer = $arr['answer'];
$programmiersprachen = [
  'python',
  'ruby',
  'javaScript',
  'php',
  'lisp',
  'turboPascal'
];

if(in_array($answer, $programmiersprachen)) {
  echo "Ja, '$answer' ist eine Programmiersprache.";
} else {
  echo "Also '$answer' ist zumindest keine mir bekannte Programmiersprache.";
}