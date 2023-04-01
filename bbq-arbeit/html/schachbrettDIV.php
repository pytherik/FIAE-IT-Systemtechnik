<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schachbrett</title>
    <style>
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #666;
        }
      .chessTable {
          width: 480px;
          margin: 0 auto;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          border: 10px solid #C98474;
          border-radius: 3px;
      }
      .row {
          display: flex;
      }
      .field {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 60px;
          height: 60px;
      }
    </style>
</head>
<body>
<div class="chessTable">
  <?php
  for ($i = 8; $i > 0; $i--) {
    ?>
      <div class="row">
        <?php
        for ($j = 'A'; $j <= 'H'; $j++) {
          ((ord($j) + $i) % 2 == 0) ? $col = '#735F32': $col = '#FFEFD6';
            ?>
              <div class="field" style="background-color: <?= $col ?>">
                <?php
                echo $j . $i;
                ?>
              </div>
            <?php
          }
        ?>
      </div>
    <?php
  }
  ?>
</div>
</body>
</html>
