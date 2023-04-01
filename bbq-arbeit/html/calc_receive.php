<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Variablen in empfang nehmen
$number1 = doubleval($_POST['number1']);
$number2 = doubleval($_POST['number2']);

$result = 0;
$operation = '';

$operand = $_POST['compute'];


// Summe ausrechnen
// durch das Pluszeichen castet PHP die Variablen $number1 und $number2 zu double bzw int
// die gilt auch für alle Grundrechenarten, zusätzlich auch für modulo.
if (isset($_POST['number1']) && isset($_POST['number2'])) {
    switch($operand) {
        case '+':
            $result = $number1 + $number2;
            $operation = 'Die Summe';
            break;
        case '-':
            $result = $number1 - $number2;
            $operation = 'Die Differenz';
            break;
        case '*':
            $result = $number1 * $number2;
            $operation = 'Das Produkt';
            break;
        case '/':
            if ($number2 == 0) {
                $result = 'nicht möglich!';
                $operation = 'Das Ausführen ';
                break;
            }
            $result = $number1 / $number2;
            $operation = 'Der Quotient';
            break;
        case '%':
            if ($number2 == 0) {
                $result = 'nicht möglich!';
                $operation = 'Das Ausführen ';
                break;
            }
            $result = intval($number1) % intval($number2);
            $operation = 'Der Rest';
            break;
    }
} else {
    echo "<h1>Bitte beide Felder ausfüllen!</h1>";
}

?>


<?php

echo "$operation dieser Operation ist $result !<br>";

?>
</body>
</html>

