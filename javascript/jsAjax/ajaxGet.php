<?php

$answer = $_GET['isLang'] ?? '';

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
