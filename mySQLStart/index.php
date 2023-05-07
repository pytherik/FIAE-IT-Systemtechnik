<?php

$name = $_POST['name'];
$password = $_POST['password'];

echo $name . "<br/>" . $password . "<br/>";

$mysql = new mysqli("localhost", "erik", "321null", "test");
$stmt = "SELECT id, name FROM pwuser WHERE name = '$name' AND password = '$password'";

$result = $mysql->query($stmt);
//$mysql = new mysqli("localhost", "erik", "321null", "test");
//$stmt = $mysql->prepare("SELECT id, name FROM pwuser WHERE name = ? AND password = ?");
//$stmt->bind_param("ss", $name, $password);
//$stmt->execute();
//
//$result = $stmt->get_result();
$userExists = false;
while ($row = $result->fetch_assoc()){
    echo $row['id'].' '. $row['name']."<br/>";
    $userExists = true;
}

if ($userExists) echo 'Du bist admin';
if (!$userExists) echo 'Nicht der admin';