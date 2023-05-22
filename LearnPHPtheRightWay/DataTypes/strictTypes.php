<?php

declare(strict_types=1);

// wenn type hints gesetzt sind und strict_types=1 ist
// dann ist autocasting nicht möglich
function sum (int $a, int $b): int
{
  return $a + $b;
}

# echo sum('3', 2); funktioniert nicht

// es müssen zwei int  Werte gegeben sein
echo sum(2, 3) . "<br/>";

# sum(2.6, 3,9) . "<br/>"; funktioniert nicht

