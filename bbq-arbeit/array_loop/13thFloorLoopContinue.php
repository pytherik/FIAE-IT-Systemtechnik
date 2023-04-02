<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=">
  <link rel="stylesheet" href="../public/css/root.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>pampeldoc</title>
</head>
<body>
<form method="POST">
	<?php
	// In manchen amerikanischen Hotels gibt es keinen 13. Stock.
	// Erstelle untersinander Aufzugsknöpfe, von 20 bis 0 - ohne 13 - und gib sie aus.

	for ($i = 0; $i < 21; $i++) {
		$etage = 20 - $i;
		if ($etage === 13) {
			continue;
		}
		// Wenn HTML-tags in PHP so eingebettet werden kann es zu Konflikten mit Webdesignern kommen.
		// Deshalb ist es 'State of the Art' PHP und HTML voneinander getrennt zu halten.
		?>
      <button class="btn rd0 gl mb0" type='submit'
              value=<?= $etage ?> name='etage'><?= $etage; ?>
      </button>
      <br>
		<?php
	}

	?>
</form>
</body>
</html>
<?php
if (isset($_POST['etage'])) {
	echo "<h1>Willst du wirklich in die " . $_POST['etage'] . " Etage?</h1>";
}
