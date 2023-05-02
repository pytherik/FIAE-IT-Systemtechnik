<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<form method="POST">
  <h3>Anzahl</h3>
  <label for="numDatasets">Anzahl der Datensätze</label>
  <input type="number" name="numDatasets" id="numDatasets" size="3">
  <h3>Namen</h3>
  <label for="femaleFirstnames">Vornamen nur w</label>
  <input type="radio" name="firstnames" id="femaleFirstnames" value="female_firstnames"><br>
  <label for="maleFirstnames">Vornamen nur m</label>
  <input type="radio" name="firstnames" id="maleFirstnames" value="male_firstnames"><br>
  <label for="maleFirstnames">Vornamen m + w</label>
  <input type="radio" name="firstnames" id="maleFirstnames" value="male_firstnames, female_firstnames"><br>
  <label for="surnames">Nachnamen</label>
  <input type="checkbox" name="surnames" id="surnames" value="surnames"><br>
  <h3>Adresse</h3>
  <label for="strasse">Strasse</label>
  <input type="checkbox" name="addressArray[]" id="strasse" value="strasse"><br>
  <label for="houseNum">Hausnummer</label>
  <input type="checkbox" name="houseNum" id="houseNum" value="true"><br>
  <label for="plz">Postleitzahl</label>
  <input type="checkbox" name="addressArray[]" id="plz" value="plz"><br>
  <label for="ort">Ort</label>
  <input type="checkbox" name="addressArray[]" id="ort" value="ort"><br>
  <button type="submit">mach das Array</button>
</form>
</body>
</html>
<?php
