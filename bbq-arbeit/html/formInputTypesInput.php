<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no,
  initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=">
  <link rel="stylesheet" href="../public/css/root.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>pampeldoc</title>
</head>
<body>
<div class="container">
  <div class="form-container mt2">
    <form action="formInputTypesOutput.php" method="post">
      <div class="input-container mb1">
        <label for="vorname">Vorname</label><br>
        <input class="txt tra-li o-off" type="text"
               name="vorname" id="vorname" size="40" autofocus><br>
      </div>
      <div class="input-container mb1">
        <label for="nachname">Nachname</label><br>
        <input class="txt tra-li o-off" type="text"
               name="nachname" id="nachname" size="40"><br><br>
      </div>
      <div class="input-container mb2">
        <label for="email">Email</label><br>
        <input class="txt tra-li o-off" type="email"
               name="email" id="email" size="40"><br>
      </div>
      <div class="input-container">
        <span>Geschlecht:</span><br>
        <label for="w">w</label>
        <input class="mt0" type="radio" id="w"
               name="geschlecht" value="weiblich" checked>
        <label for="m">m</label>
        <input type="radio" id="m"
               name="geschlecht" value="männlich">
        <label for="d">d</label>
        <input type="radio" id="d"
               name="geschlecht" value="divers"><br><br>
      </div>
      <div class="input-container">
        <span>Sprachen:</span><br>
        <label for="php">php</label>
        <input type="checkbox"
               name="sprache[]" id="php" value="php">
        <label for="py">python</label>
        <input type="checkbox"
               name="sprache[]" id="py" value="python">
        <label for="js">javaScript</label>
        <input type="checkbox" id="js"
               name="sprache[]" value="javaScript"><br><br>
      </div>
      <div class="input-container">
        <label for="auto">Eiskugeln:</label><br>
        <select class="tra-li o-off no-scroll gl mt0"
                name="auto[]" id="auto" multiple>
          <option value="1" selected>Vanille</option>
          <option value="2">Erdbeer</option>
          <option value="3" selected>Schoko</option>
          <option value="4">Zitrone</option>
        </select><br>
      </div>
      <span class="hint">
        Mehrfachauswahl mit Ctrl (&#8984;) + Click!
      </span>
      <div class="input-container mt1">
        <label for="comment">Kommentar:</label><br>
        <textarea class="tra-li o-off mt0" id="comment"
                  name="comment" cols="40" rows="6">
        </textarea><br>
        <div class="input-container">
          <button class="btn gm rd0" type="submit">
            abschicken
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>