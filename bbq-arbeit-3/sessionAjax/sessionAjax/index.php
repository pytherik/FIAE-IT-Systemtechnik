<?php
session_start();
//todo beim ersten Aufruf geibt user seinen Namen ein,
// beim zweiten oder weitern Aufruf wird der user mit seinem Namen befgrüßt

//todo neue Aufgabe:
// wie 1.Aufgabe, aber nicht Daten per Form, sondern per ajax übergeben
if (isset ($_POST['username'])){
$_SESSION['username'] = $_POST['username'];
}
$username = $_SESSION['username'] ?? '';
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
<script>let username='<?php echo "$username" ?>'</script>
<script src="app.js" defer></script>
<body>
<?php if ($username == '') { ?>
    <label for="username">Bitte verrat' uns deinen Namen!</label><br>
    <input type="text" name="username" id="username">
    <button type="submit" id="submit">bestätigen</button>
<?php } else { ?>
  <h1>Hallo, ich kenne dich! Du heisst <?= $username ?>!</h1>
  <button type="submit">Nochmal</button>
  <?php
} ?>
</body>
</html>