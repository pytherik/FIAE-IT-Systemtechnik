<?php

/* BOOLEANS */

# integers 0, -0 = false;
# float 0.0, -0.0 = false;
# string '', '0' = false;


isTrue(true);
isTrue(false);

var_dump((string)false);
echo "<br/>";
isTrue(0);
isTrue(1);

isTrue('0');
isTrue('4');

isTrue(0.0);
isTrue(0.002);

isTrue([]);
isTrue([0, 0]);

isTrue(null);


function isTrue($value): void
{
  echo "<br/>";
  if ($value) {
    echo "<b>".gettype($value) . "</b> $value ist true!<br/>";
    if (gettype($value) === "boolean") {
      var_dump((string)$value);
      echo "<br/>";
    }
  } else {
    echo "<b>".gettype($value) . "</b> $value ist false!<br/>";
  }
}
