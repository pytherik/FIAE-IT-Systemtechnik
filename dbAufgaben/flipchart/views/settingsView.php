<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Lernkarten</title>
</head>
<body>
<div class="container">
  <h1>Frage: <?= $_SESSION['numPage'] + 1 ?></h1>
  <form action="index.php?action=getQuestions" method="post">
    <div class="form-container">
      <div class="input-container">
        <label for="numQuestions">Anzahl der Fragen</label><br>
        <input type="number" name="numQuestions" id="numQuestions" min="5" max="10">
      </div>
      <div class="input-container">
        <h3>Bitte wähle deine Themen:</h3>
        <?php foreach ($subjects as $subject) {
          $thema = $subject->getSubject() ?>
          <input type="checkbox" value="<?= $subject->getId() ?>" id="<?= $thema ?>" name="subject[]"/>
          <label for="<?= $thema ?>"><?= $thema ?></label><br>
        <?php } ?>
      </div>
      <div class="input-container">
          <button type="submit">los</button>
      </div>
    </div>
  </form>
  <a href="index.php?next=pr">
    <button type="submit">vorherige</button>
  </a>
  <a href="index.php?next=nx">
    <button type="submit">nächste</button>
  </a>
</div>
</body>
</html>
