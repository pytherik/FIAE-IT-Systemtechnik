<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=">
    <title>pampeldoc</title>
    <style>
        body {
            background-color: #444;
            color: #ddd;
            font-size: 1.4rem;
        }
    </style>
</head>
<body>
<form action="formInputTypesOutput.php" method="post">
    <label for="vorname">Vorname</label><br>
    <input type="text" name="vorname" id="vorname"><br>
    <label for="nachname">Nachname</label><br>
    <input type="text" name="nachname" id="nachname"><br><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br><br>
    <span>Geschlecht:</span><br>
    <label for="w">w</label>
    <input type="radio" name="geschlecht" id="w" value="weiblich" checked>
    <label for="m">m</label>
    <input type="radio" name="geschlecht" id="m" value="männlich">
    <label for="d">d</label>
    <input type="radio" name="geschlecht" id="d" value="divers"><br><br>
    <span>Sprachen:</span><br>
    <label for="php">php</label>
    <input type="checkbox" name="sprache[]" id="php" value="php">
    <label for="py">python</label>
    <input type="checkbox" name="sprache[]" id="py" value="python">
    <label for="js">javascript</label>
    <input type="checkbox" name="sprache[]" id="js" value="javascript"><br><br>
    <label for="auto">Eiskugeln:</label><br>
    <select name="auto[]" id="auto" multiple>
        <option value="1" selected>Vanille</option>
        <option value="2">Erdbeer</option>
        <option value="3" selected>Schoko</option>
        <option value="4">Zitrone</option>
    </select><br><br>
    <label for="comment">Kommentar</label><br>
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
    <button type="submit">abschicken</button>
</form>
</body>
</html>