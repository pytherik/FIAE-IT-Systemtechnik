<?php
include './config.php';
$path1 = scandir(ADDRESS_DATA_PATH);
$path2 = scandir(TABLE_DATA_PATH);

$paths[] = array_merge($path1, $path2);

echo "<pre>";
print_r($paths);
echo "</pre>";