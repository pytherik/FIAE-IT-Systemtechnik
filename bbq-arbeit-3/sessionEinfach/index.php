<?php
session_start();
$_SESSION['info'] = '21';
echo session_id();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Session</title>
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
<a href="index.php"><button type="button">Serveraufruf</button></a>
<?php
echo $_SESSION['info'];
?>
</body>
</html>
<?php phpinfo(); ?>