<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>get-variable</title>
</head>
<body>
<!-- Vergleich von form post und form get -->
<form action="getLesen.php" method="get">
  <label for="ue1">Übergabevariable 1</label><br>
  <input id="ue1" type="text" name="bezeichnung"><br>
  <label for="ue2">Übergabevariable 2</label><br>
  <input id="ue2" type="text" name="bez2"><br>
  <input type="submit"><br>
</form>
<a href="getLesen.php?vorname=Tom&nachneme=Toll"><button>senden</button></a><br><br>
<a href="getLesen.php?id=3&action=editieren"><button>&#10000;</button></a>
<a href="getLesen.php?id=2&action=loeschen"><button>&#10006;</button></a><br><br>
<a href="getLesen.php?action=erstellen"><button>erstellen</button></a>
</body>
</html>

