<?php

require '../helpers.php';

/* Syntax

array_reduce(array $array, callable $callback, mixed $initialValue=null): array

*/

$invoiceItems = [
  ['price' => 9.99, 'qty' => 3, 'desc' => 'item1'],
  ['price' => 17.99, 'qty' => 1, 'desc' => 'item2'],
  ['price' => 78.99, 'qty' => 4, 'desc' => 'item3'],
  ['price' => 3.60, 'qty' => 2, 'desc' => 'item4'],
];

$total = array_reduce(
  $invoiceItems,
  fn($sum, $item) => $sum + $item['qty'] * $item['price'], 0);

echo $total;