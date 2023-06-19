<?php
//todo Erweiterung: Erstelle eine login-Seite, an der sich der User anmelden kann.
// Die Anmeldung soll durch eine Datenbanktabelle überprüft werden.
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Session</title>
</head>
<link rel="stylesheet" href="style.css">
<script src="app.js" defer></script>
<body>
<div class="top">
  <h1 class="heading"></h1>
</div>
<div class="form-container">
  <div class="form">
    <label for="username">Bitte verrat' uns deinen Namen!</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="password">Gib dein Passwort ein:</label><br>
    <input type="password" name="password" id="password"><br>
    <button type="submit" id="submit">bestätigen</button>
  </div>
</div>
<button type="submit" id="submit2" hidden>Bin ich es wirklich?</button>
</body>
</html>
