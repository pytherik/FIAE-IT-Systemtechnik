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
<?php
// 5. Schreibe eine Funktion, die zu einem 2-dimensionalen Array den Code einer HTML-Tabelle
// mit den entsprechenden Werten zurückgibt. Das Array hat die Größe 2 X 3 Felder.

function table2x3($array2D): void
{
	?>
	<table>
		<th>Value 1</th>
		<th>Value 2</th>
		<?php for ($i = 0; $i < 3; $i++) { ?>
			<tr>
				<?php for ($j = 0; $j < 2; $j++) { ?>
					<td><?= $array2D[$i][$j]; ?></td>
				<?php } ?>
			</tr>
		<?php } ?>
	</table>
<?php }

$array2D = [[1, 2], [2, 3], [3, 4]];
table2x3($array2D);
echo "<br>";
echo "<hr>";

// 6. Verallgemeinere die Funktion aus 5. für beliebige Arrays mit sinnvoller Größe.
function tableMulti($array2D): void
{
	?>
	<table style="border: 1px solid #777;">
		<?php for ($i = 1; $i < count($array2D); $i++) { ?>
			<th>Value <?= $i; ?></th>
		<?php }
		foreach ($array2D as $row) {
			?>
			<tr>
				<?php foreach ($row as $data) { ?>
					<td><?= $data; ?></td>
				<?php } ?>
			</tr>
		<?php } ?>

	</table>
<?php }

$array2D2 = [[1, 2, 3], [2, 3, 4], [3, 4, 5], [4, 5, 6]];
tableMulti($array2D2);
// 6. Verallgemeinere die Funktion aus 5. für beliebige Arrays mit sinnvoller Größe.

function htmlToString($valArray):string {
	$htmlCode = "<table>\n";
	for ($i = 1; $i < count($valArray); $i++) {
		$htmlCode .= "<th>Value $i</th>\n";
	}
	foreach ($valArray as $row) {
		$htmlCode .= "<tr>\n";
		foreach ($row as $data) {
			$htmlCode .= "<td>$data</td>\n";
		}
		$htmlCode .= "</tr>\n";
	}
	$htmlCode .= "</table>\n";
	return $htmlCode;
}

$valArray = [[1, 2, 3], [2, 3, 4], [3, 4, 5], [4, 5, 6]];
echo htmlToString($array2D2);

?>
</body>
</html>