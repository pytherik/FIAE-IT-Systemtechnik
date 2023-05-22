<?php

function output(string $action): void
{
  echo "match action is: $action";
}

$action = 1;

// benutzt loose comparison
switch ($action) {
  case 1:
    $a = 10;
    echo "switch action is: come here";
    break;
  case 2:
    echo "switch action is: stay with me";
    break;
  case 3:
    echo "switch action is: go away";
    break;
  default:
    echo "switch action is: no action";
}
echo "<br/>";

// benutzt strict comparison
match ((string)$action){
  '1' => output("come here"),
  '2' => output("stay with me"),
  '3' => output("go away"),
  default => print "no action"

};