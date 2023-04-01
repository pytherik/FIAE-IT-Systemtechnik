<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schachbrett-table</title>
</head>
<body>
<table style="border: 10px solid #C98474; text-align: center;">
  <?php
  for ($i = 8; $i > 0; $i--) {
    ?>
      <tr>
        <?php
        for ($j = 'A'; $j <= 'H'; $j++) {
          if ((ord($j) + $i) % 2 == 0) {
            $col = '#FFEFD6';
          } else {
            $col = '#735F32';
          }
            ?>
              <td style="width:60px; height:60px; background-color:<?= $col; ?>">
                <?php echo $j . $i; ?>
              </td>
            <?php
        }
        ?>
      </tr>
    <?php
  }
  ?>
</table>
</body>
</html>
