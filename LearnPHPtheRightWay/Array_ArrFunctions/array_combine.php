<?php

/* Syntax:

array_combine(array $keys, array $values): array

*/

// die Arrays müssen gleich lang sein!
$arr1 = ['a', 'b', 'c'];
$arr2 = [2, 3, 4];

echo "<pre>";
print_r(array_combine($arr1, $arr2));
echo "</pre>";

