<?php

include './classes/Person.php';
include 'config.php';
if (file_exists(DATA_PATH)) {
  unlink(DATA_PATH);
}
$pers1 = new Person(1, 'Hansi', 'Pample', '31.02.1980');
$pers2 = new Person(2, 'Hans', 'Wurst', '13.08.1961');
$pers3 = new Person(3, 'Bibo', 'Balla', '1.06.1999');
$pers4 = new Person(4, 'Jutta', 'Janüsch', '17.09.2001');
$pers5 = new Person(5, 'Krümel', 'Monster', '10.10.1689');

$persons = [$pers1, $pers2, $pers3, $pers4, $pers5];

$dummy = new Person();

$dummy->store($persons);
echo htmlentities($dummy->read());
