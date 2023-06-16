<?php
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
<script>let username="<?= $username ?>"</script>
<script src="app.js" defer></script>
<body>
<?php //if ($username == ''){ ?>
<div class="form">
    <label for="username">Bitte verrat' uns deinen Namen!</label><br>
    <input type="text" name="username" id="username">
    <button type="submit" id="submit">bestätigen</button>
</div>
<?php //} else { ?>
  <h1 class="heading"></h1>
  <button type="submit" id="submit2" hidden>Nochmal</button>
<?php //}  ?>
</body>
</html>
