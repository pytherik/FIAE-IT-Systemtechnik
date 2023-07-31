<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
      :root {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }

      body {
          background-color: #444;
          color: #dedede;
      }
  </style>
</head>
<body>
<form method="POST">
  <label for="name">Name</label>
  <input type="text" name="name" id="name">
  <label for="passwd">Passwort</label>
  <input type="text" name="pwd" id="passwd">
  <button type="submit">Senden</button>
</form>
</body>
</html>
<?php
if (isset($_POST['name']) && isset($_POST['pwd'])){
  $name = $_POST['name'];
  $password =  $_POST['pwd'];
  // Generiere ein zufälliges Salt
  $salt = random_bytes(16); // Du kannst die Länge des Salts anpassen

// Kombiniere das Salt mit dem Passwort

  $combined = $salt . $password;

// Verschlüssele das Passwort
  $hashedPassword = password_hash($combined, PASSWORD_DEFAULT);

// Speichere den Salt und den verschlüsselten Hash in der Datenbank

// Überprüfung des Passworts
  $enteredPassword = $password; // Das eingegebene Passwort

// Hole den Salt aus der Datenbank
// Nehmen wir an, dass $storedSalt den in der Datenbank gespeicherten Salt enthält

// Kombiniere den Salt mit dem eingegebenen Passwort
  $combinedEntered = $salt . $enteredPassword;

  echo "<h1>$name</h1><br>";
  echo "<h3>Passwort: $password = $hashedPassword</h3>";

// Überprüfe das Passwort
  if (password_verify($combinedEntered, $hashedPassword)) {
    echo 'Das eingegebene Passwort ist korrekt!';
  } else {
    echo 'Das eingegebene Passwort ist falsch.';
  }

//
//  $options = [
//    'salt' => random_bytes(16), // Zufälliger Salt-Wert generieren
//    'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
//    'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
//    'threads' => PASSWORD_ARGON2_DEFAULT_THREADS
//  ];
//
//  $hashedPassword = password_hash($password, PASSWORD_ARGON2ID, $options);
//
//
//  echo "<h1>$name</h1><br>";
//  echo "<h3>Passwort: $password = $hashedPassword</h3>";
//
//  if (password_verify($password, $hashedPassword)) {
//    echo "Passwort ist korrekt!";
//  } else {
//    echo "Passwort ist falsch!";
//  }
}
