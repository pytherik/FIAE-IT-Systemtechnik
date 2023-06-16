<?php
if(isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = '';
}
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
  <script>let username ='<$php echo "$username" ?>'</script>
<script src="app.js" defer></script>
<body>
  <div class="form">
    <label for="username">Bitte verrat' uns deinen Namen!</label><br>
    <input type="text" name="username" id="username">
    <button type="submit" id="submit">bestätigen</button>
  </div>
  <h1 class="heading"></h1>
  <button type="submit">Nochmal</button>
</body>
</html>