<?php
declare(strict_types=1);

function getTransactionData(): array
{
  $incomeExpense = [];
  $transactionData = [];
  try {
    $handler = fopen('../transaction_files/sample_1.csv', 'r');
    while ($line = fgetcsv($handler)) {
      if ($line[0] === 'Date') continue;
      $amount = (float)str_replace([',', '$'], '', $line[3]);
      $incomeExpense[] = $amount;
      ($amount < 0) ? $red = true : $red = false;

      $transactionData[] = [
        'red' => $red,
        'date' => date('M d, Y', strtotime($line[0])),
        'check' => $line[1],
        'desc' => $line[2],
        'amount' => $line[3]];
    }
    return [
      $transactionData,
      array_sum($incomeExpense),
      array_sum(array_filter($incomeExpense, fn($amount) => $amount > 0)),
      array_sum(array_filter($incomeExpense, fn($amount) => $amount < 0))];
  } catch (Error $e) {
    echo 'File problems: ' . $e->getMessage();
    exit;
  }
}
