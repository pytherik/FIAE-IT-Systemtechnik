<?php

$zahl1 = $_POST['zahl1'] ?? '';
$zahl2 = $_POST['zahl2'] ?? '';
$operator = $_POST['operator'] ?? '';

if ($zahl1 !== '' && $zahl2 !== '') {
  switch($operator) {
    case 'add':
      echo $zahl1 + $zahl2;
      break;
    case 'sub':
      echo $zahl1 - $zahl2;
      break;
    case 'mul':
      echo $zahl1 * $zahl2;
      break;
    case 'div':
      echo number_format(($zahl1 / $zahl2),3);
      break;
    case 'mod':
      echo number_format(($zahl1 % $zahl2),3);
      break;
    default:
      echo 'zu schwer';
  }
} else {
  echo 'zahl fehlt';
}
