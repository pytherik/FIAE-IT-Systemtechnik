
<h1>Triff deine Wahl!</h1>
<form action="index.php?action=questionsView" method="post">
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
</div>
</body>
</html>
