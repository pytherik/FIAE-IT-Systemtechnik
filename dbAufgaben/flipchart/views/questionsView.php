<?php
?>
<h1>Frage: <?= $_SESSION['numPage'] + 1 ?></h1>
<h3><?= $questions[$_SESSION['numPage']]->getQuestion() ?></h3>
<a href="index.php?action=questionsView&next=pr">
  <button type="submit">vorherige</button>
</a>
<a href="index.php?action=questionsView&next=nx">
  <button type="submit">nächste</button>
</a>

</div>
</body>
</html>