<?php

$name = $_POST['name'];
$password = $_POST['password'];

echo $name . "<br/>" . $password . "<br/>";

$mysql = new mysqli("localhost", "erik", "321null", "test");

$sql = $mysql->prepare("SELECT id, name FROM pwuser WHERE name=? AND password=?");
$sql->bind_param()
$result = $mysql->query($sql);
$userExists = false;
while ($row = $result->fetch_assoc()){
    echo $row['id'].' '. $row['name']."<br/>";
    $userExists = true;
}

if ($userExists) echo 'Du bist admin';
if (!$userExists) echo 'Nicht der admin';